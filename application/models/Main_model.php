<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	
	
	
	public function run_manual_query_with_return_nof_affected_rows($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query=$SDB->query($query);
		return $SDB->affected_rows();
	}
	
		function multiple_insert($table_name,$data,$db='default')
	{ 
		$SDB = $this->load->database($db, TRUE); 
		$SDB->insert_batch($table_name, $data); 
		return $SDB->insert_id();
	}
	public function run_manual_query_with_return_row($query,$db='default')
	{
		$SDB = $this->load->database($db, TRUE); 
		$query=$SDB->query($query);
		return $query->row();
	}
	  public function delete_row_from_table($tablename,$where,$db='default')
    {   	
		$SDB = $this->load->database($db, TRUE); 
		$SDB->delete($tablename,$where);	
		return $SDB->affected_rows();
    }
	public function run_manual_query_with_return($query)
	{
		$query=$this->db->query($query);
		return $query->result();
	}
	public function run_manual_query_row_count($query)
	{
		$query=$this->db->query($query);
		return $query->num_rows();
	}
	public function fetch_my_data($query)
	{
		$query=$this->db->query($query);
		return $query->result();
	}
	public function run_manual_query_with_row($query)
	{
		$query=$this->db->query($query);
		return $query->row();
	}  
		function run_manual_query_return_result($query)
	{
		$query=$this->db->query($query);
		return $query->result();
	}
	public function select_authentication($append)
{
	$this->db->select('*');
	$this->db ->from('loginuser');
	$this->db->where($append);
	$log=$this->db->get();
	return $log->row();
	
}
public function loyalty()
	{
		    $this->db->select('*');
			$this->db->from('loyalty_master');
			$query = $this->db->get();  
            return $query->row();		
}
	function insert_toloyalty($data)
{
$this->db->insert('loyalty_master', $data);
}
	

function insert_todummy($data)
{
$this->db->insert('1dummy', $data);

} 
public function Delete_loyalty($query)
	{
		$this->db->query($query);
	}
	
	function select_from_where_ROW($select,$from,$where)
	{
		$this->db->select($select);
		$this->db->from($from);
		$this->db->where($where);
		$query=$this->db->get();
		return $query->row();
	}
	public function update_table($tablename,$data,$where)
    {
   	 	$this->db->where($where);
		$this->db->update($tablename,$data);	
    }
    
    
    
    public function run_manual_query($query)
	{
		$query=$this->db->query($query);
		
	}

    public function table_existss($query)
	{
		$query=$this->db->table_exists($query);
		return $query;
	}
	
	function insert_table($table_name,$data)
	{
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
	}
}
?>