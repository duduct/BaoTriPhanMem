<?php
class Md_capnhat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
 	public function getmadv(){
        $query=$this->db->get("donvi");
        return $query->result();
	}
	public function getTendonvi(){
		$this->db->select("MA_DV,TEN_DV");
        $query=$this->db->get("donvi");
        return $query->result_array();
	}
	public function getloaimba(){
        $query=$this->db->get("loai_mba");
        return $query->result();
	}
	public function getTenloaimba(){
        $query=$this->db->get("loai_mba");
        return $query->result_array();
	}
	public function getDaitu(){
        $query=$this->db->get("daitu");
        return $query->result();
	}
	public function getTram(){
        $query=$this->db->get("tram");
        return $query->result();
	}
	public function getTramDV($madv){
		$this->db->select('*');
		$this->db->where('mba.MA_DV', $madv);
		$this->db->from('mba');
		$this->db->join('chitiet_qtsd', 'chitiet_qtsd.SONO = mba.SONO');
		$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');		
		$query = $this->db->get();
		return $query->result();
	}
	public function getmba($donvi){
		$this->db->where("mba.MA_DV",$donvi);
		$this->db->where("SUDUNG_MBA",'1');	
		$this->db->from('mba');
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getSono($donvi){
		$this->db->where("MA_DV",$donvi);
		$this->db->where("SUDUNG_MBA",'1');
		$this->db->select("SONO");
        $query=$this->db->get("mba");
		return $query->result();
	}
	public function getFullSono(){
		$this->db->where("SUDUNG_MBA",'1');
		$this->db->select("SONO");
        $query=$this->db->get("mba");
		return $query->result();
	}
	public function nhasanxuat(){
        $query=$this->db->get("nhasanxuat");
        return $query->result();
	}
	public function getTennhasanxuat(){
		$this->db->select("MA_HSX,TEN_HSX");
        $query=$this->db->get("nhasanxuat");
        return $query->result_array();
	}
	public function addmba($bien){
		$this->db->insert("mba",$bien);

		return false;
	}
	public function addTinhtrang($bien){
		
		$this->db->insert("chitiet_tinhtrang",$bien);
		return true;
	}
	public function editTinhtrang($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("chitiet_tinhtrang",$bien);
		return true;
	}
	public function addTinhtrang_sd($bien){
		$this->db->insert("chitiet_qtsd",$bien);
		return true;
	}
	public function editTinhtrang_sd($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("chitiet_qtsd",$bien);
		return true;
	}
	public function addTinhtrang_dt($bien){
		$this->db->insert("chitiet_daitu",$bien);
		return true;
	}
	public function editTinhtrang_dt($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("chitiet_daitu",$bien);
		return true;
	}
	public function editmba($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("mba",$bien);
		return true;
	}
	public function deletemba($id){
		$this->db->where("SONO",$id);
		$this->db->delete("mba");
		return true;
	}
	public function getMa_TT(){
        $query=$this->db->get("tinhtrang_mba");
        return $query->result();
	}
	public function checkSN($id){
		$this->db->where("SONO",$id);
		$query=$this->db->get("mba");
		if($query->num_rows()==1){
			return false;
		}else{
			return true;
		}
	}
	public function checkSN_TT($id){
		$this->db->where("SONO",$id);
		$query=$this->db->get("chitiet_tinhtrang");
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	public function getTinhtrang($sn){
			$this->db->where("SONO",$sn);
			$this->db->from('chitiet_tinhtrang');
			$this->db->join('tinhtrang_mba', 'chitiet_tinhtrang.MA_TT = tinhtrang_mba.MA_TT');
			$query = $this->db->get();
			return $query->result_array();
		}
	public function getQuatrinhSD($sn){
			$this->db->where("SONO",$sn);
			$this->db->from('chitiet_qtsd');
			$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');
			$query = $this->db->get();
			return $query->result_array();
		}
	public function getQuatrinhDT($sn){
			$this->db->where("SONO",$sn);
			$this->db->from('chitiet_daitu');
			$this->db->join('daitu', 'chitiet_daitu.MA_DAITU = daitu.MA_DAITU');
			$query = $this->db->get();
			return $query->result_array();
		}
 }
?>