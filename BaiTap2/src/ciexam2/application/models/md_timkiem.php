<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_timkiem extends CI_Model {

	public function search_sono($value)
	{
		$this->db->where('SONO', $value);
		$this->db->where("SUDUNG_MBA",'1');	
		$this->db->from('mba');
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function search_sono_mdv($value,$mdv)
	{
		$this->db->where('mba.SONO', $value);
		$this->db->where('mba.MA_DV',$mdv);
		$this->db->where("SUDUNG_MBA",'1');	
		$this->db->from('mba');
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function search_congsuat($value)
	{
		$this->db->where('CONGSUAT', $value);
		$this->db->where("SUDUNG_MBA",'1');	
		$this->db->from('mba');
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function search_congsuat_mdv($value,$mdv)
	{
		$this->db->where('CONGSUAT', $value);
		$this->db->where('mba.MA_DV',$mdv);
		$this->db->where("SUDUNG_MBA",'1');	
		$this->db->from('mba');
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function search_donvi($value)
	{
		$this->db->where('mba.MA_DV', $value);
		$this->db->where("SUDUNG_MBA",'1');	
		$this->db->from('mba');
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function search_tram($value)
	{
		$this->db->select('*');
		$this->db->where("SUDUNG_MBA",'1');
		$this->db->where('tram.MATRAM', $value);
		$this->db->from('mba');
		$this->db->join('chitiet_qtsd', 'chitiet_qtsd.SONO = mba.SONO');
		$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');			
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function search_tinhtrang($value)
	{
		$this->db->select('*');
		$this->db->where('tinhtrang_mba.MA_TT', $value);
		$this->db->where('chitiet_tinhtrang.TT_MOI',1);
		$this->db->where("SUDUNG_MBA",'1');
		$this->db->from('mba');
		$this->db->join('chitiet_tinhtrang', 'mba.SONO = chitiet_tinhtrang.SONO');
		$this->db->join('tinhtrang_mba', 'chitiet_tinhtrang.MA_TT = tinhtrang_mba.MA_TT');			
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function search_tinhtrang_mdv($value,$mdv)
	{
		$this->db->select('*');
		$this->db->where('tinhtrang_mba.MA_TT', $value);
		$this->db->where('mba.MA_DV',$mdv);
		$this->db->where('chitiet_tinhtrang.TT_MOI',1);
		$this->db->where("SUDUNG_MBA",'1');
		$this->db->from('mba');
		$this->db->join('chitiet_tinhtrang', 'mba.SONO = chitiet_tinhtrang.SONO');
		$this->db->join('tinhtrang_mba', 'chitiet_tinhtrang.MA_TT = tinhtrang_mba.MA_TT');			
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function array_fill_keys($keyArray, $valueArray) {
	    if(is_array($keyArray)) {
	        foreach($keyArray as $key => $value) {
	            $filledArray[$value] = $valueArray[$key];
	        }
	    }
	    return $filledArray;
	}
	public function getTinhtrang(){
		$query=$this->db->get("tinhtrang_mba");
		return $query->result_array();
	}
	public function getSono(){
		$query=$this->db->get("mba");
		return $query->result_array();
	}
	public function getSono_mdv($mdv){
		$this->db->where('mba.MA_DV',$mdv);
		$query=$this->db->get("mba");
		return $query->result_array();
	}
	public function getDonvi(){
		$query=$this->db->get("donvi");
		return $query->result_array();
	}
	public function getDonvi_name($mdv){
		$this->db->select('TEN_DV');
		$this->db->where('MA_DV',$madv);
		$query=$this->db->get("donvi");
		return $query->result_array();
	}
	public function getCongsuat()
	{
		$query = $this->db->get('mba');
		if ($query->num_rows()>0) {
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function getCongsuat_mdv($mdv)
	{
		$this->db->where('mba.MA_DV',$mdv);
		$query = $this->db->get('mba');
		if ($query->num_rows()>0) {
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function getTram(){
		$query=$this->db->get("tram");
		return $query->result_array();
	}
	public function getTram_mdv($madv){
		$this->db->select('*');
		$this->db->where('mba.MA_DV', $madv);
		$this->db->from('mba');
		$this->db->join('chitiet_qtsd', 'chitiet_qtsd.SONO = mba.SONO');
		$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');		
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file timkiem.php */
/* Location: ./application/models/timkiem.php */