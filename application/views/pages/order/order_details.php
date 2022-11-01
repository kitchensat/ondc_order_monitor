<link rel="stylesheet" href="<?php echo base_url()."assets/style/order_roadmap_style/style.css" ?>">
<?php if($this->session->flashdata('status')=='success'){ ?>
  <script>
    toastr.success('<?=$this->session->flashdata('msg');?>');
  </script>
<?php } elseif($this->session->flashdata('status')=='failed'){ ?> 
  <script>
    toastr.error('<?=$this->session->flashdata('msg');?>')
  </script>
<?php } ?>

<div id="page-container" class="sidebar_open">
    <div class="section my-shadow">
      <p class="content-title"><?=$sub_title?></p>
        <!-- <p class="para mt-2">This is Bootstrap 4 form</p> -->
      <form id="form-filter" class="row mt-2">
        <div class="col-md-2">
          <label class="label fontsize-15" for="name">From</label>
          <input type="date" class="form-control fontsize-15" name="from_date" id="from_date" value="<?php echo @$from_date; ?>" required>
        </div>
        <div class="col-md-2">
          <label class="label fontsize-15" for="name">To</label>
          <input type="date" class="form-control fontsize-15" name="to_date" id="to_date" value="<?php echo @$to_date; ?>" required>
        </div>
        <div class="col-md-2">
          <label class="label fontsize-15" for="name">Hub</label>
          <select class="form-control fontsize-15" name="hub" id="hub_id" required multiple>
          <?php if($hubs){ 
          foreach($hubs as $value){ ?>
          <option value="<?php echo $value->id;?>" ><?php echo $value->name; ?></option>
          <?php }
          } ?>
          </select>
        </div>
        <div class="col-md-2">
          <label class="label fontsize-15" for="name">Brand</label>
          <select class="form-control fontsize-15" name="brand" id="brand_id" required multiple>
          <?php if($brands){ 
          foreach($brands as $value){ ?>
          <option value="<?php echo $value->id;?>" ><?php echo $value->name; ?></option>
          <?php }
          } ?>
          </select>
        </div>
        <div class="col-md-2">
          <label class="label fontsize-15" for="name">Status</label>
          <select class="form-control fontsize-15" name="status" id="status" multiple>
          <?php if($status){ 
          foreach($status as $value){ ?>
          <option value="<?php echo $value;?>" ><?php echo $value; ?></option>
          <?php }
          } ?>
          </select>
        </div>
        <div class="col-md-2">
          <label class="label fontsize-15" style="visibility: hidden;display: block;margin-bottom: 4px;" for="usernmae">password</label>
          <button class="btn btn-sm btn-primary" id="btn-filter" name="button" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
              <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
            </svg>
            Filter
          </button>
          <button class="btn btn-sm btn-warning" name="button" type="button" onclick="export_excel()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
            </svg>
            Excel
          </button>
        </div>
      </form>
    </div>
    <style>
      .fontsize-14 {
    font-size: 12px;
}
    </style>
    <div class="section my-shadow mt-3">
        <p class="content-title"><?=$sub_title_2?></p>
        <div>
          <!--  class="mt-3" -->
          <table class="display fontsize-14" id="example" style="width:100%">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>Buyer NP Name	</th> 
                <th>Seller NP Name	</th> 
                <th>Order Create Date & Time	</th> 
                <th>Network Order Id	</th> 
                <th>Network Transaction Id	</th> 
                <th>Seller NP Order Id	</th> 
                <th>Seller NP Type (Marketplace Seller Node/ Inventory Seller Node)</th> 
                <th>Order Status	</th> 
                <th>Name of Seller	</th> 
                <th>SKU Name	</th> 
                <th>SKU Code	</th> 
                <th>Order Category (F&B/ Grocery/ Home & Decor)	</th> 
                <th>Shipped At Date & Time	</th> 
                <th>Delivered At Date & Time	</th> 
                <th>Delivery Type (On-network/ Off-network)	</th> 
                <th>Delivery City	</th> 
                <th>Cancelled At Date & Time	</th> 
                <th>Cancelled By (Buyer/ Seller/ Logistics)	</th> 
                <th>Cancellation Reason (Error Description)	</th> 
                <th>Cancellation Remark	</th> 
                <th>Total Order Value</th> 
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    tail.select("#hub_id",{
      search: true,
      multiple: true,
      multiSelectAll: true,
      animate: true,
      width:'100%',
      deselect:true,
      descriptions:true
    });
    tail.select("#brand_id",{
      search: true,
      multiple: true,
      multiSelectAll: true,
      animate: true,
      width:'100%',
      deselect:true,
      descriptions:true
    });
    tail.select("#status",{
      search: true,
      multiple: true,
      multiSelectAll: true,
      animate: true,
      width:'100%',
      deselect:true,
      descriptions:true
    });

    var oldExportAction = function (self, e, dt, button, config) {
			if (button[0].className.indexOf('buttons-excel') >= 0) {
				if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
				}
				else {
					$.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
				}
			} else if (button[0].className.indexOf('buttons-print') >= 0) {
				$.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
			}
		};

		var export_excel = function () {
      // download_orders
      let from_date = $('#from_date').val();
      let to_date = $('#to_date').val();
      let hubs = $('#hub_id').val();
      let brands = $('#brand_id').val();
      let status = $('#status').val();
      let search = $('.dataTables_filter input').val();
      $.ajax({
        url:"<?php echo site_url('Order/ajax_export_orders');?>",
        data:{from_date,to_date,hubs,brands,status,search},
        type:'POST',
        beforeSend: function() {
            $('#cust_loader').show();
        },
        xhr: function () {
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function () {
              if (xhr.readyState == 2) {
                  if (xhr.status == 200) {
                      xhr.responseType = "blob";
                  } else {
                      xhr.responseType = "text";
                  }
              }
          };
          return xhr;
        },
        success: function (data) {
          const date = new Date();
          if(data)
          {
            let fileName = `K@ ONDC Orders ( ${date.toLocaleDateString()} ).xls`
            //Convert the Byte Data to BLOB object.
            var blob = new Blob([data], { type: "application/octetstream" });

            //Check the Browser type and download the File.
            var isIE = false || !!document.documentMode;
            if (isIE) {
                window.navigator.msSaveBlob(blob, fileName);
            } else {
                var url = window.URL || window.webkitURL;
                link = url.createObjectURL(blob);
                var a = $("<a />");
                a.attr("download", fileName);
                a.attr("href", link);
                $("body").append(a);
                a[0].click();
                $("body").remove(a);
            }
            toastr.success('File Is Downloaded Successfully!');
          }
          else
            toastr.error('Error While Downloading The File!');

        },
        complete: function() {
          $('#cust_loader').fadeOut(1500);
        },
      });
    }
		var newExportAction = function (e, dt, button, config) {
			var self = this;
			var oldStart = dt.settings()[0]._iDisplayStart;

			dt.one('preXhr', function (e, s, data) {
				// Just this once, load all data from the server...
				data.start = 0;
				data.length = 2147483647;

				dt.one('preDraw', function (e, settings) {
					// Call the original action function 
					oldExportAction(self, e, dt, button, config);

					dt.one('preXhr', function (e, s, data) {
						// DataTables thinks the first item displayed is index 0, but we're not drawing that.
						// Set the property to what it was before exporting.
						settings._iDisplayStart = oldStart;
						data.start = oldStart;
					});

					// Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
					setTimeout(dt.ajax.reload, 0);

					// Prevent rendering of the full data to the DOM
					return false;
				});
			});

			// Requery the server with the new one-time export settings
			dt.ajax.reload();
		};

		var dt =  $('#example').DataTable( {
	        initComplete : function() {
		        var input = $('.dataTables_filter input').unbind(),
		            self = this.api(),
		            $searchButton = $('<button style="margin: 0px 2px 5px;" class="btn btn-primary btn-sm">')
		                      //  .text('Search')
		                       .addClass("searchb")
                           .prepend(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>`)
		                       .click(function() {
								              $('#form-filter')[0].reset();
                              console.log(input.val())
		                          self.search(input.val()).draw();
		                       }),
		            $clearButton = $('<button style="margin: 0px 2px 5px;" class="btn btn-danger btn-sm">')
		                      //  .text('Clear')
                           .prepend(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>`)
		                       .click(function() {
		                          input.val('');
		                          $searchButton.click(); 
		                       }) 
		        $('.dataTables_filter').append($searchButton, $clearButton);
		        $('.dataTables_filter input').on("keypress", function(e) {
					if (e.keyCode == 13) {
						$(".searchb").click();
					}
				});
		    }, 
			  processing: true,
		    serverSide: true,
		    // order: [],
		    ajax:{
		        url :"<?php echo site_url('Order/ajax_get_order_details')?>",
		        type: "POST",
		         beforeSend: function(msg){
              $('#cust_loader').show();
		      	},
		        data: function ( data ) {
		            data.from_date = $('#from_date').val();
		            data.to_date = $('#to_date').val();
		            data.hubs = $('#hub_id').val();
		            data.brands = $('#brand_id').val();
		            data.status = $('#status').val();
		            // data.start=num_rows
		            // data.length=10
		        },

		        error: function(){  // error handling
		            $(".example-grid-error").html("");
		            $("#example").append('<tbody class="example-grid-error text-center"><tr>No data found in the server</tr></tbody>');
		            $(".DTS_Loading").css("display","none");
		        },
		        complete:function(){
              $('#cust_loader').fadeOut(1500);
		        }
		    },
		    "columns": [
            {
              "class":          "details-control",
              "orderable":      false,
              "data":           null,
              "defaultContent": ""
		        },
		        { "data": "col_1" },
		        { "data": "col_2" },
		        { "data": "col_3" },
		        { "data": "col_4" },
		        { "data": "col_5" },
		        { "data": "col_6" },
		        { "data": "col_7" },
		        { "data": "col_8" },
		        { "data": "col_9" },
		        { "data": "col_10" },
		        { "data": "col_11" },
		        { "data": "col_12" },
		        { "data": "col_13" },
		        { "data": "col_14" },
		        { "data": "col_15" },
		        { "data": "col_16" },
		        { "data": "col_17" },
		        { "data": "col_18" },
		        { "data": "col_19" },
		        { "data": "col_20" },
		        { "data": "col_21" },
		        { "data": "col_22" },
		    ],
	        // dom: "frtiS",
        dom: 'Bfrtip',
        buttons: [
          // {
          //   extend: 'excel',
          //   className: 'btn btn-sm btn-warning',
          //   action: export_excel
          //   // action: newExportAction
          // },
          // {
          // 	text: 'Reload',
          // 	className: 'btn btn-info btn-sm',
          // 	action: function ( e, dt, node, config ) {
          // 		$('#form-filter')[0].reset();
          // 		dt.ajax.reload();
          // 	}
          // },
        ],
        columnDefs: [
            {
              targets: [11,12],
              visible: false,
              searchable: false,
            },
		    ],
		    scrollY: 420,
		    deferRender: true,
		    scroller: {
		        loadingIndicator: true
		    },
        scrollX: true,
        scrollCollapse: true,
        fixedHeader: {
          header: true,
        },
        ordering:false,
		     // stateSave: true
		});

    function format ( d ) {	
      let ready_to_pick_time =  d.col_14
      let out_for_delivery_time =  d.col_15
      let cancelled_time =  d.col_18
      let waiting_time =  d.col_23
      let accepted_time =  d.col_24
      let billed_time =  d.col_25
      let delivered_time =  d.col_26

			return '<div class="food-step-container"><p class="food-line-temp"></p><p class="food-line" id="food-line"></p><div class="food-status-container"> <button class="food-status"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="food-status-icon2" viewBox="0 0 16 16"> <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/> </svg> <span>Waiting </span> <span class="food-status-time">'+waiting_time+'</span> </button> <button class="food-status"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="food-status-icon" viewBox="0 0 16 16"> <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7l-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/> <path d="M5.354 7.146l.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/> </svg> <span>Accepted</span> <span class="food-status-time">'+accepted_time+'</span> </button> <button class="food-status"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="food-status-icon2" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg> <span>Billed </span> <span class="food-status-time">'+billed_time+'</span> </button> <button class="food-status"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="food-status-icon2" viewBox="0 0 16 16"> <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/> </svg> <span>Ready To Pickup </span> <span class="food-status-time">'+ready_to_pick_time+'</span> </button> <button class="food-status"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="food-status-icon2" viewBox="0 0 24 24"> <path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM5 12c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0 8.5c-1.9 0-3.5-1.6-3.5-3.5s1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5-1.6 3.5-3.5 3.5zm5.8-10l2.4-2.4.8.8c1.3 1.3 3 2.1 5.1 2.1V9c-1.5 0-2.7-.6-3.6-1.5l-1.9-1.9c-.5-.4-1-.6-1.6-.6s-1.1.2-1.4.6L7.8 8.4c-.4.4-.6.9-.6 1.4 0 .6.2 1.1.6 1.4L11 14v5h2v-6.2l-2.2-2.3zM19 12c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0 8.5c-1.9 0-3.5-1.6-3.5-3.5s1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5-1.6 3.5-3.5 3.5z"/> </svg> <span>Out for Delivery </span> <span class="food-status-time">'+out_for_delivery_time+'</span> </button> <button class="food-status"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="food-status-icon2" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/> <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/> </svg> <span>Delivered</span> <span class="food-status-time">'+delivered_time+'</span> </button> <button class="food-status"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="food-status-icon2" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg> Cancelled <span class="food-status-time">'+cancelled_time+'</span> </button></div></div>      <div class="row"><div class="col">'+d.child_table+'</div><div class="col"></div></div>';
        // <div class="col">'+d.customer_address+'</div>
		}
		function call_status(num)
		{
			if(num==10)
            {
                $(".food-status").removeClass('processed');
                $("#food-line").css({'width':+0+'px', 'transition':'0.5s'});
                $(".food-status .food-status-time").hide();
            }
            else
            {
                height = 200*num;
                $("#food-line").css({'width':+height+'px', 'transition':'0.5s'});
            }
            switch (num) {
                case 0:
                    $(".food-status").removeClass('processed');
                    $(".food-status .food-status-time").hide();
                    $(".food-status:nth-child(1)").addClass('processed');
                    $(".food-status:nth-child(1) .food-status-time").show();
                    $(".food-line").removeClass('cancelled');
                    $(".food-status:nth-child(7)").removeClass('cancelled');
                    break;
                case 1:
                    $(".food-status").removeClass('processed');
                    $(".food-status .food-status-time").hide();
                    $(".food-status:nth-child(1)").addClass('processed');
                    $(".food-status:nth-child(2)").addClass('processed');
                    $(".food-status:nth-child(1) .food-status-time").show();
                    $(".food-status:nth-child(2) .food-status-time").show();
                    $(".food-line").removeClass('cancelled');
                    $(".food-status:nth-child(7)").removeClass('cancelled');
                    break;
                case 2:
                    $(".food-status").removeClass('processed');
                    $(".food-status .food-status-time").hide();
                    $(".food-status:nth-child(1)").addClass('processed');
                    $(".food-status:nth-child(2)").addClass('processed');
                    $(".food-status:nth-child(3)").addClass('processed');
                    $(".food-status:nth-child(1) .food-status-time").show();
                    $(".food-status:nth-child(2) .food-status-time").show();
                    $(".food-status:nth-child(3) .food-status-time").show();
                    $(".food-line").removeClass('cancelled');
                    $(".food-status:nth-child(7)").removeClass('cancelled');
                    break;
                case 3:
                    $(".food-status").removeClass('processed');
                    $(".food-status .food-status-time").hide();
                    $(".food-status:nth-child(1)").addClass('processed');
                    $(".food-status:nth-child(2)").addClass('processed');
                    $(".food-status:nth-child(3)").addClass('processed');
                    $(".food-status:nth-child(4)").addClass('processed');
                    $(".food-status:nth-child(1) .food-status-time").show();
                    $(".food-status:nth-child(2) .food-status-time").show();
                    $(".food-status:nth-child(3) .food-status-time").show();
                    $(".food-status:nth-child(4) .food-status-time").show();
                    $(".food-line").removeClass('cancelled');
                    $(".food-status:nth-child(7)").removeClass('cancelled');
                    break;
                case 4:
                    $(".food-status").removeClass('processed');
                    $(".food-status .food-status-time").hide();
                    $(".food-status:nth-child(1)").addClass('processed');
                    $(".food-status:nth-child(2)").addClass('processed');
                    $(".food-status:nth-child(3)").addClass('processed');
                    $(".food-status:nth-child(4)").addClass('processed');
                    $(".food-status:nth-child(5)").addClass('processed');
                    $(".food-status:nth-child(1) .food-status-time").show();
                    $(".food-status:nth-child(2) .food-status-time").show();
                    $(".food-status:nth-child(3) .food-status-time").show();
                    $(".food-status:nth-child(4) .food-status-time").show();
                    $(".food-status:nth-child(5) .food-status-time").show();
                    $(".food-line").removeClass('cancelled');
                    $(".food-status:nth-child(7)").removeClass('cancelled');
                    break;
                case 5:
                    $(".food-status").removeClass('processed');
                    $(".food-status .food-status-time").hide();
                    $(".food-status:nth-child(1)").addClass('processed');
                    $(".food-status:nth-child(2)").addClass('processed');
                    $(".food-status:nth-child(3)").addClass('processed');
                    $(".food-status:nth-child(4)").addClass('processed');
                    $(".food-status:nth-child(5)").addClass('processed');
                    $(".food-status:nth-child(6)").addClass('processed');
                    $(".food-status:nth-child(1) .food-status-time").show();
                    $(".food-status:nth-child(2) .food-status-time").show();
                    $(".food-status:nth-child(3) .food-status-time").show();
                    $(".food-status:nth-child(4) .food-status-time").show();
                    $(".food-status:nth-child(5) .food-status-time").show();
                    $(".food-status:nth-child(6) .food-status-time").show();
                    $(".food-line").removeClass('cancelled');
                    $(".food-status:nth-child(7)").removeClass('cancelled');
                    break;
                case 6:
                    $(".food-status").removeClass('processed');
                    $(".food-status .food-status-time").hide();
                    // $(".food-status:nth-child(1)").addClass('processed');
                    // $(".food-status:nth-child(2)").addClass('processed');
                    // $(".food-status:nth-child(3)").addClass('processed');
                    // $(".food-status:nth-child(4)").addClass('processed');
                    // $(".food-status:nth-child(5)").addClass('processed');
                    // $(".food-status:nth-child(6)").addClass('processed');
                    $(".food-status:nth-child(7)").addClass('cancelled');
                    $(".food-status:nth-child(1) .food-status-time").show();
                    // $(".food-status:nth-child(2) .food-status-time").show();
                    // $(".food-status:nth-child(3) .food-status-time").show();
                    // $(".food-status:nth-child(4) .food-status-time").show();
                    // $(".food-status:nth-child(5) .food-status-time").show();
                    // $(".food-status:nth-child(6) .food-status-time").show();
                    $(".food-status:nth-child(7) .food-status-time").show();
                    $(".food-line").addClass('cancelled');
                    break;
            }
		}

	    var detailRows = [];
	    $('#example tbody').on( 'click', 'tr td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = dt.row( tr );
	        var idx = $.inArray( tr.attr('id'), detailRows );
	 
	        if ( row.child.isShown() ) {
	            tr.removeClass( 'details' );
	            row.child.hide();
	 
	            
	            detailRows.splice( idx, 1 );
	        }
	        else {
	            tr.addClass( 'details' );
				row.child( format( row.data() ) ).show();
				console.log(row.data().order_status_num);
				call_status(row.data().col_27)
	            if ( idx === -1 ) {
	                detailRows.push( tr.attr('id') );
	            }
	        }
	    } );

	    dt.on( 'draw', function () {
	        $.each( detailRows, function ( i, id ) {
	            $('#'+id+' td.details-control').trigger( 'click' );
	        });
	    });

    $('#btn-filter').click(function(){ 
        $('.dataTables_filter input').bind().val('')
		    $('#example').DataTable().ajax.reload();
		});

		$('#btn-reset').click(function(){ 
		    $('#form-filter')[0].reset();
		    $('#example').DataTable().ajax.reload()  
		});
    
		$('.dt-button').removeClass('dt-button');

</script>
<style type="text/css">
  td.details-control {
      background: url("<?php echo site_url('assets/icon/details_open.png');?>") no-repeat center center;
      cursor: pointer;
  }
  tr.details td.details-control {
      background: url("<?php echo site_url('assets/icon/details_close.png');?>") no-repeat center center;
  }
  .flex-center
  {
    display: flex;
    justify-content: center;
  }
  .input-container
  {
    flex: 1;
    margin: 3px;
  }

  /* .status_code {
        animation: blink-animation 1s steps(5, start) infinite;
        -webkit-animation: blink-animation 1s steps(5, start) infinite;
      }
      @keyframes blink-animation {
        to {
          visibility: hidden;
        }
      }
      @-webkit-keyframes blink-animation {
        to {
          visibility: hidden;
        }
      } */
</style>