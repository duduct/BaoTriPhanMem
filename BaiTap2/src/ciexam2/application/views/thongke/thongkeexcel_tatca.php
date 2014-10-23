<?php
require 'php-excel.class.php';
//$date = new Date();
//$dd = $date.getDate();
//$mm = $date.getMonth();
//$yy = $date.getFullYear();
$this->load->helper('date');
$df = "%d-%m-%Y";
$d = array(array('Ngày thống kê:',mdate($df),'','Thống kê Đơn vị:',$ti));
$d[]=array('Thống kê theo:',$title[1],'','');
$d[]=array('','','','');
$d[]=array('','','','');
$dt = array(array('STT',$title[0], 'SỐ LƯỢNG')); 
 	$stt = 0;
  foreach ($data as $k=>$v)
    {
		$stt=$stt+1;
        $dt[] = array ($stt, $v["TEN"],$v["soluong"]); 
    }

$xls = new Excel_XML('UTF-8', false, 'S');
$xls->addArray($d);
$xls->addArray($dt);
$xls->generateXML('Thongke');
?>