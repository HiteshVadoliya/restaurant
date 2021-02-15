<?php
ini_set('max_execution_time', 3000);

/**
 * Class AppModel
 * @property CI_DB_active_record $db
 */
class AppModel extends CI_Model
{
    protected $currCompetition = 0;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * ------------------- Required Methods
     */

    /**
     * @param $username
     * @param $pass
     * @return bool
     */
    function login($username,$pass){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('email',$username);
        $this->db->where('password',md5($pass));
        $this->db->limit('user');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }
    }

    
    public function check_party_email_validation($email, $id)
    {
        $duplicate = 0;
        if($id > 0)
        {
            $email = trim(strtolower($email));
            $sql_list_query = "SELECT * FROM party WHERE TRIM(LOWER(email_id)) LIKE '%".addslashes($email)."%' AND party_id != $id";
            $query = $this->db->query($sql_list_query);
            $rows = $query->result_array();
            if(count($rows) > 0)
            {
                $duplicate = 1;
            }                  
        }   
        else
        {
            $email = trim(strtolower($email));
            $sql_list_query = "SELECT * FROM party WHERE TRIM(LOWER(email_id)) LIKE '%".addslashes($email)."%'";
            $query = $this->db->query($sql_list_query);
            $rows = $query->result_array();
            if(count($rows) > 0)
            {
                $duplicate = 1;
            }                  
        } 

        return $duplicate;     
    }

    /**
     * @param $table_name
     * @param $column_nm
     * @param $column_val
     * @return bool
     */
    function check_val_exist($table_name,$column_nm,$column_val){
        $this->db->where($column_nm,$column_val);
        $query = $this->db->get($table_name);
        $rows = $query->row_array();
        
        $res = "";
        if(count($rows) > 0)
        {
            $res = $rows;
        }
        else {
            $res = false;
        }
        
        return $res;
        //return $query->num_rows() > 0;
    }

    public function update_record($table,$wh,$data)
    {
        $this->db->where($wh)
               ->update($table, $data);
        return $this->db->affected_rows();
    }

    public function insert_record($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    /**
     * @return mixed
     */
    public function get_config()
    {
        return $this->db->get('config');
    }
    
    function decrease_product_current_stock($product_id, $current_stock){
		$this->db->where('product_id', $product_id);
		$this->db->set('current_stock', 'current_stock - '.$current_stock, FALSE);
		$result = $this->db->update('product');
		return $result;
	}

    function get_one_row($tbl_name, $wh=array())
    {
        $this->db->select("*");
        $this->db->from($tbl_name);
        if(count($wh) > 0 && $wh != '')
            $this->db->where($wh);
        $res = $this->db->get();
        $res = $res->row_array();
        return !empty($res)?$res:array();
    }

    function getAllRecord($tbl_name, $wh=array())
    {
        $this->db->select("*");
        $this->db->from($tbl_name);
        if(count($wh) > 0 && $wh != '')
            $this->db->where($wh);
        $res = $this->db->get();
        $res = $res->result_array();
        return !empty($res)?$res:array();
    }

}
