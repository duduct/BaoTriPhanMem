<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_quanly extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	/********DON VI************/
	public function getDonvi(){
		$this->db->where("SUDUNG_DV",1);
		$query=$this->db->get("donvi");
		return $query->result_array();
	}
	public function addDonvi($bien){
		$this->db->insert("donvi",$bien);
		return true;
	}
	public function editDonvi($id,$bien){
		$this->db->where("MA_DV",$id);
		$this->db->update("donvi",$bien);
		return true;
	}
	public function deleteDonvi($id){
		$this->db->where("MA_DV",$id);
		//$this->db->delete("donvi");
		$this->db->update("donvi","SUDUNG_DV",0);
		return true;
	}
	public function checkDonvi($id){
		$this->db->where("MA_DV",$id);
		$query=$this->db->get("donvi");
		if($query->num_rows()==1){
			return false;
		}else{
			return true;
		}
	}
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
	/********TRAM********/
	public function getTram(){
		$this->db->where("SUDUNG_TRAM",1);
		$query=$this->db->get("tram");
		return $query->result_array();
	}
	public function addTram($bien){
		$this->db->insert("tram",$bien);
		return true;
	}
	public function editTram($id,$bien){
		$this->db->where("MATRAM",$id);
		$this->db->update("tram",$bien);
		return true;
	}
	public function deleteTram($id){
		$this->db->where("MATRAM",$id);
		/*$this->db->delete("tram");*/
		$this->db->update("tram","SUDUNG_TRAM",0);
		return true;
	}
	public function checkTram($id){
		$this->db->where("MATRAM",$id);
		$query=$this->db->get("tram");
		if($query->num_rows()==1){
			return false;
		}else{
			return true;
		}
	}
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
		/*$this->db->delete("nhasanxuat");*/
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
}

/* End of file md_quanly.php */
/* Location: ./application/models/md_quanly.php */