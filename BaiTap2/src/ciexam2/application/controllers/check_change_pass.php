<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check_change_pass extends CI_Controller {

	public function index()
	{
	$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
    $this->form_validation->set_message('required','Vui lòng điền đầy đủ thông tin!');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password_new', 'Password_new', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password_config', 'Password_config', 'trim|required|xss_clean|matches[password_new]');
	    if ($this->form_validation->run() == false) {
			$this->load->view('change_pass');
		}else{
			$this->load->model('users');
			$user = $this->input->post('username');
			$pass_old = $this->input->post('password');
			$pass_new = $this->input->post('password_new');
			$result = $this->users->Change_password($pass_new);
			if ($result) {
				$data =  array('re' => 'Mật khẩu của bạn đã được thay đổi!');
				$this->load->view('change_pass', $data, FALSE);
			}else{
				echo "No success!";
			}
		}
	}

}

/* End of file check_change_pass.php */
/* Location: ./application/controllers/check_change_pass.php */