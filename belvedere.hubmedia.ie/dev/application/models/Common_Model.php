<?php
class Common_Model extends CI_Model {

	############################### Get Value from Database for specific field ########################

	function getValue($tableName, $field_name, $where){
		$query = $this->db->get_where($tableName, $where);
		$row = $query->row_array();
		return $row[$field_name]; exit;
	}

	

	############################### Return array from specific table ########################

	function getData($tableName, $param){
		$query = $this->db->get_where($tableName, $param);
		return $query->result();
	}

	############################### Return all array from specific table ########################

	function getAll($table,$where_clause=NULL,$order_by_fld=NULL,$order_by=NULL,$limit=NULL,$offset=NULL) {
		if($where_clause != '')
			$this->db->where($where_clause);

        if($order_by_fld != '')
		    $this->db->order_by($order_by_fld,$order_by);

		if($limit != '' && $offset !='')
		    $this->db->limit($limit,$offset);		

		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();  
		return $query->result();
	}

	function getUpcomingEvent($table,$where_clause=NULL,$order_by_fld=NULL,$order_by=NULL,$limit=NULL,$offset=NULL) {
		if($where_clause != '')
			$this->db->where($where_clause);

        if($order_by_fld != '')
		    $this->db->order_by($order_by_fld,$order_by);

		if($limit != '' && $offset !='')
		    $this->db->limit($limit,$offset);		
		$today = date('Y-m-d h:m:s');
		$this->db->where("end_date > '".$today."'");

		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();  
		return $query->result();
	}

	############################### Return a array from specific table ########################

	function getSingle($table,$where_clause=NULL,$order_by_fld=NULL,$order_by=NULL,$limit=NULL,$offset=NULL) {
		if($where_clause != '')
			$this->db->where($where_clause);

        if($order_by_fld != '')
		    $this->db->order_by($order_by_fld,$order_by);

		if($limit != '' && $offset !='')
		    $this->db->limit($limit,$offset);		

		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();  
		 return $query->row(); 
	}

	############################### Delete array from specific table ########################

	function deleteData($table,$where)
	{
		$this->db->delete($table, $where); 
	}

	############################### Update array for specific table ########################

	function updateValue($row,$table,$where_clause) {
		$this->db->where($where_clause);
		$this->db->update($table, $row);
		$temp=$this->db->affected_rows();
		return $temp;

	}

	############################### Count array for specific table ########################

	function getCount($table,$where_clause =null,$order_by_fld=null,$order_by=null,$limit=null,$offset=null) {
		if($where_clause != '')
			$this->db->where($where_clause);
			
		 if($order_by_fld != '')
		    $this->db->order_by($order_by_fld,$order_by);
			
		if($limit != '' && $offset !='')
		    $this->db->limit($limit,$offset);
			
		 $this->db->select('*');
		 $this->db->from($table);
		 $query = $this->db->get();  
		 return $query->num_rows(); 
	}

	############################### Insert array for specific table ########################

	function insertValue($table, $row)
	{
		$str = $this->db->insert_string($table, $row);        
		$query = $this->db->query($str);    
		$insertid = $this->db->insert_id();
		return $insertid;
	}

	/******************************* My Common Function ************************/

	function getResults($filed='*',$tbl,$where=null,$order_by_fld=null,$order_by='DESC',$limit=null,$offset=null){
		if($tbl){
			$this->db->select($filed);
			$this->db->from($tbl);
			if($where != '')
				$this->db->where($where);
			if($order_by_fld != '')
		    	$this->db->order_by($order_by_fld,$order_by);	
			
			if($limit != '' && $offset !='')
		    	$this->db->limit($limit,$offset);
			$query = $this->db->get();	
			return $query->result_array();
			//echo $this->db->last_query();
		}
		else{
			return FALSE;
		}	
	} 

	function getSingleRow($filed='*',$tbl,$where=NULL,$order_by_fld=NULL,$order_by='DESC',$limit=1,$offset=NULL){
		if($tbl){
			$this->db->select($filed);
			$this->db->from($tbl);
			if($where != '')
				$this->db->where($where);
			if($order_by_fld != '')
		    	$this->db->order_by($order_by_fld,$order_by);	
			if($limit != '' && $offset !='')
		    	$this->db->limit($limit,$offset);
			$query = $this->db->get();
			$this->db->last_query();
			return $query->row_array();
		}
		else{
			return FALSE;
		}
	}

	function getHeaderMenu(){
		$this->db->select('page_title,slug');
		$this->db->from('tbl_pages');
		$array = array('slug !=' => 'home', 'status ' => 'Active');
		
		$this->db->where($array);
		$this->db->where('display_on','1');
		
		$this->db->or_where('display_on','3');
		$this->db->order_by("order","ASC"); 
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}

	function getFooterMenu(){
		$this->db->select('page_title,slug');
		$this->db->from('tbl_pages');
		$this->db->where('status','Active');
		$this->db->where('display_on','2');
		$this->db->or_where('display_on','3');
		$this->db->order_by("order","ASC"); 
		$query = $this->db->get();	
		return $query->result_array();
	}
	
	function getActiveTheme(){
		$this->db->select('main_css,font_css,reset_css');
		$this->db->from('rbd_theme');
		$this->db->where('status','1');
		$query = $this->db->get();	
		return $query->row_array();
	}

	function batch_insert($table_name,$data_array){
		$this->db->insert_batch($table_name, $data_array);
	}
	
	function show_total(){
		$album_id = $this->session->userdata('album_id');
		$this->db->select('count(*) as total_cart_item');
		$this->db->from('tbl_cart C');
		$this->db->where('C.album_id',$album_id);
		$query = $this->db->get();
		return $query->row();
	}
}

?>