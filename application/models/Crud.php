<?php

/**
 * Class Crud
 * &@property CI_DB_active_record $db
 */
class Crud extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->load->database();
	}

	/**
	 * @param $table_name
	 * @param $data_array
	 * @return bool
	 */
	function insert($table_name,$data_array) {
		if($this->db->insert($table_name,$data_array))
		{
			return $this->db->insert_id();
		}
		return false;
	}

	function insertFromSql($sql) {
		$this->db->query($sql);
		return $this->db->insert_id();
	}

	function execuetSQL($sql) {
		$this->db->query($sql);
	}
    
	function getFromSQL($sql) {
		return $this->db->query($sql)->result();
	}

	/**
	 * @param $table_name
	 * @param $order_by_column
	 * @param $order_by_value
	 * @return bool
	 */
	function get_all_records($table_name,$order_by_column,$order_by_value) {
		$this->db->select("*");
		$this->db->from($table_name);
		$this->db->order_by($order_by_column,$order_by_value);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	/**
	 * @param $table_name
	 * @param $order_by_column
	 * @param $order_by_value
	 * @param $where_array
	 * @return bool
	 */
	function get_all_with_where($table_name,$order_by_column,$order_by_value,$where_array) {
		$this->db->select("*");
		$this->db->from($table_name);
		$this->db->where($where_array);
		$this->db->order_by($order_by_column,$order_by_value);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	/**
	 * @param $table_name
	 * @param array $where
	 * @return mixed
	 */
	function get_record_with_where_limit($table_name,$where = array(),$limit='') {
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
		$query = $this->db->get($table_name);
		
		return $query->result_array();
	}

	function get_num_rows_with_where($table_name,$where = array()) {
		if (!empty($where)) {
			$this->db->where($where);
		}
		$query = $this->db->get($table_name);
		return $query->num_rows();
	}

	/**
	 * @param $tbl_name
	 * @param $column_name
	 * @param $where_id
	 * @return mixed
	 */
	function get_column_value_by_id($tbl_name,$column_name,$where_id) {				
		$this->db->select("*");
		$this->db->from($tbl_name);
		$this->db->where($where_id);		
		$this->db->last_query();
		$query = $this->db->get();
		return $query->row($column_name);
	}

	/**
	 * @param $table_name
	 * @param $where_id
	 * @return mixed
	 */
	function get_row_by_id($table_name,$where_id) {
		$this->db->select("*");
		$this->db->from($table_name);
		$this->db->where($where_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	/**
	 * @param $table_name
	 * @param $where_array
	 * @return mixed
	 */
	function delete($table_name,$where_array) {		
		$result = $this->db->delete($table_name,$where_array);
		return $result;
	}

	/**
	 * @param $table_name
	 * @param $data_array
	 * @param $where_array
	 * @return mixed
	 */
	function update($table_name,$data_array,$where_array) {
		$this->db->where($where_array);
		$rs = $this->db->update($table_name, $data_array);
		return $rs;
	}

	/**
	 * @return string
	 */
	function get_state() {
		if(isset($_POST['country_id'])) {

			$countryID =  $_POST['country_id'];
			$where = array('country_id'=>$countryID);
			$result = $this->get_all_with_where('state','state_id','ASC',$where);
			$option = '<option value="">Select State</option>';

			if($result)
			{
				foreach ($result as $row) {
					$state_id = $row->state_id;
					$state = $row->state;
					$option .= '<option value="'.$state_id.'">'.$state.'</option>';
				}
			}
			return $option;
		}
	}

	/**
	 * @param $name
	 * @param $path
	 * @return bool
	 */
	function upload_file($name, $path) {
		$config['upload_path'] = $path;
		$config ['allowed_types'] = '*';
		$this->upload->initialize($config);
		if($this->upload->do_upload($name))
		{
			$upload_data = $this->upload->data();
			return $upload_data['file_name'];
		}
		return false;
	}

	/**
	 * @param $table
	 * @param $column
	 * @param $search_value
	 * @param array $where
	 * @return mixed
	 */
	function getAutoCompleteData($table,$column,$search_value,$where = array())	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($where)) {
			$this->db->where($where);
		}
		$this->db->like($column, $search_value);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * @param $table
	 * @param $id_column
	 * @param $column
	 * @param $column_val
	 * @return null
	 */
	function get_id_by_val($table,$id_column,$column,$column_val) {
		$this->db->select($id_column);
		$this->db->from($table);
		$this->db->where($column,$column_val);
		$this->db->limit('1');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row()->$id_column;
		} else {
			return null;
		}
	}

	function limit_words($string, $word_limit=30) {
		$words = explode(" ",$string);
		return implode(" ", array_splice($words, 0, $word_limit));
	}
	
	function limit_character($string, $character_limit=30) {
		if (strlen($string) > $character_limit) {
			return substr($string, 0, $character_limit).'...';
		}else{
			return $string;
		}
	}
	
	//select data 
	function get_select_data($tbl_name)	{
		$this->db->select("*");
		$this->db->from($tbl_name);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * @param $tbl_name
	 * @param $where
	 * @param $where_id
	 * @return mixed
	 */
	function get_data_row_by_id($tbl_name,$where,$where_id)	{
		$this->db->select("*");
		$this->db->from($tbl_name);
		$this->db->where($where,$where_id);
		$query = $this->db->get();
		return $query->row();
	}
    
	function get_result_where_array($tbl_name,$where_array ){
		$this->db->select("*");
		$this->db->from($tbl_name);
		$this->db->where($where_array);
		$query = $this->db->get();
		return $query->result();
	}

	function get_result_where($tbl_name,$where,$where_id) {
		$this->db->select("*");
		$this->db->from($tbl_name);
		$this->db->where($where,$where_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function getTimeZone() {
		$this->db->select('id, name, description, gmt, CONCAT_WS(" ", gmt,description) AS timezone', FALSE);
		$this->db->from('timezone');
		$this->db->where('status', 1);
		$this->db->where('isDelete', 0);
		$query = $this->db->get();
		return $query->result_array();
	}
    
}
