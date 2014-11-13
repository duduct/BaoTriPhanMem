<?php
	class Md_baocao extends CI_Model{
		public function __construct(){
			$this->load->database();	
		}
		// Output: danh sách dữ liệu
		// Lấy dữ liệu từ bảng donvi
		public function get_donvi(){
			$query = $this->db->get("donvi");
			return $query->result_array();
		}
		// Input: mã đơn vị
		// Output: danh sách tên đơn vị
		// Lấy dữ liệu từ bảng donvi khi MA_DV = $value
		public function get_title($value){
			$this->db->where('MA_DV', $value);
			$this->db->select('TEN_DV');
			$query = $this->db->get("donvi");
			return $query->result_array();
		}
		// Input: mã đơn vị
		// Output: danh sách mã đơn vị
		// Lấy dữ liệu từ bảng donvi khi MA_DV = $value
		public function get_madv($value){
			$this->db->where('MA_DV', $value);
			$this->db->select('MA_DV');
			$query = $this->db->get("donvi");
			return $query->result_array();
		}
		// Output: danh sách dữ liệu
		// Lấy dữ liệu từ bảng tinhtrang_mba
		public function get_tinhtrang(){
			$query = $this->db->get("tinhtrang_mba");
			return $query->result_array();
		}
		// Input: mã tình trạng
		// Output: danh sách dữ liệu
		// Lấy dữ liệu từ bảng tinhtrang_mba khi MA_TT = $value
		public function get_tinhtrang_($value){
			$this->db->where('MA_TT', $value);
			$this->db->select('*');
			$query = $this->db->get("tinhtrang_mba");
			return $query->result_array();
		}
		// Input: mã tình trạng
		// Output: danh sách dữ liệu
		// Lấy dữ liệu từ bảng tinhtrang_mba, chitiet_tinhtrang, tinhtrang_mba, nhasanxuat, donvi, loai_mba khi MA_TT = $value
		public function bc_tatca_tt($value){
			$this->db->select('*');
			$this->db->where('tinhtrang_mba.MA_TT', $value);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->order_by("mba.SONO","asc");
			$this->db->where("chitiet_tinhtrang.TT_MOI",1);
			$this->db->from('mba');
			$this->db->join('chitiet_tinhtrang', 'mba.SONO = chitiet_tinhtrang.SONO');
			$this->db->join('tinhtrang_mba', 'chitiet_tinhtrang.MA_TT = tinhtrang_mba.MA_TT');
			$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
			$this->db->join('donvi', 'donvi.MA_DV = mba.MA_DV');
			$this->db->join('loai_mba', 'loai_mba.MA_LOAI = mba.MA_LOAI');
			$query = $this->db->get();
			return $query->result_array();
		}
		// Input: mã tình trạng, mã đơn vị
		// Output: danh sách dữ liệu
		// Lấy dữ liệu từ bảng mba, tinhtrang_mba, chitiet_tinhtrang, tinhtrang_mba, nhasanxuat, donvi, loai_mba khi MA_TT = $value
		public function bc_donvi_tt($value,$value1){
			$this->db->select('*');
			$this->db->order_by("mba.SONO","asc");
			$this->db->where('tinhtrang_mba.MA_TT', $value1);
			$this->db->where("chitiet_tinhtrang.TT_MOI",1);
			$this->db->where('mba.MA_DV',$value);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->from('mba');
			$this->db->join('chitiet_tinhtrang', 'mba.SONO = chitiet_tinhtrang.SONO');
			$this->db->join('tinhtrang_mba', 'chitiet_tinhtrang.MA_TT = tinhtrang_mba.MA_TT');
			$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
			$this->db->join('loai_mba', 'loai_mba.MA_LOAI = mba.MA_LOAI');
			$this->db->join('donvi', 'donvi.MA_DV = mba.MA_DV');
			$query = $this->db->get();
			return $query->result_array();
		}
		// Output: danh sách dữ liệu
		// Lấy dữ liệu từ bảng mba, tinhtrang_mba, chitiet_tinhtrang, tinhtrang_mba, nhasanxuat, donvi, loai_mba
		public function tatca(){
			$this->db->select('*');
			$this->db->where('chitiet_tinhtrang.TT_MOI',1);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->order_by("mba.SONO","asc");
			$this->db->from('mba');
			$this->db->join('donvi', 'mba.MA_DV = donvi.MA_DV');
			$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
			$this->db->join('chitiet_tinhtrang', 'chitiet_tinhtrang.SONO = mba.SONO');
			$this->db->join('tinhtrang_mba', 'tinhtrang_mba.MA_TT = chitiet_tinhtrang.MA_TT');
			$this->db->join('loai_mba', 'loai_mba.MA_LOAI = mba.MA_LOAI');
			$query = $this->db->get();
			return $query->result_array();
		}
		// Input: mã đơn vị
		// Output: danh sách dữ liệu
		// Lấy dữ liệu từ bảng mba, tinhtrang_mba, chitiet_tinhtrang, tinhtrang_mba, nhasanxuat, donvi, loai_mba khi TT_MOI = 1, SUDUNG_MBA = 1, MA_DV = $value
		public function donvi($value){
			$this->db->select('*');
			$this->db->where('chitiet_tinhtrang.TT_MOI',1);
			$this->db->where('donvi.MA_DV',$value);
			$this->db->where("mba.SUDUNG_MBA",1);
			$this->db->order_by("mba.SONO","asc");
			$this->db->from('mba');
			$this->db->join('donvi', 'mba.MA_DV = donvi.MA_DV');
			$this->db->join('nhasanxuat', 'nhasanxuat.MA_HSX = mba.MA_HSX');
			$this->db->join('chitiet_tinhtrang', 'chitiet_tinhtrang.SONO = mba.SONO');
			$this->db->join('tinhtrang_mba', 'tinhtrang_mba.MA_TT = chitiet_tinhtrang.MA_TT');
			$this->db->join('loai_mba', 'loai_mba.MA_LOAI = mba.MA_LOAI');
			$query = $this->db->get();
			return $query->result_array();
		}
}
?>