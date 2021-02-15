<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 


class FrontController extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL,$extra = NULL){
		
		//$this->output->cache(20);
        $sitesetting = $this->SiteSetting_model->getSiteSetting();	
		$headerInfo['navTab'] = "home";
		$headerInfo['site_logo'] = $sitesetting[0]->site_logo;
		$headerInfo['site_favicon'] = $sitesetting[0]->site_favicon;
        $headerInfo['pageTitle'] = $sitesetting[0]->site_name .' '. $headerInfo['pageTitle'];
		// header Detail 
               
		if(!empty($extra)){
			$result = $this->pageHeader_model->getPageHeadersById($extra["id"]);
			$headerDetail["headerDetail"] = $result[0];
			$layout_data['headerDetail'] = $this->load->view('include/headerDetail', $headerDetail, true);
		}else{
			$layout_data['headerDetail'] = "";
		}


        $layout_data['header'] = $this->load->view('include/header', $headerInfo, true);
		$layout_data['footer'] = $this->load->view('include/footer','',true);
		$layout_data['content_body'] = $this->load->view($viewName, $pageInfo, true);
		 
		$this->load->view('layouts/main', $layout_data);
    }
    function generalSetting(){
        $sitesetting = $this->SiteSetting_model->getSiteSetting();
        return $sitesetting[0];
    }
    public function send_mail_global($from_email,$to_email,$subject,$message) {
        $config = array();
        $config['smtp_port']= "465";
        $config['mailtype'] = 'html';
        $config['charset']  = "utf-8";
        $config['newline']  = "\r\n";
        $config['smtp_timeout']='30';
        $config['wordwrap'] = TRUE;
        // load Email Library 
        $this->load->library('email');

        $this->email->initialize($config);
        $this->email->from($from_email, SITE_NAME);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);        

        //Send mail 
        if($this->email->send()) 
            return true;
        else
            return $this->email->print_debugger();
    }
    function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
		$this->load->library ( 'pagination' );

		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = $segment;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( $segment );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
	
    
    function get_select2_data($table_name, $id_column, $text_column, $search, $page = 1, $where = array())
    {
        $party_select2_data = array();
        $resultCount = 10;
        $offset = ($page - 1) * $resultCount;
        $this->db->select("$id_column,$text_column");
        $this->db->from("$table_name");
        if (!empty($where)) {
            $this->db->where($where);
        }
        if ($table_name == 'party') {
            $this->db->where("active !=", 0);
            $this->db->like("$text_column", $search);
        } else {
            /*$this->db->like("$text_column", $search, 'after');*/
            $this->db->like("$text_column", $search);
        }
        $this->db->limit($resultCount, $offset);
        $this->db->order_by("$text_column");
        $this->db->group_by("$text_column");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $party_row) {
                $party_select2_data[] = array(
                    'id' => $party_row->$id_column,
                    'text' => $party_row->$text_column,
                );
            }
        }
        return $party_select2_data;
    }

    function count_select2_data($table_name, $id_column, $text_column, $search, $where = array())
    {
        $this->db->select("$id_column");
        $this->db->from("$table_name");
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->like("$text_column", $search, 'after');
        $this->db->group_by("$text_column");
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function get_select2_text_by_id($table_name, $id_column, $text_column, $id_column_val)
    {
        $this->db->select("$id_column,$text_column");
        $this->db->from("$table_name");
        $this->db->where($id_column, $id_column_val);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            echo json_encode(array('success' => true, 'id' => $id_column_val, 'text' => $query->row()->$text_column));
            exit();
        }
        echo json_encode(array('success' => true, 'id' => '', 'text' => '--select--'));
        exit();
    }
    
	
}