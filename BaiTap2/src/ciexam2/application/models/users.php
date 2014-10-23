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
	 function Change_password($pass_new)
        {   
        $this->db->select('MA_DV');
        $this->db->where('TAIKHOAN',$this->session->userdata('logged_in')['username']);
        $this->db->where('MATKHAU',$this->session->userdata('logged_in')['password']);
        $query=$this->db->get('donvi');   

        if ($query->num_rows() > 0)
         {
                $row = $query->row();
                if($row->MA_DV==$this->session->userdata('logged_in')['ma_dv'])
                {
                	
                    $data = array(
                      'MATKHAU' => md5($pass_new)
                     );
                  $this->db->where('TAIKHOAN',$this->session->userdata('logged_in')['username']);
                  $this->db->where('MATKHAU',$this->session->userdata('logged_in')['password']);
                       if($this->db->update('donvi', $data)) 
                       {
                       return true;
                       }else{
                        return false;
                       }
                }else{
                return false;
                }


         }else{
            return false;
         }

        }
	
}

/* End of file user.php */
/* Location: ./application/models/user.php */