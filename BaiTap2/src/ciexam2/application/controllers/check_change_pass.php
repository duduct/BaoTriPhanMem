<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class check_change_pass extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
	    $this->lang->load('vi', 'vietnamese');
	    $this->form_validation->set_message('required', $this->lang->line('required'));
	    $this->form_validation->set_message('matches', $this->lang->line('matches'));
	    $this->form_validation->set_rules('username', 'Tên đăng nhập', 'trim|xss_clean');
	   	$this->form_validation->set_rules('password', 'Mật khẩu cũ', 'trim|required|xss_clean|callback_check_MK');
	    $this->form_validation->set_rules('password_new', 'Mật khẩu mới', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('password_config', 'Nhập lại mật khẩu', 'trim|required|xss_clean|matches[password_new]');
		   	if ($this->form_validation->run() == false) {
				$this->load->view('change_pass');
			}
		    else{
		    	$this->load->model('users');
				$user = $this->input->post('username');
				$pass_old = $this->input->post('password');
				$pass_new = $this->input->post('password_new');
				if($this->users->Change_password($pass_new)){
					echo "<script language=javascript> alert('Cập nhật thành công!'); </script>";
					$this->load->view('change_pass');

				}
			}
	}

	public function check_MK($pass_old){
		$this->load->model('users');
		if($this->users->check_MK($pass_old) == true){
			return true;
		}
		else{
			$this->form_validation->set_message('check_MK', '\'%s\' nhập không chính xác.');
			return false;
		}

	}


}

/* End of file check_change_pass.php */
/* Location: ./application/controllers/check_change_pass.php */