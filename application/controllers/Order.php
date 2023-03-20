<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
        if(!$this->session->userdata('user_id'))
            redirect('Login');
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

    }
	
	public function EXPORT_EXCEL_OLD($title='demo',$headers=array(),$data=array())
	{
		$this->load->library('excel');
		$file_name = $title.'('.date('Y-m-d h:i').').xls';

		$this->excel->setActiveSheetIndex(0);

		// method 1
		$this->excel->getActiveSheet()->fromArray($headers,'','A1');
		
		// method 2
		// $column = 0;
		// foreach ($headers as $dd) {
		// $this->excel->getActiveSheet()->setCellValueByColumnAndRow($column,1, $dd);
		// 	$column++;
		// }
		
		$this->excel->getActiveSheet()->fromArray($data,'','A2');

		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$file_name.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		$objWriter->save('php://output');
	}
	public function EXPORT_EXCEL($title='demo',$headers=array(),$data=array())
	{
		// Excel file name for download 
		$file_name = $title.'('.date('Y-m-d h:i').').xlsx';
		
		// Headers for download 
		header("Content-Disposition: attachment; filename=\"$file_name\""); 
		header("Content-Type: application/vnd.ms-excel"); 
		
		echo implode("\t", $headers) . "\n"; 
		if($data){ 
			foreach($data as $row) { 
				array_walk($row, function(&$str){ 
					$str = preg_replace("/\t/", "\\t", $str); 
					$str = preg_replace("/\r?\n/", "\\n", $str); 
					if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
				}); 
				echo implode("\t", array_values($row)) . "\n"; 
			} 
		}else{ 
			echo 'No records found...'. "\n"; 
		} 
		exit;
	}
	public function ajax_export_orders()
	{
		$data = array();
		$from_date= @$_POST['from_date'];
		$to_date= @$_POST['to_date'];
		$hubs= @$_POST['hubs'];
		$brands= @$_POST['brands'];
		$status= @$_POST['status'];
		// $start= @$_POST['start'];
		// $length= @$_POST['length'];

		// where hm.hdoid =$order

		$query = "SELECT  id,phone from users where user_type='branch'";
		$kitss = $this->main_model->run_manual_query_with_return ( $query );
		$kits_list = array ();
		if (count ( $kitss )) {
			foreach ( $kitss as $outs ) {
				$kits_list [$outs->id] = $outs->phone;
			}
		}


		$hubc="";
		if($hubs){
			$hubc=" and ( ";
			foreach ($hubs as $key => $value) {
				$banch_id=$value;
				$hubc.="hm.outlet_id='".$banch_id."' or ";
			}
			$hubc=rtrim($hubc," or ").' ) ';
		}

		$brandc="";
		if($brands){
			$brandc=" and (";
			foreach ($brands as $key => $value) {
				$brand_id=$value;
				$brandc.=" hm.pos_data@>"."'{".'"kitchen_details":[{'.'"brand_id":"'.$brand_id.'"}]}'."' or ";
			}
			$brandc=rtrim($brandc," or ").' ) ';
		}		

		$statusc="";
		if($status){
			$statusc=" and (";
			foreach ($status as $key => $value) {
				$status_text=strtolower($value);
				if($status_text=='cancelled')
					$statusc.=" (lower(os.status_text)='".$status_text."' or hm.pos_data->>'cancel'<> '0') or ";
				else
					$statusc.=" lower(os.status_text)='".$status_text."' or ";
			}
			$statusc=rtrim($statusc," or ").' ) ';
		}		

        $search='';
		$dateCon='';
		if (!empty($_POST['search']) && !$hubs && !$brands && !$status) {

			$_POST['search']=trim($_POST['search'],' ');
			// print_r($_POST['search']);die;
			$dateCon=' and 1=1';
			$search="and (cast (hm.hdoid as text) like '".$_POST['search']."%' OR cast (hm.customer_data->>'mobile' as text) like '".$_POST['search']."%' OR hm.customer_data->>'cust_name' LIKE '".$_POST['search']."%' OR cast (hm.external_order_id as text) LIKE '".$_POST['search']."%' OR cast (hm.zomato_id as text) LIKE '%".$_POST['search']."' )";
		}
		else
		{
			$dateCon="and hm.pos_data->>'time' >= '" . $from_date . "' and hm.pos_data->>'time' <= '".$to_date."'";
		}


		$query = "SELECT hm.hdoid,hm.external_order_id,hm.pos_data,hm.zomato_bundle,os.status_text,os.waiting_date_time,os.accepted_date_time,os.billed_date_time,os.ready_to_pick_datetime,os.delivery_date_time,os.rejected_date_time FROM hdorder_main_new_current_day hm left join order_status os on hm.hdoid=os.hdoid where hm.pos_data->>'cancel'='0' $dateCon $hubc  $brandc $statusc $search order by hm.hdoid desc";// OFFSET ".$start." LIMIT ".$length
		$orders=$this->multidb_model->run_manual_query_return_result ($query,'sk_postgre'); 
		if($orders)
		{
			foreach ($orders as $k => $value) {
				$pos_data = json_decode($value->pos_data); 
				$zomato_bundle = json_decode($value->zomato_bundle); 
				$kitchen_details = $pos_data->kitchen_details;
				// $list2 = json_decode ( $orders->kitchen_details );
				// echo "<pre>";print_r($pos_data);die;

			$order_status = urldecode($value->status_text);
				if ($kitchen_details) 
				{
					$table="<b>ORDER ID : $value->hdoid ( @$value->external_order_id ) </b><hr>";
					foreach ($kitchen_details as $list) 
					{
						foreach ( $list->kitchenitems as $key => $aa ) 
						{
							$row = array();
							$row['col_1'] = ++$k;
							$row['col_2'] = @$zomato_bundle->context->bap_id;
							$row['col_3'] = 'K@';
							$row['col_4'] = @$pos_data->time;
							$row['col_5'] = @$value->external_order_id;
							$row['col_6'] = @$zomato_bundle->context->transaction_id;
							$row['col_7'] = @$value->hdoid;
							$row['col_8'] = 'Marketplace Seller Node';
							$row['col_9'] = $order_status;
							$row['col_10'] = 'N/A';
							$row['col_11'] = @$aa->name;
							$row['col_12'] = @$aa->itemid;
							$row['col_13'] = 'F&B';
							$row['col_14'] = @$value->ready_to_pick_datetime;
							$row['col_15'] = @$value->delivery_date_time;
							$row['col_16'] = 'On-network';
							$row['col_17'] = 'Bengaluru';
							$row['col_18'] = @$value->rejected_date_time;
							$row['col_19'] = 'N/A';
							$row['col_20'] = 'N/A';
							$row['col_21'] = 'N/A';
							$row['col_22'] = floor(@$pos_data->total_amount);
							$data[] = $row;
						}
					}
				}
			}
		}
		
		// export orders
		$headers = array('S. No.','Buyer NP Name','Seller NP Name','Order Create Date & Time','Network Order Id','Network Transaction Id','Seller NP Order Id','Seller NP Type (Marketplace Seller Node/ Inventory Seller Node)','Order Status','Name of Seller','SKU Name','SKU Code','Order Category (F&B/ Grocery/ Home & Decor)','Shipped At Date & Time','Delivered At Date & Time','Delivery Type (On-network/ Off-network)','Delivery City','Cancelled At Date & Time','Cancelled By (Buyer/ Seller/ Logistics)','Cancellation Reason (Error Description)','Cancellation Remark','Total Order Value');

		$this->EXPORT_EXCEL('',$headers,$data);
	}

	public function ajax_get_order_details()
	{
		$data = array();
		$from_date= $_POST['from_date'];
		$to_date= @$_POST['to_date'];
		$hubs= @$_POST['hubs'];
		$brands= @$_POST['brands'];
		$status= @$_POST['status'];
		$start= @$_POST['start'];
		$length= @$_POST['length'];

		// where hm.hdoid =$order

		$query = "SELECT  id,phone from users where user_type='branch'";
		$kitss = $this->main_model->run_manual_query_with_return ( $query );
		$kits_list = array ();
		if (count ( $kitss )) {
			foreach ( $kitss as $outs ) {
				$kits_list [$outs->id] = $outs->phone;
			}
		}


		$hubc="";
		if($hubs){
			$hubc=" and ( ";
			foreach ($hubs as $key => $value) {
				$banch_id=$value;
				$hubc.="hm.outlet_id='".$banch_id."' or ";
			}
			$hubc=rtrim($hubc," or ").' ) ';
		}

		$brandc="";
		if($brands){
			$brandc=" and (";
			foreach ($brands as $key => $value) {
				$brand_id=$value;
				$brandc.=" hm.pos_data@>"."'{".'"kitchen_details":[{'.'"brand_id":"'.$brand_id.'"}]}'."' or ";
			}
			$brandc=rtrim($brandc," or ").' ) ';
		}		

		$statusc="";
		if($status){
			$statusc=" and (";
			foreach ($status as $key => $value) {
				$status_text=strtolower($value);
				if($status_text=='cancelled')
					$statusc.=" (lower(os.status_text)='".$status_text."' or hm.pos_data->>'cancel'<> '0') or ";
				else
					$statusc.=" lower(os.status_text)='".$status_text."' or ";
			}
			$statusc=rtrim($statusc," or ").' ) ';
		}		

        $search='';
		$dateCon='';
		if (!empty($_POST['search']['value']) && !$hubs && !$brands && !$status) {

			$_POST['search']['value']=trim($_POST['search']['value'],' ');
			// print_r($_POST['search']['value']);die;
			$dateCon=' and 1=1';
			$search="and (cast (hm.hdoid as text) like '".$_POST['search']['value']."%' OR cast (hm.customer_data->>'mobile' as text) like '".$_POST['search']['value']."%' OR hm.customer_data->>'cust_name' LIKE '".$_POST['search']['value']."%' OR cast (hm.external_order_id as text) LIKE '".$_POST['search']['value']."%' )";
		}
		else
		{
			$dateCon="and hm.pos_data->>'time' >= '" . $from_date . "' and hm.pos_data->>'time' <= '".$to_date."'";
		}


		$query = "SELECT hm.hdoid,hm.external_order_id,hm.pos_data,hm.zomato_bundle,os.status_text,os.waiting_date_time,os.accepted_date_time,os.billed_date_time,os.ready_to_pick_datetime,os.delivery_date_time,os.rejected_date_time FROM hdorder_main_new_current_day hm left join order_status os on hm.hdoid=os.hdoid where hm.pos_data->>'cancel'='0' $dateCon $hubc  $brandc $statusc $search order by hm.hdoid desc OFFSET ".$start." LIMIT ".$length;
		$orders=$this->multidb_model->run_manual_query_return_result ($query,'sk_postgre'); 

		$query = "SELECT count(hm.hdoid) as ct FROM hdorder_main_new_current_day hm left join order_status os on hm.hdoid=os.hdoid where hm.pos_data->>'cancel'='0' $dateCon $hubc  $brandc $statusc $search ";
		$total_orders = $this->multidb_model->run_manual_query_return_result( $query ,'sk_postgre')[0]->ct;
		if($orders)
		{
			foreach ($orders as $k => $value) {
				$pos_data = json_decode($value->pos_data); 
				$zomato_bundle = json_decode($value->zomato_bundle); 
				$kitchen_details = $pos_data->kitchen_details;
				// $list2 = json_decode ( $orders->kitchen_details );
				// echo "<pre>";print_r($pos_data);die;

			$status_btn = '';
			$orderstatusnum=0;
			$od_status = urldecode($value->status_text);
	        if ($od_status=='ACCEPTED') {
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:#00c853;">'.$od_status.'</b>';
	        	$orderstatusnum=1;
	        }
	        elseif ($od_status=='DELIVERED') {
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:#4e342e;">'.$od_status.'</b>';
	        	$orderstatusnum=5;

	        }
	        elseif ($od_status=='OUT FOR DELIVERY') {
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:#a1887f;">OUT</b>';
	        	$orderstatusnum=4;

	        }
	        elseif ($od_status=='READY TO PICK') {
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:#2979FF;">READY</b>';
	        	$orderstatusnum=3;

	        }
	        elseif ($od_status=='CANCELLED') {
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:red;">'.$od_status.'</b>';
	        	$orderstatusnum=6;

	        }
	        elseif ($od_status=='LH REJECTED ONLINE') {
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:grey;">'.$od_status.'</b>';
	        	$orderstatusnum=6;

	        }
	        elseif ($od_status=='BILLED') {
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:#ff5722;">'.$od_status.'</b>';
	        	$orderstatusnum=2;
	        }
	        else{
	        	$status_btn='<b class="status_code" style="padding: 2px 4px;background-color:#ffc107;">WAITING</b>';
	        	$orderstatusnum=0;
	        }

				// echo "<pre>";print_r($pos_data);die;
				// echo "<pre>";print_r($zomato_bundle);die;
				
				$start++;

				$row = array();
				$row['DT_RowId'] = "row_".$start;
				$row['col_1'] = $start;
				$row['col_2'] = @$zomato_bundle->context->bap_id;
				$row['col_3'] = 'K@';
				$row['col_4'] = @$pos_data->time;
				$row['col_5'] = @$value->external_order_id;
				$row['col_6'] = @$zomato_bundle->context->transaction_id;
				$row['col_7'] = @$value->hdoid;
				$row['col_8'] = 'Marketplace Seller Node';
				$row['col_9'] = $status_btn;
				$row['col_10'] = 'N/A';
				$row['col_11'] = 'SKU Name';
				$row['col_12'] = 'SKU Code';
				$row['col_13'] = 'F&B';
				$row['col_14'] = @$value->ready_to_pick_datetime;
				$row['col_15'] = @$value->delivery_date_time;
				$row['col_16'] = 'On-network';
				$row['col_17'] = 'Bengaluru';
				$row['col_18'] = @$value->rejected_date_time;
				$row['col_19'] = 'N/A';
				$row['col_20'] = 'N/A';
				$row['col_21'] = 'N/A';
				$row['col_22'] = '&#x20B9; '.floor(@$pos_data->total_amount);
				$row['col_23'] = @$value->waiting_date_time;
				$row['col_24'] = @$value->accepted_date_time;
				$row['col_25'] = @$value->billed_date_time;
				$row['col_26'] = '';//delivered date time not there
				$row['col_27'] = $orderstatusnum;;

				if ($kitchen_details) 
				{
					$table="<b>ORDER ID : $value->hdoid ( @$value->external_order_id ) </b><hr>";
					foreach ($kitchen_details as $list) 
					{
						$tax_total_kitchen = $total = $total_items = 0; 
						$table.="<table class='table table-bordered selected_items'><tr><td>".$list->kitchenname."&nbsp;&nbsp;&nbsp;&nbsp; Mob No : <a target='_blank' href=' http://106.51.77.100/TransVoice/Click2Call/c2c.php?Phone_no=".@$kits_list[$list->kitchenid]."&Agent_name=".$pos_data->login_name."'>".(@$kits_list[$list->kitchenid] ? @$kits_list[$list->kitchenid] : 'N/A')."</a></td><td></td></tr><tr class='selected_items_head'><td>Dish Name</td><td>QTY</td><td>Rate</td><td>Amount</td><td>Additional Charges*</td></tr>";
						$super_arry = array ();
						foreach ( $list->kitchenitems as $key => $aa ) 
						{
							if(isset($brand_id))
							{
								foreach ( $aa as $keya => $ab ) 
								{
								$super_arry[$key][$keya] = $ab;
								}
							}
							else
							{
								foreach ( $aa as $keya => $ab ) {
									$super_arry[$key][$keya] = $ab;
								}
							}
						}
						$index_tax=array();
						if ($super_arry) 
						{ 
							$count = count($super_arry)+1;
							$cc =0;
							foreach ( $super_arry as $key => $asd ) { 
								$cc++;
								$table.="<tr class='selected_items_body'>";
								$dish_name='';
								if (isset ( $dishmaster_array[$asd['itemid']] )) {
									$dish_name = $dishmaster_array[$asd['itemid']];
								}
								$table.="<td  width='40%'>".$asd['name']."</td><td  align='right'>".$asd['qty']."</td><td  align='right'> &#x20B9; ".number_format ( $asd['price'], 2, '.', ',' )."</td><td  align='right'> &#x20B9; ".number_format ( ($asd['qty'] * $asd['price']), 2, '.', ',' )."</td>";
								$total_tax=json_decode(@$asd['itemtax']);
								if($total_tax){
									foreach ($total_tax as $k2 => $v2) 
									{
										$v2=(float)$v2;
										$taxed=(($asd['qty'] * $asd['price'])*$v2)/100;
										$index_tax[$k2.' ('.$v2.')']=@$index_tax[$k2.' ('.$v2.')']+$taxed;	
										$taxed=0;
									}
								}
								isset($index_tax)?$index_tax=$index_tax:$index_tax=array();
								if($cc==$count-1) 
								{
									$table.="<td  style='border-top: 0;border-bottom: 0;' rowspan='".$count."'><div class='tax_body".$list->kitchenid."'>";
												foreach ($index_tax as $k3 => $v3) {
													$table.=$k3." : &#x20B9; ".$v3."<br>";
													@$tax_total_kitchen+=$v3;
												}
												$table.="Packaging Charge : ";
												if(isset($pos_data->parcel_charge))
												{
													$table.=$pos_data->parcel_charge;
												}else{
													$table.=0;
												}
												$table.="</div></td>";
								}								
								$table.="</tr>";
								$total = $total + ($asd['qty'] * $asd['price']);
								$total_items = $total_items + ($asd['qty']); 
							} 
						}	
						$table.='</table>';
					}
				}
	        $row['child_table'] = $table;
				$data[] = $row;
			}
		}

		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => intval($total_orders),
			"recordsFiltered" => intval($total_orders),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function order_details()
	{
		$data = $nav_data = array();
		$data['result']=array();
		$data['from_date']=$data['to_date']=date('Y-m-d');

		$query = "SELECT  id,name from users where user_type='sk_kitchen' and isactive=1 and is_freeze!=1";
		$data['hubs'] = $hubs = $this->main_model->run_manual_query_with_return ( $query );
		$hub_names = array ();
		if (count ( $hubs )) {
			foreach ( $hubs as $v ) {
				$hub_names [$v->id] = $v->name;
			}
		}
		$data['hub_names'] = $hub_names;

		$query = "SELECT  id,name from users where user_type='brand' and is_freeze!=1";
		$data['brands'] = $brands = $this->main_model->run_manual_query_with_return ( $query );
		$brand_names = array ();
		if (count ( $brands )) {
			foreach ( $brands as $v ) {
				$brand_names [$v->id] = $v->name;
			}
		}
		$data['brand_names'] = $brand_names;

		$data['status']=array('Waiting','Accepted','Billed','Ready To Pickup','Out for Delivery','Delivered','Cancelled');

		$nav_data['title'] = 'Order Details';
		$nav_data['sub_title'] = 'Order Filter';
		$nav_data['sub_title_2'] = 'Order List';
		$this->load->view('includes/navbar', $nav_data);
		$this->load->view('pages/order/order_details',$data);
	}
	public function order_grievance()
	{
		$this->load->view('pages/order/order_grievance');
	}
}
