<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_pass extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->helper(array('form'));
		if ($this->session->userdata('logged_in')) {
			$this->load->view('change_pass');
		}else{
		$this->load->view('login_view');
		}
	}

}

/* End of file change_pass.php */
/* Location: ./application/controllers/change_pass.php */