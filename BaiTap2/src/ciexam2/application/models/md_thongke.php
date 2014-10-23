<?php
	class Md_thongke extends CI_Model{
		public function __construct(){
			$this->load->database();	
		}
		public function get_donvi(){
			$query = $this->db->get("donvi");
			return $query->result_array();
		}
		public function get_title($value){
			$this->db->where('MA_DV', $value);
			$this->db->select('TEN_DV');
			$query = $this->db->get("donvi");
			return $query->result_array();
		}
		public function get_madv($value){
			$this->db->where('MA_DV', $value);
			$this->db->select('MA_DV');
			$query = $this->db->get("donvi");
			return $query->result_array();
		}
		public function get_hsx(){
			$this->db->select ( 'COUNT(*) AS `soluong`,TEN_HSX as TEN' );
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
			$this->db->group_by('nhasanxuat.TEN_HSX');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_tt(){
			$this->db->select ( 'COUNT(*) AS `soluong`,TRANGTHAI as TEN' );
			$this->db->where("chitiet_tinhtrang.TT_MOI",1);
			$this->db->from('chitiet_tinhtrang');
			$this->db->join('tinhtrang_mba', 'tinhtrang_mba.MA_TT = chitiet_tinhtrang.MA_TT');
			$this->db->group_by('TRANGTHAI');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_donvitk(){
			$this->db->select ( 'COUNT(*) AS `soluong`,TEN_DV as TEN' );
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->join('donvi', 'donvi.MA_DV = mba.MA_DV');
			$this->db->group_by('TEN_DV');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_cs(){
			$this->db->select ( 'COUNT(*) AS `soluong`,CONGSUAT as TEN' );
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->group_by('CONGSUAT');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_hsxdv($value){
			$this->db->select ( 'COUNT(*) AS `soluong`,TEN_HSX as TEN' );
			$this->db->where('donvi.MA_DV', $value);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->join('donvi', 'donvi.MA_DV = mba.MA_DV');
			$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
			$this->db->group_by('nhasanxuat.TEN_HSX');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_ttdv($value){
			$this->db->select ( 'COUNT(*) AS `soluong`,TRANGTHAI as TEN' );
			$this->db->where('donvi.MA_DV', $value);
			$this->db->where("chitiet_tinhtrang.TT_MOI",1);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->join('donvi', 'donvi.MA_DV = mba.MA_DV');
			$this->db->join('chitiet_tinhtrang', 'chitiet_tinhtrang.SONO = mba.SONO');
			$this->db->join('tinhtrang_mba', 'tinhtrang_mba.MA_TT = chitiet_tinhtrang.MA_TT');
			$this->db->group_by('tinhtrang_mba.TRANGTHAI');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_donvitkdv($value){
			$this->db->select ( 'COUNT(*) AS `soluong`,TEN_DV as TEN' );
			$this->db->where('donvi.MA_DV', $value);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->join('donvi', 'donvi.MA_DV = mba.MA_DV');
			$this->db->group_by('TEN_DV');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_csdv($value){
			$this->db->select ( 'COUNT(*) AS `soluong`,CONGSUAT as TEN' );
			$this->db->where('MA_DV', $value);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->group_by('CONGSUAT');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>
