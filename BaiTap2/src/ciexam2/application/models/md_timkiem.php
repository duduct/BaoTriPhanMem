<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Md_timkiem extends CI_Model {
	
	
	public function array_fill_keys($keyArray, $valueArray) {
	    if(is_array($keyArray)) {
	        foreach($keyArray as $key => $value) {
	            $filledArray[$value] = $valueArray[$key];
	        }
	    }
	    return $filledArray;
	}
	//Output: danh sách dữ liệu
	//Lấy dữ liệu từ bảng tinhtrang_mba
	public function getTinhtrang(){
		$query=$this->db->get("tinhtrang_mba");
		return $query->result_array();
	}
	//Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng mba
	public function getSono(){
		$query=$this->db->get("mba");
		return $query->result_array();
	}
	// Input: mã đơn vị
	// Lấy dữ liêu từ bảng mba với điều kiện mã đơn vị thỏa.
	public function getSono_mdv($mdv){
		$this->db->where('mba.MA_DV',$mdv);
		$query=$this->db->get("mba");
		return $query->result_array();
	}
	//Output: danh sách dữ liệu
	//Lấy dữ liệu từ bảng donvi
	public function getDonvi(){
		$query=$this->db->get("donvi");
		return $query->result_array();
	}
	//Input: mã đơn vị
	//Lấy tên đơn vị từ bảng donvi khi điều kiện mã đơn vị thỏa
	public function getDonvi_name($mdv){
		$this->db->select('TEN_DV');
		$this->db->where('MA_DV',$madv);
		$query=$this->db->get("donvi");
		return $query->result_array();
	}
	//Output: danh sách dữ liệu/false.
	//Lấy dữ liệu từ bảng mba
	public function getCongsuat()
	{
		$query = $this->db->get('mba');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}
	//Output: danh sách dũ liệu/false.
	//Lấy dữ liệu trong bảng mba khi mã đơn vị thỏa điều kiện
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
	//Output: danh sách dữ liệu
	//Lấy dữ liệu từ bảng tram.
	public function getTram(){
		$query=$this->db->get("tram");
		return $query->result_array();
	}
	//Output: danh sách dữ liệu
	//Lấy dữ liệu từ bảng mba, chitiet_qtsd và tram khi mã đơn vị thỏa điều kiện
	public function getTram_mdv($madv){
		$this->db->select('*');
		$this->db->where('mba.MA_DV', $madv);
		$this->db->from('mba');
		$this->db->join('chitiet_qtsd', 'chitiet_qtsd.SONO = mba.SONO');
		$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');		
		$query = $this->db->get();
		return $query->result_array();
	}
	// Input: số No, mã đơn vị, mã trạm, mã tình trạng, công suất
	//chức năng tìm kiếm
	public function search($soNO, $maDv, $maTram, $maTinhTrang, $congSuat) {
		$this->db->select("*");
		$this->db->from('mba');
		$this->db->join('loai_mba', 'mba.MA_LOAI = loai_mba.MA_LOAI');
		$this->db->join('donvi','mba.MA_DV = donvi.MA_DV');

		$this->db->join('chitiet_qtsd', 'chitiet_qtsd.SONO = mba.SONO');
		$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');

		$this->db->join('chitiet_tinhtrang', 'mba.SONO = chitiet_tinhtrang.SONO');
		$this->db->join('tinhtrang_mba', 'chitiet_tinhtrang.MA_TT = tinhtrang_mba.MA_TT');

		$this->db->join('nhasanxuat', 'mba.MA_HSX = nhasanxuat.MA_HSX');

		$soNO = trim($soNO);
		if ($soNO != '' && !empty($soNO)) $this->db->where('mba.SONO', $soNO);
		if ($maDv != 'all') $this->db->where('mba.MA_DV', $maDv);
		if ($maTram != 'all') $this->db->where('tram.MATRAM', $maTram);
		if ($maTinhTrang != 'all') $this->db->where('tinhtrang_mba.MA_TT', $maTinhTrang);
		if ($congSuat != '' && !empty($congSuat)) $this->db->where('mba.congSuat', $congSuat);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

}

/* End of file timkiem.php */
/* Location: ./application/models/timkiem.php */