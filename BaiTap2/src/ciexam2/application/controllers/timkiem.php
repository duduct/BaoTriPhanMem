<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timkiem extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index($search_terms = '')
	{
			if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->load->model("md_quanly");
				$data["trams"]=$this->md_quanly->getTram();
				$data["donvis"]=$this->md_quanly->getDonvi();
				$data["tinhtrangs"]=$this->md_quanly->getTinhTrang();
				$this->load->view('timkiem/timkiem', $data, FALSE);
			}
			else{
				redirect('login','refresh');
			}
	}
	
    function searchAjax(){
    	$this->load->model('md_timkiem');
    	$results = $this->md_timkiem->search($_GET['sono'], $_GET['madv'], $_GET['matram'], $_GET['matt'], $_GET['congsuat']);
    	$data["results"] = $results;
    	$this->load->view('timkiem/timkiem-result', $data);
    }
}

/* End of file timkiem.php */
/* Location: ./application/controllers/timkiem.php */