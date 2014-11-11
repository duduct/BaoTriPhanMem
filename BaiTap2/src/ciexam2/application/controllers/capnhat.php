<?php
class Capnhat extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}
	public function index(){
				$this->load->helper(array('form'));
				$this->load->model("md_capnhat");
				$data["loaimba"]=$this->md_capnhat->getloaimba();
				$data["madv"]=$this->md_capnhat->getmadv();
				$data['nsx']=$this->md_capnhat->nhasanxuat();
				$this->load->view("capnhat/capnhatmba",$data);
				
	}
	public function index1(){
				$this->load->helper(array('form', 'url'));
				$this->load->model("md_capnhat");
				$code = $this->session->userdata('logged_in')['code'];
                $dv = $this->session->userdata('logged_in')['ma_dv'];
				switch ($code) {
                             case 1:
                              $data["so_no"]=$this->md_capnhat->getFullSono();
							  $data["ma_tram"]=$this->md_capnhat->getTram();
                               break;
                             case 2:
                              $data["so_no"]=$this->md_capnhat->getSono($dv);   
							  $data["ma_tram"]=$this->md_capnhat->getTramDV($dv);      
                                }
				$data["daitu_mba"]=$this->md_capnhat->getDaitu();
				$data["tinhtrang"]=$this->md_capnhat->getMa_TT();
				$this->load->view("capnhat/capnhattinhtrang",$data);
				
				
	}

	public function capnhattinhtrangAjax() {
		$this->load->helper(array('form', 'url'));
		$this->load->model("md_capnhat");
		$code = $this->session->userdata('logged_in')['code'];
		$dv = $this->session->userdata('logged_in')['ma_dv'];
		switch ($code) {
			case 1:
			$data["so_no"]=$this->md_capnhat->getFullSono();
			break;
			case 2:
			$data["so_no"]=$this->md_capnhat->getSono($dv);         
		}
		$data["ma_tram"]=$this->md_capnhat->getTram();
		$data["daitu_mba"]=$this->md_capnhat->getDaitu();
		$data["tinhtrang"]=$this->md_capnhat->getMa_TT();		
		$data['cttinhtrang']=$this->md_capnhat->getTinhtrang($_GET['sono_s3']);
		$data['ctsudung']=$this->md_capnhat->getQuatrinhSD($_GET['sono_s3']);
		$data['ctdaitu']=$this->md_capnhat->getQuatrinhDT($_GET['sono_s3']);
		$this->load->view("capnhat/capnhattinhtrangAjax",$data);
	}

	public function capnhatmbaAjax(){
			$this->load->model("md_capnhat");	
			$data["loaimba"]=$this->md_capnhat->getloaimba();
			$data["madv"]=$this->md_capnhat->getmadv();
			$data['nsx']=$this->md_capnhat->nhasanxuat();
			$data["mba"]=$this->md_capnhat->getmba($_GET['madv']);
			$data["tendv"]=$this->md_capnhat->getTendonvi();
			$data["tenhsx"]=$this->md_capnhat->getTennhasanxuat();
			$data["tenloaimba"]=$this->md_capnhat->getTenloaimba();
			$this->load->view("capnhat/capnhatmbaAjax",$data);
		}
	
	public function upfile1(){
					if($this->input->post('load')){		
						if($_FILES['file']['tmp_name']){
								$dom = DOMDocument::load( $_FILES['file']['tmp_name'] );
								$rows = $dom->getElementsByTagName('Row');
								$first_row = true;
								$dong=0;
								$this->load->model('md_capnhat');
								foreach ($rows as $row){
									if( !$first_row)
										{
										$so_no="";
										$ma_dv="";
										$ma_hsx="";
										$ma_loai="";
										$ten_mba="";
										$ma_ts="";
										$nam_sx="";
										$cong_suat="";
										$dien_ap="";
										$loai_dau="";
										$tsd_mba="";
										$quocgia_sx="";
										$nam_nv="";
										$chieudai_mba="";
										$chieurong_mba="";
										$chieucao_mba="";
										$tlruot_mba="";
										$tldau_mba="";
										$tongtl_mba="";
										$index = 0;
										$cells = $row->getElementsByTagName( 'Cell' );
										foreach( $cells as $cell )
											{
											if ( $index == 0 ) $so_no = $cell->nodeValue;
											if ( $index == 1 ) $ma_dv = $cell->nodeValue;
											if ( $index == 2 ) $ma_hsx = $cell->nodeValue;
											if ( $index == 3 ) $ma_loai = $cell->nodeValue;
											if ( $index == 4 ) $ten_mba = $cell->nodeValue;
											if ( $index == 5 ) $ma_ts = $cell->nodeValue;
											if ( $index == 6 ) $nam_sx = $cell->nodeValue;
											if ( $index == 7 ) $cong_suat = $cell->nodeValue;
											if ( $index == 8 ) $dien_ap = $cell->nodeValue;
											if ( $index == 9 ) $loai_dau = $cell->nodeValue;
											if ( $index == 11 ) $quocgia_sx = $cell->nodeValue;
											if ( $index == 10) $tsd_mba = $cell->nodeValue;
											if ( $index == 12 ) $nam_nv = $cell->nodeValue;
											if ( $index == 13 ) $chieudai_mba = $cell->nodeValue;
											if ( $index == 14 ) $chieurong_mba= $cell->nodeValue;
											if ( $index == 15 ) $chieucao_mba = $cell->nodeValue;
											if ( $index == 16 ) $tlruot_mba = $cell->nodeValue;
											if ( $index == 17 ) $tldau_mba = $cell->nodeValue;
											if ( $index == 18 ) $tongtl_mba = $cell->nodeValue;
											$index += 1;
											}
										$dong += 1;					
										$data_mba=array(
											"SONO"=>"$so_no",
											"MA_DV"=>"$ma_dv",
											"MA_HSX"=>"$ma_hsx",
											"MA_LOAI"=>"$ma_loai",
											"TEN_MBA"=>"$ten_mba",
											"MSTS"=>"$ma_ts",
											"NAM_SX"=>"$nam_sx",
											"CONGSUAT"=>"$cong_suat",
											"DIENAP"=>"$dien_ap",
											"LOAIDAU"=>"$loai_dau",
											"THONGSODO"=>"$tsd_mba",
											"QUOCGIA_SX"=>"$quocgia_sx",
											"NAMNHAPVE"=>"$nam_nv",
											"CHIEUDAI"=>"$chieudai_mba",
											"CHIEURONG"=>"$chieurong_mba",
											"CHIEUCAO"=>"$chieucao_mba",
											"TRONGLUONGRUOTMAY"=>"$tlruot_mba",
											"TRONGLUONGDAU"=>"$tldau_mba",
											"TONGTRONGLUONG"=>"$tongtl_mba",
											"SUDUNG_MBA"=>"1"
									);
									$code = $this->session->userdata('logged_in')['code'];
               						$dv = $this->session->userdata('logged_in')['ma_dv'];
								switch ($code) {
                            		  case 1:
                             			 if($index==19) {
												if($this->md_capnhat->checkSN($so_no))
													 $this->md_capnhat->addmba($data_mba);
												else  
												{	
													$this->index();
													echo "<script language=javascript>
													 alert('Số No {$so_no} đã tồn tại!'); </script>";	
													return false;	
												}
															}
											else {
												$this->index();
												echo "<script language=javascript> 
												alert('Dòng {$dong} sai định dạng!'); </script>";	
												return false;	
											}      
                             			  break;
                           			  case 2: if($ma_dv==$dv) if($index==19) {
												if($this->md_capnhat->checkSN($so_no))
													 $this->md_capnhat->addmba($data_mba);
												else  
												{	
													$this->index();
													echo "<script language=javascript>
													 alert('Số No {$so_no} đã tồn tại!'); </script>";	
													return false;	
												}
															}
											else {
												$this->index();
												echo "<script language=javascript> 
												alert('Dòng {$dong} sai định dạng!'); </script>";	
												return false;	
											}  
											else   { 
												$this->index();
												echo "<script language=javascript> 
														alert('Dòng {$dong}, Chỉ cập nhật MBA trong đơn vị quản lý!'); </script>";
                               							return false; 
														}
											break;			
											 } 
											 
											
									}
									$first_row = false;
								}
								echo "<script language=javascript> alert('Thành công!'); </script>";
							}
						else echo "<script language=javascript> alert('Vui lòng chọn file'); </script>";
						$this->index();
						}
}
public function tinhtrang(){
		$this->load->library('form_validation');
		$this->lang->load('vi', 'vietnamese');
				$this->form_validation->set_message('required', $this->lang->line('required'));
						$ma_tt=$this->input->post('matt');
						$so_no=$this->input->post('sono_sl');
						$ngay_xet=$this->input->post('ngayxet');
						$chitiet=$this->input->post('chitiet_tt');
						$ghi_chu=$this->input->post('ghichu');
					$data_tt=array(
									"MA_TT"=>"$ma_tt",
									"SONO"=>"$so_no",
									"NGAYXET_TT"=>"$ngay_xet",
									"CHITIETTINHTRANGTHIETBI"=>"$chitiet",
									"GHICHU"=>"$ghi_chu",
									"TT_MOI"=>"1"
									);
					$data_tt1=array(
						"TT_MOI"=>"0" 	);
					$data_sd=array(
						"QTSD_MOI"=>"0" 	);
					$data_dt=array(
						"DT_MOI"=>"0" 	);	
		if($this->input->post('capnhat'))	{
	   		$this->form_validation->set_rules('chitiet_tt','Chi tiết tình trạng ','required|callback_check_max_length_chitiet_tt|trim|xss_clean');
			if ($this->form_validation->run() == TRUE){
				$this->load->model("md_capnhat");
						if($this->md_capnhat->check_date_tt($ma_tt,$so_no,$ngay_xet) == true){
						$this->load->model('md_capnhat');
						$this->md_capnhat->editTinhtrang($so_no,$data_tt1);
						$this->md_capnhat->addTinhtrang($data_tt);
						if($this->input->post('c1')==true){
						$ma_tram=$_POST['matram'];
						$ngay_bd=$this->input->post('ngaybd');
						$ngay_kt=$this->input->post('ngaykt');
						$data_sd=array(
									"SONO"=>"$so_no",
									"MATRAM"=>"$ma_tram",
									"NGAY_BD"=>"$ngay_bd",
									"NGAY_KT"=>"$ngay_kt",
									"QTSD_MOI"=>"1"
									);
						$data_sd1=array(
									"QTSD_MOI"=>"0"
									);
						$this->md_capnhat->editTinhtrang_sd($so_no,$data_sd1);
						$this->md_capnhat->addTinhtrang_sd($data_sd);
						}
						if($this->input->post('c2')==true){
						$ma_daitu=$_POST['ma_dt'];
						$ngay_dt=$this->input->post('ngay_dt');
				    	$noidung_dt=$this->input->post('nd_daitu');
						$data_dt1=array(
									"SONO"=>"$so_no",
									"MA_DAITU"=>"$ma_daitu",
									"NGAYDAITU"=>"$ngay_dt",
									"ND_DAITU"=>"$noidung_dt",
									"DT_MOI"=>"1"
									);
						$this->md_capnhat->editTinhtrang_dt($so_no,$data_dt);
						$this->md_capnhat->addTinhtrang_dt($data_dt1);	
						}
						echo "<script language=javascript> alert('Cập nhật thành công!'); </script>";
						}else{
							echo "<script language=javascript> alert('Mỗi ngày bạn chỉ được cập nhật một lần!'); </script>";
						}
															}
		}
		if($this->input->post('chitiet_sono')){
			$this->load->helper(array('form', 'url'));
				$this->load->model("md_capnhat");
				$code = $this->session->userdata('logged_in')['code'];
                $dv = $this->session->userdata('logged_in')['ma_dv'];
				switch ($code) {
                             case 1:
                              $data["so_no"]=$this->md_capnhat->getFullSono();
                               break;
                             case 2:
                              $data["so_no"]=$this->md_capnhat->getSono($dv);         
                                }
				$data["ma_tram"]=$this->md_capnhat->getTram();
				$data["daitu_mba"]=$this->md_capnhat->getDaitu();
				$data["tinhtrang"]=$this->md_capnhat->getMa_TT();		
				$data['cttinhtrang']=$this->md_capnhat->getTinhtrang($_POST['sono_s3']);
				$data['ctsudung']=$this->md_capnhat->getQuatrinhSD($_POST['sono_s3']);
				$data['ctdaitu']=$this->md_capnhat->getQuatrinhDT($_POST['sono_s3']);
				$this->load->view("capnhat/capnhattinhtrang",$data);
			}	
		else $this->index1();				
}
	public function capnhatmba(){
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				$this->lang->load('vi', 'vietnamese');
				$this->form_validation->set_message('required', $this->lang->line('required'));
				$this->form_validation->set_message('greater_than', $this->lang->line('greater_than'));
				
						$so_no=$this->input->post('sono');
						$ten_mba=$this->input->post('madv');
						$ma_dv=$this->input->post('madv');
						$ma_hsx=$this->input->post('tenhsx');
						$ma_loai=$this->input->post('loaimay');
						$ten_mba=$this->input->post('tenmba');
						$ma_ts=$this->input->post('msts');
						$nam_sx=$this->input->post('namsx');
						$cong_suat=$this->input->post('congsuat');
						$dien_ap=$this->input->post('dienap');
						$loai_dau=$this->input->post('loaidau');
						$tsd_mba=$this->input->post('thongsodo');
						$quocgia_sx=$this->input->post('quocgiasx');
						$nam_nv=$this->input->post('namnv');
						$chieudai_mba=$this->input->post('chieudai');
						$chieurong_mba=$this->input->post('chieurong');
						$chieucao_mba=$this->input->post('chieucao');
						$tlruot_mba=$this->input->post('tlruotmay');
						$tldau_mba=$this->input->post('tldau');
						$tongtl_mba=$this->input->post('tongtl');
						$sudung=1;
						$data_mba=array(
									"SONO"=>"$so_no",
									"MA_DV"=>"$ma_dv",
									"MA_HSX"=>"$ma_hsx",
									"MA_LOAI"=>"$ma_loai",
									"TEN_MBA"=>"$ten_mba",
									"MSTS"=>"$ma_ts",
									"NAM_SX"=>"$nam_sx",
									"CONGSUAT"=>"$cong_suat",
									"DIENAP"=>"$dien_ap",
									"LOAIDAU"=>"$loai_dau",
									"THONGSODO"=>"$tsd_mba",
									"QUOCGIA_SX"=>"$quocgia_sx",
									"NAMNHAPVE"=>"$nam_nv",
									"CHIEUDAI"=>"$chieudai_mba",
									"CHIEURONG"=>"$chieurong_mba",
									"CHIEUCAO"=>"$chieucao_mba",
									"TRONGLUONGRUOTMAY"=>"$tlruot_mba",
									"TRONGLUONGDAU"=>"$tldau_mba",
									"TONGTRONGLUONG"=>"$tongtl_mba",
									"SUDUNG_MBA"=>"$sudung"
									);
				if ($this->input->post('xoa')){
					$this->form_validation->set_rules('sono','Số No','required|trim|xss_clean|callback_ktSNX');
					
					if ($this->form_validation->run() == TRUE){
						$this->load->model('md_capnhat');
						if($this->md_capnhat->checkSN_TT($so_no)==true){
						$this->md_capnhat->deletemba($so_no);
						echo "<script language=javascript> alert('Xóa thành công!'); </script>";}
						else {
							$so_no=$this->input->post('sono');
							$sudung=0;
							$data_mba=array(
									"SUDUNG_MBA"=>"$sudung");
							$this->load->model('md_capnhat');
							$this->md_capnhat->editmba($so_no,$data_mba);
							echo "<script language=javascript> alert('Xóa thành công!'); </script>";
							}
																}
												}
				else if($this->input->post('them'))	{
						$this->form_validation->set_rules('sono','Số No','required|trim|xss_clean|callback_check_max_length_sono|callback_check_style|callback_ktSN');
						
						$this->form_validation->set_rules('quocgiasx','Quốc gia sản xuất','required|trim|xss_clean|callback_check_max_length_quocgiasx');
						
						$this->form_validation->set_rules('congsuat','Công Suất','required|trim|xss_clean|callback_check_max_length_congsuat|greater_than[0]');
								
						$this->form_validation->set_rules('dienap','Điện Áp','required|trim|xss_clean|callback_check_max_length_dienap');
										
				 		$this->form_validation->set_rules('loaidau','Loại Dầu','required|trim|xss_clean');
											
						$this->form_validation->set_rules('chieudai','Chiều Dài','required|trim|xss_clean|greater_than[0]');
												
						$this->form_validation->set_rules('chieurong','Chiều Rộng','required|trim|xss_clean|greater_than[0]');
													
						$this->form_validation->set_rules('chieucao','Chiều Cao','required|trim|xss_clean|greater_than[0]');
														
						$this->form_validation->set_rules('tlruotmay','Trọng Lượng Ruột Máy','required|trim|xss_clean|greater_than[0]');
														    
						$this->form_validation->set_rules('tldau','Trọng Lượng Dầu','required|trim|xss_clean|greater_than[0]');
																
						$this->form_validation->set_rules('tongtl','Tổng Trọng Lượng','required|trim|xss_clean|greater_than[0]');

						$this->form_validation->set_rules('namsx','Năm sản xuất','trim|xss_clean|greater_than[0]');

						$this->form_validation->set_rules('msts','Mã số tài sản','trim|xss_clean|callback_ktMSTS');

						$this->form_validation->set_rules('namnv','Năm nhập về','required|trim|xss_clean|callback_ktNAMNV|greater_than[0]');

						$this->form_validation->set_rules('tenmba','Tên máy biến áp','trim|xss_clean');
						
						$this->form_validation->set_rules('thongsodo','Thông số đo','trim|xss_clean');	

						if($this->form_validation->run() == TRUE){
							$this->load->model('md_capnhat');
							$this->md_capnhat->addmba($data_mba);
							echo "<script language=javascript> alert('Thêm thành công!'); </script>";	
																 }
													 }	


				else if($this->input->post('capnhat'))	{
						$this->form_validation->set_rules('sono','Số No','required|trim|xss_clean|callback_ktSNX');
						
						$this->form_validation->set_rules('quocgiasx','Quốc gia sản xuất','required|trim|xss_clean|callback_check_max_length_quocgiasx');
						
						$this->form_validation->set_rules('congsuat','Công Suất','required|trim|xss_clean|callback_check_max_length_congsuat|greater_than[0]');
								
						$this->form_validation->set_rules('dienap','Điện Áp','required|trim|xss_clean|callback_check_max_length_dienap');
										
				 		$this->form_validation->set_rules('loaidau','Loại Dầu','required|trim|xss_clean');
											
						$this->form_validation->set_rules('chieudai','Chiều Dài','required|trim|xss_clean|greater_than[0]');
												
						$this->form_validation->set_rules('chieurong','Chiều Rộng','required|trim|xss_clean|greater_than[0]');
													
						$this->form_validation->set_rules('chieucao','Chiều Cao','required|trim|xss_clean|greater_than[0]');
														
						$this->form_validation->set_rules('tlruotmay','Trọng Lượng Ruột Máy','required|trim|xss_clean|greater_than[0]');
														    
						$this->form_validation->set_rules('tldau','Trọng Lượng Dầu','required|trim|xss_clean|greater_than[0]');
																
						$this->form_validation->set_rules('tongtl','Tổng Trọng Lượng','required|trim|xss_clean|greater_than[0]');

						$this->form_validation->set_rules('namsx','Năm sản xuất','trim|xss_clean|greater_than[0]');

						$this->form_validation->set_rules('msts','Mã số tài sản','trim|xss_clean|callback_ktMSTS_CapNhat['.$this->input->post('sono').']');

						$this->form_validation->set_rules('namnv','Năm nhập về','required|trim|xss_clean|callback_ktNAMNV|greater_than[0]');

						$this->form_validation->set_rules('tenmba','Tên máy biến áp','trim|xss_clean');
						
						$this->form_validation->set_rules('thongsodo','Thông số đo','trim|xss_clean');	
				   													 
																
						
				   		if($this->form_validation->run() == TRUE){
							$this->load->model('md_capnhat');
							$this->md_capnhat->editmba($so_no,$data_mba);
							echo "<script language=javascript> alert('Cập nhật thành công!'); </script>";
																 }
														}
					if($this->input->post('dv1'))	{
						$this->load->model("md_capnhat");	
						$data["loaimba"]=$this->md_capnhat->getloaimba();
						$data["madv"]=$this->md_capnhat->getmadv();
						$data['nsx']=$this->md_capnhat->nhasanxuat();
						$data["mba"]=$this->md_capnhat->getmba($_POST['madv1']);
						$data["tendv"]=$this->md_capnhat->getTendonvi();
						$data["tenhsx"]=$this->md_capnhat->getTennhasanxuat();
						$data["tenloaimba"]=$this->md_capnhat->getTenloaimba();
						$this->load->view("capnhat/capnhatmba",$data);
						}
					else	$this->index();
												}

		public function check_max_length_sono(){	
				if(strlen($this->input->post('sono')) > 15)
				{
					$this->form_validation->set_message('check_max_length_sono', 'Trường \'%s\' không thể vượt quá  15 ký tự ');
		    		return false;
				}		
				return true;
		}

		public function check_max_length_dienap(){	
				if(strlen($this->input->post('dienap')) > 20)
				{
					$this->form_validation->set_message('check_max_length_dienap', 'Trường \'%s\' không thể vượt quá  15 ký tự ');
		    		return false;
				}		
				return true;
		}

		public function check_style($val){	
			$pattern1 = '/^[0-9]{1,15}$/'; 
			$pattern2 = '/^[0-9]{1,12}-[0-9]{2}$/'; 
			if(preg_match( $pattern1 , $val) || preg_match( $pattern2 , $val))
			{
	    		return true;
			}else{
				$this->form_validation->set_message('check_style', 'Trường \'%s\' nhập không đúng định dạng ví dụ: 8022115038876 hoặc 911121564-22');
				return false;
			}	
		}	
		
		public function check_max_length_quocgiasx(){	
			if(strlen($this->input->post('quocgiasx')) > 20)
			{
				$this->form_validation->set_message('check_max_length_quocgiasx', 'Trường \'%s\' không thể vượt quá  20 ký tự ');
	    		return false;
			}		
			return true;
		}
		
		public function check_max_length_chitiet_tt(){	
			if(strlen($this->input->post('chitiet_tt')) > 50)
			{
				$this->form_validation->set_message('check_max_length_chitiet_tt', 'Trường \'%s\' không thể vượt quá  50 ký tự ');
	    		return false;
			}		
			return true;
		}
		public function check_max_length_congsuat(){	
			if(strlen($this->input->post('congsuat')) > 20)
			{
				$this->form_validation->set_message('check_max_length_quocgiasx', 'Trường \'%s\' không thể vượt quá  10 ký tự ');
	    		return false;
			}		
			return true;
		}

		public function ktMSTS($ms){
			$this->load->model('md_capnhat');
			if ($this->md_capnhat->checkMSTS($ms))
				return true;
			else {
				$this->form_validation->set_message('ktMSTS', '%s ' .$this->input->post("msts").' đã tồn tại mã ');
				return false;
			}
		}

		public function ktMSTS_CapNhat($msts,$sono){
			if (! empty($msts)) {
					$this->load->model('md_capnhat');
				if ($this->md_capnhat->checkMSTS_CapNhat($msts,$sono))
					return true;
				else {
					$this->form_validation->set_message('ktMSTS_CapNhat', '%s ' .$this->input->post("msts").' đã tồn tại mã ');
					return false;
				}
			}
			return true;
			
		}


		public function ktNAMNV($val){
			$year = date("Y");
			if($val > $year){
				$this->form_validation->set_message('ktNAMNV', '\'%s\' phải nhỏ hơn hoặc bằng năm hiện tại.');
				return false;
			}else{
				if($this->input->post('namsx') > $val)
				{
				$this->form_validation->set_message('ktNAMNV', '\'%s\' phải lớn hơn hoặc bằng '.$this->input->post('namsx'));
	    		return false;
				}
			}	
			return true;
			}	
		public function ktSN($sn){
			$this->load->model('md_capnhat');
			if ($this->md_capnhat->checkSN($sn))
				return true;
			else {
				$this->form_validation->set_message('ktSN', '\'%s\' đã tồn tại mã '.$this->input->post("sono"));
				return false;
			}
		}
	public function ktSNX($sn){
		$this->load->model('md_capnhat');
		if ($this->md_capnhat->checkSN($sn)){
			$this->form_validation->set_message('ktSNX', '%s \''.$this->input->post("sono"). '\' không tồn tại ');
			return false;
		}
		else 
			return true;
		}										

						}
/* End of file capnhat.php */
/* Location: ./application/controllers/capnhat.php */
?>

