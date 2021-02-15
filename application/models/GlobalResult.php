<?php

class GlobalResult extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->load->database();
	}

	function get_roles() {

		$roles = $this->HWT->get_result('tbl_roles','*',array());
		return $roles;
	}
}