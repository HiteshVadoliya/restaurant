<?php
class HWT extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->load->database();
	}

	function insert($table_name,$data_array) {
		if($this->db->insert($table_name,$data_array))
		{
			return $this->db->insert_id();
		}
		return false;
	}

	function update($table_name,$data_array,$where_array) {
		$this->db->where($where_array);
		$rs = $this->db->update($table_name, $data_array);
		return $rs;
	}

	function get_result($table_name,$rows="*",$where_array) {
		$this->db->select($rows);
		$this->db->from($table_name);
		$this->db->where($where_array);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	function get_one_row($table_name,$row="*",$where_array) {
		$this->db->select($row);
		$this->db->from($table_name);
		$this->db->where($where_array);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_column($tbl_name,$column_name,$where_array) {				
		$this->db->select($column_name);
		$this->db->from($tbl_name);
		$this->db->where($where_array);		
		$query = $this->db->get();
		return $query->row($column_name);
	}

	function get_num_rows($table_name,$where = array()) {
		if (!empty($where)) {
			$this->db->where($where);
		}
		$query = $this->db->get($table_name);
		return $query->num_rows();
	}

	function get_hwt($table_name,$rows = "*",$where_array = array(),$param = array()) {
		$this->db->select($rows);
		$this->db->from($table_name);
		if(!empty($where_array)) {
			$this->db->where($where_array);
		}

		if(isset($param['order_by_with']) && $param['order_by_with']!='') {
			$field = $param['order_by_with'];
			$order = $param['order_by'];
			$this->db->order_by($field, $order);
		}

		if(isset($param['search']) && $param['search']!="" && !empty($param['search_column'])) {
			$keyword = $param['search'];
			$this->db->group_start();		
			if(count($param['search_column'])==1) {
	        	$this->db->like($param['search_column'][0], $keyword);
			} else {
				foreach ($param['search_column'] as $key => $field) {
					if($key==0) {
	        			$this->db->like($field, $keyword);
					} else {
	        			$this->db->or_like($field, $keyword);
					}
				}
			}	
	        $this->db->group_end();
		}
		
		if(isset($param['limit']) && !empty($param['limit'])) {
			$this->db->limit($param['limit'][1],$param['limit'][0]);
		}

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	function hwt_join_1($tbl,$join,$rows="*",$where_array = array(),$param = array()) {
		
		$this->db->from($tbl[0]);
		foreach ($tbl as $key => $value) {
			if($key>0) {
				$this->db->join($tbl[$key], $join[$key-1]);
			}
		}
		$this->db->select($rows);

		if(isset($param['search']) && $param['search']!="" && !empty($param['search_column'])) {
			$keyword = $param['search'];
			$this->db->group_start();		
			if(count($param['search_column'])==1) {
	        	$this->db->like($param['search_column'][0], $keyword);
			} else {
				foreach ($param['search_column'] as $key => $field) {
					if($key==0) {
	        			$this->db->like($field, $keyword);
					} else {
	        			$this->db->or_like($field, $keyword);
					}
				}
			}	
	        $this->db->group_end();
		}

		if(!empty($where_array)) {
			$this->db->where($where_array);
		}
		
		if(isset($param['order_by_with']) && $param['order_by_with']!='') {
			$field = $param['order_by_with'];
			$order = $param['order_by'];
			$this->db->order_by($field, $order);
		}
		
		if(isset($param['limit']) && !empty($param['limit'])) {
			$this->db->limit($param['limit'][1],$param['limit'][0]);
		}

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function changeStatus($data) {
		$status = $data['status'] == '1' ? '0': '1';
		$this->db->where($data['id'], $data['editid']);
		$this->db->update($data['tbl'], array("status"=>$status) );        
		return TRUE;
	}
	public function hwt_delete($data) {
		$this->db->where($data['id'], $data['did']);
	 	$res = $this->db->update($data['tbl'], array("isDelete"=>1) );
		return $res;
	}

	public function hwt_hard_delete($data) {
		$this->db->where($data['id'], $data['did']);
	 	$res = $this->db->delete($data['tbl']);
		return $res;
	}
	function printr($res,$die = 0) {
		echo "<pre>";
		print_r($res);
		echo "</pre>";
		if($die) { die(); }
	}

	function get_encrypt($string, $key=ENCRYPTED) {
		$result = '';
		$string = PREFIX.$string;
		for($i=0, $k= strlen($string); $i<$k; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result .= $char;
		}
		return base64_encode($result);
	}

	function get_decrypt($string, $key=DECRYPTED) {
		$result = '';
		// echo $string;
		$string = base64_decode($string);
		for($i=0,$k=strlen($string); $i< $k ; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}
	function char_limit($string, $word_limit=30) {
		$words = explode(" ",$string);
		return implode(" ", array_splice($words, 0, $word_limit));
	}
	public function hwt_selected( $value , $data ) {
		if(!empty($data)) {
			$my_array = explode(",", $data);
			if(in_array($value, $my_array)) {
				return "selected";
			} else {
				return "";
			}
		}
	}

	public function hwt_send_mail($mail_data) {
	    $config = array();
	    $config['smtp_port']= "465";
	    $config['mailtype'] = 'html';
	    $config['charset']  = "utf-8";
	    $config['newline']  = "\r\n";
	    $config['smtp_timeout']='30';
	    $config['wordwrap'] = TRUE;
	    // load Email Library 

	    $CI =& get_instance();
	      
	    $CI->load->library('email');
	    //$this->load->library('email');

	    $CI->email->initialize($config);
	    $CI->email->from(FROM_EMAIL, SITE_NAME);

	    if(isset($mail_data['bcc']) && $mail_data['bcc']!='') {
	        $bcc_mail = rtrim($mail_data['bcc'],",");
	        /*$bcc_data = explode(",", $bcc_mail);
	        echo "<pre>";
	        print_r($bcc_data);
	        echo "</pre>";*/
	        $CI->email->bcc(  $bcc_mail );
	        /*foreach ($bcc_data as $bcc_key => $bcc_value) {
	            echo $bcc_value;
	            echo "<br>";
	        }*/
	    }
	    

	    $CI->email->to($mail_data['to_email']);
	    $CI->email->subject($mail_data['subject']);
	    $CI->email->message($mail_data['body']);        
	   
	    //Send mail 
	    if($CI->email->send()) 
	        return true;
	    else
	        return $this->email->print_debugger();

	}
	function sendConfirmation( $post ) {
	         
	        /* hwt_mail */

	        $mail_data = array();
	        $sitesetting = $this->SiteSetting_model->getSiteSetting();
	        $mail_data['site_logo'] = $sitesetting[0]->site_logo;
	        $mail_data['site_name'] = $sitesetting[0]->site_name;
	        $mail_data['address'] = $sitesetting[0]->address;
	        $from_email = FROM_EMAIL;

	        $subject = "Your Registration sendConfirmation";

	        $inner_html = '<table border="0" class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">';
	        $inner_html .= '<tr>
	            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;" colspan="2">
	              This is your registration confiramation
	            </td>
	          </tr>
	          <tr>
	            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
	              Name: -
	            </td>
	            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
	              '.$post["name"].'
	            </td>
	          </tr>
	          <tr>
	            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
	              Email :-
	            </td>
	            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
	              '.$post["email"].'
	            </td>
	          </tr>
	          <tr>
	            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
	              Mobile :-
	            </td>
	            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
	              '.$post["mobile"].'
	            </td>
	          </tr>';

	        $inner_html .= '</table><br/>';

	        $mail_data['inner_html'] = $inner_html;

	        $mail_data['user_name'] = $post['name'];
	        $email = $post['email'];
	        $message = $this->load->view('mail_template/employee_registration', $mail_data, TRUE);
	        $mail_data_send['to_email'] = $email;
	        $mail_data_send['bcc'] = "";
	        $mail_data_send['subject'] = $subject;
	        
	        $mail_data_send['body'] = $message;
	        $mail_result = $this->HWT->hwt_send_mail($mail_data_send);

	        if( $mail_result ) {
	            return true;
	        } else {
	            return false;
	        }
	        
	    }
}