<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    //This method will have the credentials validation
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
    $this->form_validation->set_message('required','Vui lòng điền đầy đủ thông tin!');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $this->load->view('login_view');
    }
    else
    {
      $code =  $this->session->userdata('logged_in')['code'];
      if($code == 1){
          redirect('thongke/tatca', 'refresh');
      }
      else{
          redirect('home', 'refresh');
      }
      
    }
    
  }
  
  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');
     $this->load->model('users');
    //query the database
     $pass = md5($password);
    $result = $this->users->login($username, $pass);
    
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'username' => $row->TAIKHOAN,
          'password' => $row->MATKHAU,
          'name' => $row->TEN_DV,
          'code' => $row->QUYEN_SD,
          'ma_dv' => $row->MA_DV
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Tài khoản hoặc mật khẩu bị sai.');
      return false;
    }
  }
}
?>