<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if ($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('home_view', $data, FALSE);
		}
		else{
			redirect('login','refresh');
		}
	}
	public function logout()
	{
		 $this->session->unset_userdata('logged_in');
		redirect('/login','refresh');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */