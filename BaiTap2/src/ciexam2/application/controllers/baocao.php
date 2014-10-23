<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baocao extends CI_Controller {
	public function __construct(){
			parent::__construct();
			$this->load->database();	
		}
		public function index(){
			if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->load->model("md_baocao");
				$data["data_getdv"]=$this->md_baocao->get_donvi();
				$this->load->view("baocao/baocao",$data);
			}
			else{
				redirect('login','refresh');
			}	
		}
		public function tatca(){
			$this->load->model("md_baocao");
			$data["bc_tatca"] = $this->md_baocao->tatca();
			$data["data_getdv"]=$this->md_baocao->get_donvi();	
			$data["data_gettt"]=$this->md_baocao->get_tinhtrang();
			$data["title_tt"] = NULL;
			$this->load->view("baocao/baocaotatca",$data);
		}
		public function donvi($value){
			$this->load->model("md_baocao");
			$data["title_bc"] = NULL;
			$data["data_getdv"]=$this->md_baocao->get_donvi();	
			$data["data_bcdv"]=$this->md_baocao->donvi($value);
			$data["title"]=$this->md_baocao->get_title($value);
			$data["madv"]=$this->md_baocao->get_madv($value);
			$data["data_gettt"]=$this->md_baocao->get_tinhtrang();
			$data["title_tt"]=$this->md_baocao->get_tinhtrang_($value);
			$this->load->view("baocao/baocao_",$data);
		}
		public function tctinhtrang($value){
			$this->load->model("md_baocao");
			$data["bc_tatca"] = $this->md_baocao->bc_tatca_tt($value);
			$data["data_getdv"]=$this->md_baocao->get_donvi();	
			$data["data_gettt"]=$this->md_baocao->get_tinhtrang();
			$data["title_tt"]=$this->md_baocao->get_tinhtrang_($value);
			$this->load->view("baocao/baocaotatca_tt",$data);
		}
		public function tinhtrang($value,$value1){
			$this->load->model("md_baocao");
			$data["data_getdv"]=$this->md_baocao->get_donvi();	
			$data["data_bcdv"]=$this->md_baocao->bc_donvi_tt($value,$value1);
			$data["title"]=$this->md_baocao->get_title($value);
			$data["madv"]=$this->md_baocao->get_madv($value);
			$data["data_gettt"]=$this->md_baocao->get_tinhtrang();
			$data["title_tt"]=$this->md_baocao->get_tinhtrang_($value1);
			$this->load->view("baocao/baocao_tt",$data);
		}
		public function xuatexcel_tatca(){
			//Ket noi CSDL			
			$this->load->model("md_baocao");
			$data["data"]=$this->md_baocao->tatca();
			$this->load->view("baocao/baocaoexcel.php",$data);
		}
		public function xuatexcel_tatca_tt($value){
			$this->load->model("md_baocao");
			$data["title_tt"]=$this->md_baocao->get_tinhtrang_($value);
			$data["data"]=$this->md_baocao->bc_tatca_tt($value);
			$this->load->view("baocao/baocaoexcel_tatca_tt.php",$data);
		}
		public function xuatexcel_donvi_tt($value,$value1){
			$this->load->model("md_baocao");
			$data["title"]=$this->md_baocao->get_title($value);
			$data["title_tt"]=$this->md_baocao->get_tinhtrang_($value1);
			$data["data"]=$this->md_baocao->bc_donvi_tt($value,$value1);
			$this->load->view("baocao/baocaoexcel_donvi_tt.php",$data);
		}
		public function xuatexcel_donvi($value){
			//Ket noi CSDL			
			$this->load->model("md_baocao");
			$data["title"]=$this->md_baocao->get_title($value);
			$data["data"]=$this->md_baocao->donvi($value);
			$this->load->view("baocao/baocaoexcel_donvi.php",$data);
		}
	}


/* End of file baocao.php */
/* Location: ./application/controllers/baocao.php */
?>