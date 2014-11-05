<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {
	public function login($username,$pass)
	{
		$this->load->helper('security');
		$this->db->select('*');
		$this->db->from('donvi');
		$this->db->where('TAIKHOAN', $username);
		$this->db->where('MATKHAU', $pass);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

	function login_check($username)
	 {
	  $this -> db -> select('TEN_DV');
	  $this -> db -> from('donvi');
	  $this -> db -> where('MA_DV = ' . "'" . $username . "'");
	  $this -> db -> limit(1);

	  $query = $this -> db -> get();

	  if($query -> num_rows() >= 1)
	  {
	   return true;
	  } else
	   return false;
	 }
	function Change_password($pass_new){
		$data = array(
            'MATKHAU' => md5($pass_new)
        );   
        $this->db->select('MA_DV');
        $this->db->where('TAIKHOAN',$this->session->userdata('logged_in')['username']);
        $query=$this->db->get('donvi');
        if($query->num_rows() > 0){
        	$this->db->update('donvi' ,$data);
        	return true; 
        }
 		  return false;
    }

    public function check_MK($pass_old){
        $this->db->where('TAIKHOAN',$this->session->userdata('logged_in')['username']);
        $this->db->where('MATKHAU',md5($pass_old));
        $query=$this->db->get('donvi'); 
        if($query->num_rows() > 0){
        	return true;
        }  
        return false;
    }

	
}

/* End of file user.php */
/* Location: ./application/models/user.php */