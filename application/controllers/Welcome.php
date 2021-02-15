<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/FrontController.php';
class Welcome extends FrontController {

	public function index()
	{
	    $result = array();
	    $res = $this->HWT->get_result('newspaper',"*",array("isDelete"=>0, "status" => 1));
	    $result['data'] = $res;
	    $this->load->view("home",$result);
	}
	public function policy()
	{
	    $this->load->view("policy");
	}
}
