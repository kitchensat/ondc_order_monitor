<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class multidb_model extends CI_Model {
	function multiple_insert($table_name,$data,$db='default')
	{ 
		$SDB = $this->load->database($db, TRUE); 
		$SDB->insert_batch($table_name, $data); 
		return $SDB->insert_id();
	}
	public function multiple_update($tablename,$data,$where,$db='default')
   	{
		$SDB = $this->load->database($db, TRUE); 
		$SDB->update_batch($tablename, $data, $where); 
		return $SDB->affected_rows();
   	}
	 public function run_manual_query($query)
	{
		//$DB2   = $this->load->database('second', TRUE);
		//$query = $DB2->query($query);
		$query=$this->db->query($query);
	}
	function insert_table($table_name,$data,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$SDB->insert($table_name,$data);
		return $SDB->insert_id();
	}
	
 	public function update_table($tablename,$data,$where,$db='default')
    {
   	 	$SDB = $this->load->database($db, TRUE); 
		$SDB->where($where);
		$SDB->update($tablename,$data);	
		return $SDB->affected_rows();
    }
    public function delete_row_from_table($tablename,$where,$db='default')
    {   	
		$SDB = $this->load->database($db, TRUE); 
		$SDB->delete($tablename,$where);	
		return $SDB->affected_rows();
    }
     public function update_table_wherein($tablename,$data,$where_column,$where_data,$db='default')
    {
   	 	$SDB = $this->load->database($db, TRUE); 
		$SDB->where_in($where_column,$where_data);
		$SDB->update($tablename,$data);	
		return $this->db->affected_rows();
    }

	public function run_manual_query_numrows($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$SDB->query($query);
		return $SDB->affected_rows();
	}	
    public function run_manual_query_with_return($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query=$SDB->query($query);
		return $query->result();
	}
	function run_manual_query_return_result($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query=$SDB->query($query);
		return $query->result();
	}
	public function run_manual_query_with_return_row($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query=$SDB->query($query);
		return $query->row();
	}
	public function run_manual_query_with_return_array($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query=$SDB->query($query);
		return $query->result_array();
	}
    public function run_manual_query_with_return_error($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query=$SDB->query($query);
		if(!$query)
		{
			return  $error = $this->db->error();
		}
		else
		{
			return $query->result();
		}
		
	}	
	public function run_manual_query_numrows_error($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query1 = $SDB->query($query);
		if(!$query1)
		{
			return  $SDB->db->error();
		}
		else
		{
			return $SDB->affected_rows();
		}		
	}		
}
?>