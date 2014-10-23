<?php
	class Thongke extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->database();	
		}
		public function index(){
			if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->load->model("md_thongke");
				$data["data_getdv"]=$this->md_thongke->get_donvi();
				$this->load->view("thongke/thongke",$data);
			}
			else{
				redirect('login','refresh');
			}	
		}
		public function tatca(){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["data"]=$this->md_thongke->get_donvitk();
			$data["title"]=array("Thống kê theo Đơn Vị","Tên đơn vị","dv");
			$this->load->view("thongke/thongketatca",$data);
		}
		public function tchangsanxuat(){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["data"]=$this->md_thongke->get_hsx();
			$data["title"]=array("Thống kê Theo Hảng Sản Xuất","Tên hảng sản xuất","hsx");
			$this->load->view("thongke/thongketatca",$data);
		}
		public function tctinhtrang(){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["data"]=$this->md_thongke->get_tt();
			$data["title"]=array("Thống kê Theo Tình Trạng","Tên tình trạng","tt");
			$this->load->view("thongke/thongketatca",$data);
		}
		public function tcdonvi(){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["data"]=$this->md_thongke->get_donvitk();
			$data["title"]=array("Thống kê Đơn vị","Tên đơn vị","dv");
			$this->load->view("thongke/thongketatca",$data);
		}
		public function tccongsuat(){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["data"]=$this->md_thongke->get_cs();
			$data["title"]=array("Thống kê Theo Công Suất","Công Xuất","cs");
			$this->load->view("thongke/thongketatca",$data);
		}
		public function xuatexcel_tatca($value){
			$this->load->model("md_thongke");
			if($value=="dv"){
				$data["data"]=$this->md_thongke->get_donvitk();
				$data["title"]=array("Tên đơn vị","Đơn vị");
				$data["ti"]="Tất cả";
				$this->load->view("thongke/thongkeexcel_tatca.php",$data);
			}
			if($value=="hsx"){
				$data["data"]=$this->md_thongke->get_hsx();
				$data["ti"]="Tất cả";
				$data["title"]=array("Tên hảng sản xuất","Hảng sản xuất");
				$this->load->view("thongke/thongkeexcel_tatca.php",$data);
			}
			if($value=="tt"){
				$data["data"]=$this->md_thongke->get_tt();
				$data["ti"]="Tất cả";
				$data["title"]=array("Tên tình trạng","Tình trạng");
				$this->load->view("thongke/thongkeexcel_tatca.php",$data);
			}
			if($value=="cs"){
				$data["data"]=$this->md_thongke->get_cs();
				$data["ti"]="Tất cả";
				$data["title"]=array("Công suất","Công suất");
				$this->load->view("thongke/thongkeexcel_tatca.php",$data);
			}
		}	
		public function donvi($value){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["madv"]=$this->md_thongke->get_madv($value);
			$data["data"]=$this->md_thongke->get_donvitkdv($value);
			$data["title"]=$this->md_thongke->get_title($value);	
			$data["title1"]=array("Thống kê Theo Đơn Vị","Tên đơn vị","dv");
			$this->load->view("thongke/thongke_",$data);
		}
		public function hangsanxuat($value){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["madv"]=$this->md_thongke->get_madv($value);
			$data["data"]=$this->md_thongke->get_hsxdv($value);
			$data["title"]=$this->md_thongke->get_title($value);	
			$data["title1"]=array("Thống kê Theo Hảng Sản Xuất","Tên hảng sản xuất","hsx");
			$this->load->view("thongke/thongke_",$data);
		}
		public function tinhtrang($value){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["madv"]=$this->md_thongke->get_madv($value);
			$data["data"]=$this->md_thongke->get_ttdv($value);
			$data["title"]=$this->md_thongke->get_title($value);	
			$data["title1"]=array("Thống kê Theo Tình Trạng","Tên tình trạng","tt");
			$this->load->view("thongke/thongke_",$data);
		}
		public function congsuat($value){
			$this->load->model("md_thongke");
			$data["data_getdv"]=$this->md_thongke->get_donvi();
			$data["madv"]=$this->md_thongke->get_madv($value);
			$data["data"]=$this->md_thongke->get_csdv($value);
			$data["title"]=$this->md_thongke->get_title($value);	
			$data["title1"]=array("Thống kê Theo Công Suất","Công Suất","cs");
			$this->load->view("thongke/thongke_",$data);
		}
		public function xuatexcel_donvi($value,$value1){
			$this->load->model("md_thongke");
			if($value1=="dv"){
				$data["data"]=$this->md_thongke->get_donvitkdv($value);
				$data["title1"]=$this->md_thongke->get_title($value);
				$data["title"]=array("Tên đơn vị","Đơn vị");
				$this->load->view("thongke/thongkeexcel.php",$data);
			}
			if($value1=="hsx"){
				$data["data"]=$this->md_thongke->get_hsxdv($value);
				$data["title1"]=$this->md_thongke->get_title($value);
				$data["title"]=array("Tên hảng sản xuất","Hảng sản xuất");
				$this->load->view("thongke/thongkeexcel.php",$data);
			}
			if($value1=="tt"){
				$data["data"]=$this->md_thongke->get_ttdv($value);
				$data["title1"]=$this->md_thongke->get_title($value);
				$data["title"]=array("Tên tình trạng","Tình trạng");
				$this->load->view("thongke/thongkeexcel.php",$data);
			}
			if($value1=="cs"){
				$data["data"]=$this->md_thongke->get_csdv($value);
				$data["title1"]=$this->md_thongke->get_title($value);
				$data["title"]=array("Công suất","Công suất");
				$this->load->view("thongke/thongkeexcel.php",$data);
			}
		}
	}
?>