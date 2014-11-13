<?php
class Md_capnhat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	// Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng donvi
 	public function getmadv(){
        $query=$this->db->get("donvi");
        return $query->result();
	}
	// Output: danh sách dữ liệu
	// Lấy mã đơn vị và tên đơn vị từ bảng đơn vị
	public function getTendonvi(){
		$this->db->select("MA_DV,TEN_DV");
        $query=$this->db->get("donvi");
        return $query->result_array();
	}
	// Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng loai_mba
	public function getloaimba(){
        $query=$this->db->get("loai_mba");
        return $query->result();
	}

	public function getTenloaimba(){
        $query=$this->db->get("loai_mba");
        return $query->result_array();
	}
	// Output: danh sách dữ liệu
	// Láy dữ liệu từ bảng dautu
	public function getDaitu(){
        $query=$this->db->get("daitu");
        return $query->result();
	}
	// Output: danh sách dữ liệu
	// Láy dữ liệu từ bảng tram
	public function getTram(){
        $query=$this->db->get("tram");
        return $query->result();
	}
	// Input: mã đơn vị
	// Output: danh sách dữ liệu
	//Lấy dữ liệu từ bảng mba, chitiet_qtsd, tram khi mã đơn vị thỏa điều kiện MA_DV = $madv.
	public function getTramDV($madv){
		$this->db->select('*');
		$this->db->where('mba.MA_DV', $madv);
		$this->db->from('mba');
		$this->db->join('chitiet_qtsd', 'chitiet_qtsd.SONO = mba.SONO');
		$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');		
		$query = $this->db->get();
		return $query->result();
	}
	// Input: mã đơn vị
	// Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng loai_mba, nhasanxuat, donvi khi thỏa điều kiện SUDUNG_MBA = 1 và MA_DV = $donvi
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
	// Input: mã đơn vị
	// Output: danh sách số NO
	// Lấy dữ liệu từ bảng mba khi SUDUNG_MBA = 1, MA_DV = $donvi
	public function getSono($donvi){
		$this->db->where("MA_DV",$donvi);
		$this->db->where("SUDUNG_MBA",'1');
		$this->db->select("SONO");
        $query=$this->db->get("mba");
		return $query->result();
	}
	// Output: danh sách số NO
	// Lấy dữ liệu từ bảng mba khi SUDUNG_MBA = 1
	public function getFullSono(){
		$this->db->where("SUDUNG_MBA",'1');
		$this->db->select("SONO");
        $query=$this->db->get("mba");
		return $query->result();
	}
	// Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng nhasanxuat
	public function nhasanxuat(){
        $query=$this->db->get("nhasanxuat");
        return $query->result();
	}
	// Output: danh sách mã hãng sản xuất và tên hãng sản xuất
	// Lấy dữ liệu từ bảng nhasanxuat
	public function getTennhasanxuat(){
		$this->db->select("MA_HSX,TEN_HSX");
        $query=$this->db->get("nhasanxuat");
        return $query->result_array();
	}
	// Input: dữ liệu cần thêm
	// Thêm dữ liệu vào bảng mba với dữ liệu là $bien
	public function addmba($bien){
		$this->db->insert("mba",$bien);
		return true;
	}
	// Input: dữ liệu cần thêm
	// Thêm dữ liệu vào bảng chitiet_tinhtrang với dữ liệu là $bien
	public function addTinhtrang($bien){
		$this->db->insert("chitiet_tinhtrang",$bien);
		return true;
	}
	// Input: dữ liệu cần thay đổi, số No
	// Thay đổi dữ liệu từ bảng chitiet_tinhtrang khi SONO = $id với dữ liệu là $bien
	public function editTinhtrang($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("chitiet_tinhtrang",$bien);
		return true;
	}
	// Input: dữ liệu cần thêm
	// Thêm dữ liệu trong bảng chitiet_qtsd với dữ liệu là $bien
	public function addTinhtrang_sd($bien){
		$this->db->insert("chitiet_qtsd",$bien);
		return true;
	}
	// Input: dữ liệu cần thay đổi, Số No
	// Thay đổi dữ liệu từ bảng chitiet_qtsd khi SONO = $id với dữ liệu là $bien
	public function editTinhtrang_sd($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("chitiet_qtsd",$bien);
		return true;
	}
	// Input: dữ liệu cần thêm
	// Thêm dữ liệu trong bảng chitiet_daitu với dữ liệu là $bien
	public function addTinhtrang_dt($bien){
		$this->db->insert("chitiet_daitu",$bien);
		return true;
	}
	// Input: dữ liệu cần thay đổi, số No
	// Thay đổi dữ liệu từ bảng chitiet_daitu khi SONO = $id với dữ liệu là $bien
	public function editTinhtrang_dt($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("chitiet_daitu",$bien);
		return true;
	}
	// Input: dữ liệu cần thay đổi, Số No
	// Thay đổi dữ liệu từ bảng mba khi SONO = $id với dữ liệu là $bien
	public function editmba($id,$bien){
		$this->db->where("SONO",$id);
		$this->db->update("mba",$bien);
		return true;
	}
	// Input: số No
	// Xóa dữ liệu từ bảng mba khi SONO = $id
	public function deletemba($id){
		$this->db->where("SONO",$id);
		$this->db->delete("mba");
		return true;
	}
	// Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng tinhtrang_mba
	public function getMa_TT(){
        $query=$this->db->get("tinhtrang_mba");
        return $query->result();
	}
	// Input: số No
	// Output: true/false
	// Kiểm tra số No trong bảng mba đã tòn tại hay chưa.
	public function checkSN($id){
		$this->db->where("SONO",$id);
		$query=$this->db->get("mba");
		if($query->num_rows()==1){
			return false;
		}else{
			return true;
		}
	}
	// Input: số No
	// Output: true/false
	// Kiểm tra số No trong bảng chitiet_tinhtrang đã tồn hay chưa.
	public function checkSN_TT($id){
		$this->db->where("SONO",$id);
		$query=$this->db->get("chitiet_tinhtrang");
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	// Input: số No
	// Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng tinhtrang_mba, chitiet_tinhtrang khi SONO = $sn
	public function getTinhtrang($sn){
			$this->db->where("SONO",$sn);
			$this->db->from('chitiet_tinhtrang');
			$this->db->join('tinhtrang_mba', 'chitiet_tinhtrang.MA_TT = tinhtrang_mba.MA_TT');
			$this->db->order_by("NGAYXET_TT", "asc");
			$query = $this->db->get();
			return $query->result_array();
	}
	// Input: số No
	// Output: danh sách dữ liệu
	// Lấy dữ liệu từ bảng chitiet_qtsd, tram khi SONO = $sn
	public function getQuatrinhSD($sn){
			$this->db->where("SONO",$sn);
			$this->db->from('chitiet_qtsd');
			$this->db->join('tram', 'chitiet_qtsd.MATRAM = tram.MATRAM');
			$this->db->order_by("NGAY_BD", "asc");
			$query = $this->db->get();
			return $query->result_array();
	}
	// Input: số No
	// Output: danh sách dử liệu
	// Lấy dữ liệu từ bảng chitiet_daitu, dautu khi SONO = $sn
	public function getQuatrinhDT($sn){
			$this->db->where("SONO",$sn);
			$this->db->from('chitiet_daitu');
			$this->db->join('daitu', 'chitiet_daitu.MA_DAITU = daitu.MA_DAITU');
			$this->db->order_by("NGAYDAITU", "asc");
			$query = $this->db->get();
			return $query->result_array();
	}
	// Input: mã số tài sản
	// Output: true/false
	// Kiểm tra liệu từ bảng mba khi MSTS = $ms
	public function checkMSTS($ms){
		$this->db->where("MSTS",$ms);
		$query=$this->db->get("mba");
		if($query->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}
	// Input: mã tình trạng, số No, ngày xét
	// Output: true/false
	// Kiểm tra dử liệu trong bảng chitiet_tinhtrang khi MA_TT = $ma_tt, SONO = $so_no, NGAYXET_TT = $ngay_xet 
	public function check_date_tt($ma_tt,$so_no,$ngay_xet){
		$this->db->where("MA_TT",$ma_tt);
		$this->db->where("SONO",$so_no);
		$this->db->where("NGAYXET_TT",$ngay_xet);
		$query=$this->db->get("chitiet_tinhtrang");
		if($query->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}
	// Input: mã trạm, số No, ngày bắt đầu.
	// Output: true/false
	// Kiểm tra dũ liệu trong bảng chitiet_qtsd khi MATRAM = $ ma_tram, SONO = $so_no, NGAY_BD = $ngay_bd
	public function check_date_qtsd($ma_tram,$so_no,$ngay_bd){
		$this->db->where("MATRAM",$ma_tram);
		$this->db->where("SONO",$so_no);
		$this->db->where("NGAY_BD",$ngay_bd);
		$query=$this->db->get("chitiet_qtsd");
		if($query->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}
	// Input: mã đại tu, số No, ngày đại tu
	// Output: true/false
	// Kiểm tra dữ liệu trong bảng chitiet_daitu khi MA_DAITU = $ma_dt, SONO = $so_no, NGAYDAITU = $ngay_dt
	public function check_date_dt($ma_dt,$so_no,$ngay_dt){
		$this->db->where("MA_DAITU",$ma_dt);
		$this->db->where("SONO",$so_no);
		$this->db->where("NGAYDAITU",$ngay_dt);
		$query=$this->db->get("chitiet_daitu");
		if($query->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}
	// Input: mã số tài sản, số No
	// Output: số No
	// Kiểm tra mã số tài sản trước khi cập nhật
	public function checkMSTS_CapNhat($msts,$sono){
		//Xet MSTS voi SONO tuong ung giong hay khac 
		$this->db->where("SONO",$sono);
		$this->db->where("MSTS !=",$msts);
		$query=$this->db->get("mba");
		// Neu khac thi xet xem no co trung voi MSTS nao trong CSDL ko
		if($query->num_rows() > 0){
			$this->db->where("MSTS",$msts);
			$query=$this->db->get("mba");
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
	
}

?>