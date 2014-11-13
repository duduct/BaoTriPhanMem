<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quanly extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

	}

	public function index(){
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
	// Chức năng quản lý đơn vị
	public function donvi(){
		$this->lang->load('vi', 'vietnamese');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('md_quanly');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('is_unique', $this->lang->line('is_unique'));
		$this->form_validation->set_message('max_length', $this->lang->line('max_length'));
		// Chức năng xóa đơn vị được gọi
		if ($this->input->post('submit')=='Xóa'){
			$this->form_validation->set_rules('txtM_DV','lang:MaDonVi','required|trim|xss_clean|max_length[5]|callback_ktXoaDonvi');
			//Nếu kiểm tra ràng buộc dữ liệu thất bại
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
			$this->form_validation->set_rules('txtM_DV','lang:MaDonVi','required|trim|xss_clean|max_length[5]');
			$this->form_validation->set_rules('txtT_DV','lang:TenDonVi','required|trim|xss_clean|max_length[100]');
			$this->form_validation->set_rules('txtTK','lang:TaiKhoan','required|trim|xss_clean|max_length[10]');
			$this->form_validation->set_rules('txtMK','lang:MatKhau','required|trim|xss_clean|max_length[10]');
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$M_DV=$this->input->post('txtM_DV');
				$T_DV=$this->input->post('txtT_DV');
				$TK=$this->input->post('txtTK');
				$Q=$this->input->post('txtQ');
				$MK=md5($this->input->post('txtMK'));
				$data=array(
					"MA_DV"=>"$M_DV",
					"TEN_DV"=>"$T_DV",
					"TAIKHOAN"=>"$TK",
					"MATKHAU"=>"$MK",
					"QUYEN_SD" => "$Q"
				);
				//Chức năng sửa đơn vị được chọn
				if ($this->input->post("submit")=="Sửa"){
					$this->form_validation->set_rules('txtM_DV','Mã đơn vị','callback_ktMDV_sua');
					$this->form_validation->set_rules('txtT_DV','Tên đơn vị','callback_kt_TDV_Sua['.$this->input->post('txtM_DV').']');
					$this->form_validation->set_rules('txtTK','Tài khoản','callback_kt_TK_Sua['.$this->input->post('txtM_DV').']');
					//Nếu kiểm tra ràng buộc dữ liệu trên thất bại
					if ($this->form_validation->run() == FALSE){
						$this->index();
					}
					else{
						$this->md_quanly->editDonvi($M_DV,$data);
						$this->index();
						echo '<script>alert("Sửa thành công!");</script>';
					}
				}
				//Chức năng thêm đơn vị được chọn
				else if ($this->input->post("submit")=="Thêm"){
					$this->form_validation->set_rules('txtT_DV','Tên đơn vị','is_unique[donvi.TEN_DV]');
					$this->form_validation->set_rules('txtTK','Tài khoản','is_unique[donvi.TAIKHOAN]');
					$this->form_validation->set_rules('txtM_DV','Mã đơn vị','is_unique[donvi.MA_DV]');
					//Nếu kiểm tra ràng buộc dữ liệu trên thất bại
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
	// input: mã đơn vị
	// Output: true/false
	// Kiểm tra mã đơn vị khi sửa. 
	public function ktMDV_sua($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkDonvi($str))
			return true;
		else {
			$this->form_validation->set_message('ktMDV_sua', '\'%s\' chưa tồn tại mã '.$this->input->post("txtM_DV"));
			return false;
		}
	}
	// input: mã đơn vị, tên đơn vị
	// Output: true/false
	// Kiểm tra tên đơn vị khi sửa
	public function kt_TDV_Sua($tdv, $mdv){
		$this->load->model('md_quanly');
		if ($this->md_quanly->kt_TDV_Sua($tdv, $mdv))
			return true;
		else {
			$this->form_validation->set_message('kt_TDV_Sua', '\'%s\' '.$this->input->post("txtT_DV").' đã tồn tại.');
			return false;
		}
	}
	// input: mã đơn vị, tài khoản
	// Output: true/false
	// Kiểm tra tài khoản trước khi sửa
	public function kt_TK_Sua($tk, $mdv){
		$this->load->model('md_quanly');
		if ($this->md_quanly->kt_TK_Sua($tk, $mdv))
			return true;
		else {
			$this->form_validation->set_message('kt_TK_Sua', '\'%s\' '.$this->input->post("txtTK").' đã tồn tại.');
			return false;
		}
	}
	// input: mã đơn vị
	// Output: true/false
	//Kiểm tra đơn vị lúc xóa... kiểm tra xem đơn vị này có dữ liệu nào tham chiếu tới không.
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
	// Chức năng quản lý trạm
	public function tram(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->lang->load('vi', 'vietnamese');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('is_unique', $this->lang->line('is_unique'));
		$this->form_validation->set_message('max_length', $this->lang->line('max_length'));
		//Chức năng xóa trạm được chọn
		if ($this->input->post('submit')=='Xóa'){
			$this->form_validation->set_rules('txtM_Tr','lang:MaTram','required|trim|xss_clean|callback_ktXoaTram|max_length[20]');
			if ($this->form_validation->run() == FALSE){
				$this->index();
			}
			else{
				$this->load->model('md_quanly');
				$this->md_quanly->deleteTram($this->input->post('txtM_Tr'));
				$this->index();
				echo '<script>alert("Xóa thành công!");</script>';
			}
		}
		else {
			$this->form_validation->set_rules('txtM_Tr','lang:MaTram','required|trim|xss_clean|max_length[20]');
			$this->form_validation->set_rules('txtT_Tr','lang:TenTram','required|trim|xss_clean|max_length[50]');
			$this->form_validation->set_rules('txtDC_Tr','lang:DiaChiTram','required|trim|xss_clean|max_length[100]');
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
					$this->form_validation->set_rules('txtM_Tr','lang:MaTram','callback_ktMTr_sua');
					$this->form_validation->set_rules('txtT_Tr','lang:TenTram','callback_kt_TenTram_Sua['.$this->input->post('txtM_Tr').']');
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
						$this->form_validation->set_rules('txtM_Tr','lang:MaTram','callback_ktMTr');
						$this->form_validation->set_rules('txtT_Tr','lang:TenTram','is_unique[tram.TENTRAM]');
						if ($this->form_validation->run() == FALSE){
							$this->index();
						}
						else{
							$this->md_quanly->addTram($data);
							$this->index();
							echo '<script>alert("Thêm thành công!");</script>';
						}
					 }
			}
		}
		$this->load->model("md_quanly");
		$data["tram"]=$this->md_quanly->getTram();
		$this->load->view("quanly/tram",$data);
	}
	// Input: tên trạm, mã trạm
	// Output: true/false
	// Kiểm tra tên trạm đã tôn tại hay không. Khi khởi động chức năng sửa.
	public function kt_TenTram_Sua($tenTram, $maTram){
		$this->load->model('md_quanly');
		if ($this->md_quanly->kt_TenTram_Sua($tenTram, $maTram))
			return true;
		else {
			$this->form_validation->set_message('kt_TenTram_Sua', '\'%s\' '.$this->input->post("txtT_Tr").' đã tồn tại.');
			return false;
		}
	}
	// Input: mã trạm
	// Output: true/false
	//Kiểm tra mã trạm đã tồn tại hay chưa khi thêm mới.
	public function ktMTr($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkTram($str))
			return true;
		else {
			$this->form_validation->set_message('ktMTr', '\'%s\' đã tồn tại mã '.$this->input->post("txtM_Tr"));
			return false;
		}
	}
	// Input: mã trạm
	// Output: true/false
	// Kiểm tra mã trạm đúng hay không, khi sửa thông tin trạm.
	public function ktMTr_sua($str){
		$this->load->model('md_quanly');
		if (!$this->md_quanly->checkTram($str))
			return true;
		else {
			$this->form_validation->set_message('ktMTr_sua', '\'%s\' chưa tồn tại mã '.$this->input->post("txtM_Tr"));
			return false;
		}
	}
	// Input: mã trạm
	// Output: true/false
	// Kiểm tra thông tin trạm đó có là dữ liệu cơ sở hay không, có dữ liệu khác tham chiếu đến hay không.
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
	// Chức năng quản lý hãng sản xuất
	public function hangsanxuat(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->lang->load('vi', 'vietnamese');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('is_unique', $this->lang->line('is_unique'));
		$this->form_validation->set_message('max_length', $this->lang->line('max_length'));

		if ($this->input->post('submit')=='Xóa'){
			$this->form_validation->set_rules('txtM_Hsx','lang:MaHangSanXuat','required|trim|xss_clean|callback_ktXoaHsx|max_length[5]');
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
			$this->form_validation->set_rules('txtM_Hsx','lang:MaHangSanXuat','required|trim|xss_clean|max_length[5]');
			$this->form_validation->set_rules('txtT_Hsx','lang:TenHangSanXuat','required|trim|xss_clean|max_length[100]');
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
					$this->form_validation->set_rules('txtM_Hsx','lang:MaHangSanXuat','callback_ktMHsx_sua');
					$this->form_validation->set_rules('txtT_Hsx','lang:TenHangSanXuat','callback_ktTHsx_sua['.$this->input->post('txtM_Hsx').']');
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
						$this->form_validation->set_rules('txtT_Hsx','lang:TenHangSanXuat','is_unique[nhasanxuat.TEN_HSX]');
						$this->form_validation->set_rules('txtM_Hsx','lang:MaHangSanXuat','is_unique[nhasanxuat.MA_HSX]');
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
	// Input: mã hãng sản xuất
	// Output: true/false
	// Kiểm tra hãng sản xuất đó đã tồn tại hay chưa khi thêm mới
	public function ktMHsx($str){
		$this->load->model('md_quanly');
		if ($this->md_quanly->checkHangsanxuat($str))
			return true;
		else {
			$this->form_validation->set_message('ktMHsx', '\'%s\' đã tồn tại mã '.$this->input->post("txtM_Hsx"));
			return false;
		}
	}
	// Input: mã hãng sản xuất, tên hãng sản xuất
	// Output: true/false
	// Kiểm tra hãng sản xuất đó đã tồn tại hay chưa khi sửa
	public function ktTHsx_sua($ten, $ma){
		$this->load->model('md_quanly');
		if ($this->md_quanly->ktTHsx_sua($ten, $ma))
			return true;
		else {
			$this->form_validation->set_message('ktTHsx_sua', '\'%s\' '.$this->input->post("txtT_Hsx").' đã tồn tại.');
			return false;
		}
	}
	// Input: mã hãng sản xuất
	// Output: true/false
	// Kiểm tra mã hãng sản xuất có tồn tại hay không, khi sửa 
	public function ktMHsx_sua($str){
		$this->load->model('md_quanly');
		if (!$this->md_quanly->checkHangsanxuat($str))
			return true;
		else {
			$this->form_validation->set_message('ktMHsx_sua', '\'%s\' chưa tồn tại mã '.$this->input->post("txtM_Hsx"));
			return false;
		}
	}
	// Input: mã hãng sản xuất
	// Output: true/false
	// Kiểm tra hãng sản xuất đó có là dữ liệu cơ sở hay không, có dữ liệu nào tham chiếu đến hay không.
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