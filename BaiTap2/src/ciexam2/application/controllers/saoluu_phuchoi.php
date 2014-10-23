<?php
class Saoluu_phuchoi extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('quanly/saoluu');
	}
	
	public function backup(){
		$this->load->view('quanly/backup');
	}
	
	public function restore(){
		$this->load->view('quanly/restore');
	}
}