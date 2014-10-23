<?php
require 'php-excel.class.php';
$this->load->helper('date');
$df = "%d-%m-%Y";
/*foreach ($title1 as  $t) {
							$ti = $t["TEN_DV"];
						}*/
$dd = array(array('Ngày báo cáo:',mdate($df),'','Báo cáo Đơn vị:','Tất cả'));
$dd[]=array('Tình trạng:','Tất cả','','');
$dd[]=array('','','','');
$dd[]=array('','','','');
$d = array(array('Số TT','Số No','Tên MBA', 'Tên Đơn Vị', 'Tên Hãng SX','Quốc gia SX','MSTS', 'Năm Sản Xuất','Năm Nhập Về','Loại Dầu', 'Trọng Lượng Dầu','Loại MBA','Thông Số Đo','Công Suất','Điện Áp')); 
 	$stt = 0;
  foreach ($data as $k=>$v)
    {
		$stt=$stt+1;
        $d[] = array ($stt, $v["SONO"], $v["TEN_MBA"],$v["TEN_DV"],$v["TEN_HSX"],$v["QUOCGIA_SX"], $v["MSTS"],$v["NAM_SX"],$v["NAMNHAPVE"], $v["LOAIDAU"],$v["TRONGLUONGDAU"], $v["TENLOAI_MBA"],$v["THONGSODO"], $v["CONGSUAT"],$v["DIENAP"]); 
    }
$xls = new Excel_XML('UTF-8', false, 'Sheet 1');
$xls->addArray($dd);
$xls->addArray($d);
$xls->generateXML('BaoCao');
?>