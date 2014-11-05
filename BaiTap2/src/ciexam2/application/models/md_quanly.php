<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_quanly extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	/********DON VI************/
	//Trả về các donvi khi SUDUNG_DV = 1
	public function getDonvi(){
		$this->db->where("SUDUNG_DV",1);
		$query=$this->db->get("donvi");
		return $query->result_array();
	}
	//Thêm một donvi mới
	public function addDonvi($bien){
		$this->db->insert("donvi",$bien);
		return true;
	}
	//Update donvi với MA_DV = id
	public function editDonvi($id,$bien){
		$this->db->where("MA_DV",$id);
		$this->db->update("donvi",$bien);
		return true;
	}
	//Delete donvi với MA_DV = id
	public function deleteDonvi($id){
		$this->db->where("MA_DV",$id);
		//$this->db->delete("donvi");
		$this->db->update("donvi","SUDUNG_DV",0);
		return true;
	}
	//Kiểm tra donvi với MA_DV = id có tồn tại không, nếu có return true, ngược lại return false
	public function checkDonvi($id){
		$this->db->where("MA_DV",$id);
		$query=$this->db->get("donvi");
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	//Kiểm tra MA_DV = id có tồn tại trong bảng mba hay không, nếu có return false, ngược lại return true.
	public function checkXoaDonvi($id){
		$this->db->select("MA_DV");
		$this->db->where("MA_DV",$id);
		$query=$this->db->get("mba");
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}


	function kt_TDV_Sua($tdv, $mdv){
		//Xet TEN_DV voi MA_DV tuong ung, giong hay khac 
		$this->db->where("MA_DV",$mdv);
		$this->db->where("TEN_DV !=",$tdv);
		$query=$this->db->get("donvi");
		// Neu khac thi xet xem no co trung voi TEN_DV nao trong CSDL không
		if($query->num_rows() > 0){
			$this->db->where("TEN_DV",$tdv);
			$query=$this->db->get("donvi");
			// Neu trung thi return false
			if($query->num_rows() > 0){
				return false;
			}else{
				return true;
			}
		//Neu TEN_DV voi MADV tuong ung ma giong nhau return true. 	
		}else{
			return true;
		}
	}

	
	function kt_TK_Sua($tk, $mdv){
		//Xet TAIKHOAN voi MA_DV tuong ung, giong hay khac 
		$this->db->where("MA_DV",$mdv);
		$this->db->where("TAIKHOAN !=",$tk);
		$query=$this->db->get("donvi");
		// Neu khac thi xet xem no co trung voi TAIKHOAN nao trong CSDL ko
		if($query->num_rows() > 0){
			$this->db->where("TAIKHOAN",$tk);
			$query=$this->db->get("donvi");
			// Neu trung thi return false
			if($query->num_rows() > 0){
				return false;
			}else{
				return true;
			}
		//Neu TAIKHOAN voi SONO tuong ung ma giong nhau return true. 	
		}else{
			return true;
		}
	}

	/********TRAM********/

	// Trả về tram với SUDUNG_TRAM = 1 
	public function getTram(){
		$this->db->where("SUDUNG_TRAM",1);
		$query=$this->db->get("tram");
		return $query->result_array();
	}
	// Thêm tram vào CSDL
	public function addTram($bien){
		$this->db->insert("tram",$bien);
		return true;
	}
	// Update tram với MATRAM = id.
	public function editTram($id,$bien){
		$this->db->where("MATRAM",$id);
		$this->db->update("tram",$bien);
		return true;
	}
	// Update tram với MATRAM = id, update SUDUNG_TRAM = 0;
	public function deleteTram($id){
		$this->db->where("MATRAM",$id);
		$this->db->update("tram","SUDUNG_TRAM",0);
		return true;
	}
	// Kiểm tra tam với MATRAM = id, nếu có return false, ngược lại return true.
	public function checkTram($id){
		$this->db->where("MATRAM",$id);
		$query=$this->db->get("tram");
		if($query->num_rows()==1){
			return false;
		}else{
			return true;
		}
	}
	// Kiểm tra MATRAM = id, có tồn tại trong CSDL chitiet_qtsd hay không. Nếu có return false, ngược lại return true.
	public function checkXoaTram($id){
		$this->db->select("MATRAM");
		$this->db->where("MATRAM",$id);
		$query=$this->db->get("chitiet_qtsd");
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}

	function kt_TenTram_Sua($tenTram, $maTram){
		//Xet TENTRAM voi MATRAM tuong ung, giong hay khac 
		$this->db->where("MATRAM",$maTram);
		$this->db->where("TENTRAM !=",$tenTram);
		$query=$this->db->get("tram");
		// Neu khac thi xet xem no co trung voi TENTRAM nao trong CSDL ko
		if($query->num_rows() > 0){
			$this->db->where("TENTRAM",$tenTram);
			$query=$this->db->get("tram");
			// Neu trung thi return false
			if($query->num_rows() > 0){
				return false;
			}else{
				return true;
			}
		//Neu TENTRAM voi MATRAM tuong ung ma giong nhau return true. 	
		}else{
			return true;
		}
	}

	/***********HANG SAN XUAT*********/
	public function getHangsanxuat(){
		$this->db->where("SUDUNG_HSX",1);
		$query=$this->db->get("nhasanxuat");
		return $query->result_array();
	}
	public function addHangsanxuat($bien){
		$this->db->insert("nhasanxuat",$bien);
		return true;
	}
	public function editHangsanxuat($id,$bien){
		$this->db->where("MA_HSX",$id);
		$this->db->update("nhasanxuat",$bien);
		return true;
	}
	public function deleteHangsanxuat($id){
		$this->db->where("MA_HSX",$id);
		$this->db->update("nhasanxuat","SUDUNG_HSX",0);
		return true;
	}
	public function checkHangsanxuat($id){
		$this->db->where("MA_HSX",$id);
		$query=$this->db->get("nhasanxuat");
		if($query->num_rows()==1){
			return false;
		}else{
			return true;
		}
	}
	public function checkXoaHangsanxuat($id){
		$this->db->select("MA_HSX");
		$this->db->where("MA_HSX",$id);
		$query=$this->db->get("mba");
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}

	function ktTHsx_sua($ten, $ma){
		//Xet MSTS voi SONO tuong ung giong hay khac 
		$this->db->where("MA_HSX",$ma);
		$this->db->where("TEN_HSX !=",$ten);
		$query=$this->db->get("nhasanxuat");
		// Neu khac thi xet xem no co trung voi MSTS nao trong CSDL ko
		if($query->num_rows() > 0){
			$this->db->where("TEN_HSX",$ten);
			$query=$this->db->get("nhasanxuat");
			// Neu trung thi return false
			if($query->num_rows() > 0){
				return false;
			}else{
				return true;
			}
		//Neu MSTS voi SONO tuong ung ma giong nhau 	
		}else{
			return true;
		}
	}

	/*GET ALL TINH TRANG*/
	public function getTinhTrang() {
		$query = $this->db->get('TINHTRANG_MBA');
		return $query->result_array();
	}
	
}

/* End of file md_quanly.php */
/* Location: ./application/models/md_quanly.php */