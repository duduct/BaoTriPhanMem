<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quanly extends CI_Controller {
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
				$this->load->helper(array('form'));
				$this->load->model('md_quanly');
				$data['donvi']=$this->md_quanly->getDonvi();
				$data['tram'] = $this->md_quanly->getTram();
				switch ($this->uri->uri_string) {
				case '/quanly/tram/':
					
			        	redirect('/quanly/tram/');
					break;
				case '/quanly/donvi/':
					
			        	redirect('/quanly/donvi/');
					break;
				case '/quanly/hangsanxuat/':
			        	redirect('/quanly/hangsanxuat/');
					break;
				
				}
			}
			else{
				redirect('login','refresh');
			}
	}
	public function donvi(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		if ($this->input->post('submit')=='Xóa'){
			$this->form_validation->set_rules('txtM_DV','MaDonVi','required|max_length[20]|trim|xss_clean|callback_ktXoaDonvi');
			if ($this->form_validation->run() == FALSE){
				$this->index();
			}
			else{
				$this->load->model('md_quanly');
				$this->md_quanly->deleteDonvi($this->input->post('txtM_DV'));
				$this->index();
				echo '<script>alert("Xóa thành công!");</script>';
			}
		}
		else {
			$this->form_validation->set_rules('txtM_DV','MaDonVi','required|max_length[5]|trim|xss_clean');
			$this->form_validation->set_rules('txtT_DV','TenDonVi','required|max_length[100]|trim|xss_clean');
			$this->form_validation->set_rules('txtTK','TaiKhoan','required|max_length[10]|trim|xss_clean');
			$this->form_validation->set_rules('txtMK','MatKhau','required|max_length[10]|trim|xss_clean');
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$M_DV=$this->input->post('txtM_DV');
				$T_DV=$this->input->post('txtT_DV');
				$TK=$this->input->post('txtTK');
				$MK=md5($this->input->post('txtMK'));
				$data=array(
					"MA_DV"=>"$M_DV",
					"TEN_DV"=>"$T_DV",
					"TAIKHOAN"=>"$TK",
					"MATKHAU"=>"$MK"
				);
				$this->load->model('md_quanly');
				if ($this->input->post("submit")=="Sửa"){
					$this->form_validation->set_rules('txtM_DV','MaDonVi','callback_ktMDV_sua');
						if ($this->form_validation->run() == FALSE){
						$this->index();
					}
					else{
						$this->md_quanly->editDonvi($M_DV,$data);
						$this->index();
						echo '<script>alert("Sửa thành công!");</script>';
					}
				}
				else if ($this->input->post("submit")=="Thêm"){
						$this->form_validation->set_rules('txtM_DV','MaDonVi','callback_ktMDV');
						if ($this->form_validation->run() == FALSE){
							$this->index();
						}
						else{
							$this->md_quanly->addDonvi($data);
							$this->index();
							echo '<script>alert("Thêm thành công");</script>';
							}
					 }
			}
		}
		$this->load->model("md_quanly");
		$data["donvi"]=$this->md_quanly->getDonvi();
		$this->load->view("quanly/donvi",$data);
	}
	public function ktMDV($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkDonvi($str))
			return true;
		else {
			$this->form_validation->set_message('ktMDV', '%s đã tồn tại mã '.$this->input->post("txtM_DV"));
			return false;
		}
	}
	public function ktMDV_sua($str){
		$this->load->model('md_quanly');
		if (!$this->md_quanly->checkDonvi($str))
			return true;
		else {
			$this->form_validation->set_message('ktMDV_sua', '%s chưa tồn tại mã '.$this->input->post("txtM_DV"));
			return false;
		}
	}
	public function ktXoaDonvi($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkXoaDonvi($str))
			return true;
		else {
			$this->form_validation->set_message('ktXoaDonvi', $this->input->post("txtM_DV").' là dữ liệu cơ sở, có liên quan đến các dữ liệu khác nên không thể xóa được!');
			return false;
		}
	}
	/***********TRAM************/
	public function tram(){
		$this->load->helper(array('form', 'url'));
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		if ($this->input->post('submit')=='Xóa'){
			$this->form_validation->set_rules('txtM_Tr','MaTram','required|max_length[20]|trim|xss_clean|callback_ktXoaTram');
			if ($this->form_validation->run() == FALSE){
				$this->index();
			}
			else{
				$this->load->model('md_quanly');
				$this->md_quanly->deleteTram($this->input->post('txtM_Tr'));
				$this->index();
				echo '<script>alert("Xóa thành công!");</script>';
			}
		}
		else {
			$this->form_validation->set_rules('txtM_Tr','MaTram','required|max_length[20]|trim|xss_clean');
			$this->form_validation->set_rules('txtT_Tr','TenTram','required|max_length[50]|trim|xss_clean');
			$this->form_validation->set_rules('txtDC_Tr','DiaChiTram','required|max_length[100]|trim|xss_clean');
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$M_Tr=$this->input->post('txtM_Tr');
				$T_Tr=$this->input->post('txtT_Tr');
				$DC_Tr=$this->input->post('txtDC_Tr');
				$data=array(
					"MATRAM"=>"$M_Tr",
					"TENTRAM"=>"$T_Tr",
					"DIACHITRAM"=>"$DC_Tr"
				);
				$this->load->model('md_quanly');
				if ($this->input->post('submit')=='Sửa'){
					$this->form_validation->set_rules('txtM_Tr','MaTram','callback_ktMTr_sua');
					if ($this->form_validation->run() == FALSE){
						$this->index();
					}
					else{
						$this->md_quanly->editTram($M_Tr,$data);
						$this->index();
						echo '<script>alert("Sửa thành công!");</script>';
					}
				}
				else if ($this->input->post('submit')=='Thêm'){
						$this->form_validation->set_rules('txtM_Tr','MaTram','callback_ktMTr');
						if ($this->form_validation->run() == FALSE){
							$this->index();
						}
						else{
							$this->md_quanly->addTram($data);
							$this->index();
							echo '<script>alert("Thêm thành công!");</script>';
						}
					 }
			}
		}
		$this->load->model("md_quanly");
		$data["tram"]=$this->md_quanly->getTram();
		$this->load->view("quanly/tram",$data);
	}
	public function ktMTr($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkTram($str))
			return true;
		else {
			$this->form_validation->set_message('ktMTr', '%s đã tồn tại mã '.$this->input->post("txtM_Tr"));
			return false;
		}
	}
	public function ktMTr_sua($str){
		$this->load->model('md_quanly');
		if (!$this->md_quanly->checkTram($str))
			return true;
		else {
			$this->form_validation->set_message('ktMTr_sua', '%s chưa tồn tại mã '.$this->input->post("txtM_Tr"));
			return false;
		}
	}
	public function ktXoaTram($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkXoaTram($str))
			return true;
		else {
			$this->form_validation->set_message('ktXoaTram', $this->input->post("txtM_Tr").' là dữ liệu cơ sở, có liên quan đến các dữ liệu khác nên không thể xóa được!');
			return false;
		}
	}
	/********HANG SAN XUAT**********/
	public function hangsanxuat(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		if ($this->input->post('submit')=='Xóa'){
			$this->form_validation->set_rules('txtM_Hsx','MaHangSanXuat','required|max_length[5]|trim|xss_clean|callback_ktXoaHsx');
			if ($this->form_validation->run() == FALSE){
				$this->index();
			}
			else{
				$this->load->model('md_quanly');
				$this->md_quanly->deleteHangsanxuat($this->input->post('txtM_Hsx'));
				$this->index();
				echo '<script>alert("Xóa thành công!");</script>';
			}
		}
		else {
			$this->form_validation->set_rules('txtM_Hsx','MaHangSanXuat','required|max_length[5]|trim|xss_clean');
			$this->form_validation->set_rules('txtT_Hsx','TenHangSanXuat','required|max_length[100]|trim|xss_clean');
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$M_Hsx=$this->input->post('txtM_Hsx');
				$T_Hsx=$this->input->post('txtT_Hsx');
				$data=array(
					"MA_HSX"=>"$M_Hsx",
					"TEN_HSX"=>"$T_Hsx"
				);
				$this->load->model('md_quanly');
				if ($this->input->post('submit')=='Sửa'){
					$this->form_validation->set_rules('txtM_Hsx','MaHangSanXuat','callback_ktMHsx_sua');
					if ($this->form_validation->run() == FALSE){
						$this->index();
					}
					else{
						$this->md_quanly->editHangsanxuat($M_Hsx,$data);
						$this->index();
						echo '<script>alert("Sửa thành công!");</script>';
					}
				}
				else if ($this->input->post('submit')=='Thêm'){
						$this->form_validation->set_rules('txtM_Hsx','MaHangSanXuat','callback_ktMHsx');
						if ($this->form_validation->run() == FALSE){
							$this->index();
						}
						else{
							$this->md_quanly->addHangsanxuat($data);
							$this->index();
							echo '<script>alert("Thêm thành công!");</script>';
						}
					 }
			}
		}
		$this->load->model("md_quanly");
		$data["nsx"]=$this->md_quanly->getHangsanxuat();
		$this->load->view('quanly/hangsanxuat', $data, FALSE);
	}
	public function ktMHsx($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkHangsanxuat($str))
			return true;
		else {
			$this->form_validation->set_message('ktMHsx', '%s đã tồn tại mã '.$this->input->post("txtM_Hsx"));
			return false;
		}
	}
	public function ktMHsx_sua($str){
		$this->load->model('md_quanly');
		if (!$this->md_quanly->checkHangsanxuat($str))
			return true;
		else {
			$this->form_validation->set_message('ktMHsx_sua', '%s chưa tồn tại mã '.$this->input->post("txtM_Hsx"));
			return false;
		}
	}
	public function ktXoaHsx($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkXoaHangsanxuat($str))
			return true;
		else {
			$this->form_validation->set_message('ktXoaHsx', $this->input->post("txtM_Hsx").' là dữ liệu cơ sở, có liên quan đến các dữ liệu khác nên không thể xóa được!');
			return false;
		}
	}
}

/* End of file quanly.php */
/* Location: ./application/controllers/quanly.php */