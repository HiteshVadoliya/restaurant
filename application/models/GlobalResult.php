<?php

class GlobalResult extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->load->database();
	}

	function get_roles( $roleId = '' ) {

		$wh = array();
		if( isset($roleId) && !empty($roleId) ) {
			$wh = array("roleId"=>$roleId);
		}

		$roles = $this->HWT->get_result('tbl_roles','*',$wh);
		return $roles;
	}
	function get_weeks( $day = '' ) {

		$wh = array();
		if( isset($day) && !empty($day) ) {
			$wh = array("day_number"=>$day);
		}

		$weekday = $this->HWT->get_result('weekday','*',$wh);
		return $weekday;
		
	}
	function get_restaurant() {

		$restaurant = $this->HWT->get_result('restaurant',"restaurant_id,res_name,res_phone", array( "isDelete" => 0, "status" => 1 ));
		if( isset($restaurant) && !empty($restaurant) ) {
			return $restaurant;
		} else {
			return array();
		}
	}

	function get_shift() {
		$shift = array(
			"1" => "Day Shift",
			"2" => "Night Shift",
		);
		return $shift;
	}

	function get_date_formate() { // for datepicker code
		return "dd-mm-yyyy";
	}
	function get_date_formate_for_display() { // for php
		return "d-m-Y";
	}

	function save_date_formate( $date ) {
		$date = date("Y-m-d", strtotime($date));
		return $date;
	}
	function display_date_formate( $date ) {
		$dis_formate = $this->get_date_formate_for_display();
		$date = date($dis_formate, strtotime($date));
		return $date;
	}
}