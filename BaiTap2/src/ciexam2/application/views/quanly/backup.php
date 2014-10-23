<?php
header("Content-Type: application/octet-stream;");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Disposition: attachment; filename=Saoluu_Dulieu_MBA.sql");
backup_tables();
/* Sao lưu cả database hoặc một bảng cụ thể nào đó */
function backup_tables($tables = 'chitiet_daitu,chitiet_qtsd,chitiet_tinhtrang,daitu,donvi,loai_mba,mba,nhasanxuat,tinhtrang_mba,tram'){
	$add_foregn = "ALTER TABLE chitiet_daitu ADD CONSTRAINT FK_CAC_LAN_DAI_TU FOREIGN KEY (SONO) REFERENCES mba (SONO) ON DELETE RESTRICT ON UPDATE RESTRICT;\n";
	$add_foregn.= "ALTER TABLE chitiet_daitu ADD CONSTRAINT FK_NOI_DUNG_DAI_TU FOREIGN KEY (MA_DAITU) REFERENCES daitu (MA_DAITU) ON DELETE RESTRICT ON UPDATE RESTRICT ;\n";
	$add_foregn.= "ALTER TABLE chitiet_qtsd ADD CONSTRAINT FK_QUA_TRINH_SU_DUNG_CUA_MBA FOREIGN KEY (SONO) REFERENCES mba (SONO) ON DELETE RESTRICT ON UPDATE RESTRICT;\n";
	$add_foregn.= "ALTER TABLE chitiet_qtsd ADD CONSTRAINT FK_TRAM_SU_DUNG FOREIGN KEY (MATRAM) REFERENCES tram (MATRAM) ON DELETE RESTRICT ON UPDATE RESTRICT;\n";
	$add_foregn.= "ALTER TABLE chitiet_tinhtrang ADD CONSTRAINT FK_THONG_TINH_VE_TINH_TRANG_MBA FOREIGN KEY (MA_TT) REFERENCES tinhtrang_mba (MA_TT) ON DELETE RESTRICT ON UPDATE RESTRICT;\n";
	$add_foregn.= "ALTER TABLE chitiet_tinhtrang ADD CONSTRAINT FK_TINH_TRANG_MBA FOREIGN KEY (SONO) REFERENCES mba (SONO) ON DELETE RESTRICT ON UPDATE RESTRICT;\n";
	$add_foregn.= "ALTER TABLE mba ADD CONSTRAINT FK_DON_VI_QUAN_LY FOREIGN KEY (MA_DV) REFERENCES donvi (MA_DV) ON DELETE RESTRICT ON UPDATE RESTRICT;\n";
	$add_foregn.= "ALTER TABLE mba ADD CONSTRAINT FK_DUOC_SAN_XUAT FOREIGN KEY (MA_HSX) REFERENCES nhasanxuat (MA_HSX) ON DELETE RESTRICT ON UPDATE RESTRICT;\n";
	$add_foregn.= "ALTER TABLE mba ADD CONSTRAINT FK_LOAI_MAY FOREIGN KEY (MA_LOAI) REFERENCES loai_mba (MA_LOAI) ON DELETE RESTRICT ON UPDATE RESTRICT;\n\n";
	
	$delete_foregn = "ALTER TABLE chitiet_daitu DROP FOREIGN KEY FK_CAC_LAN_DAI_TU;\n";
	$delete_foregn.= "ALTER TABLE chitiet_daitu DROP FOREIGN KEY FK_NOI_DUNG_DAI_TU;\n";
	$delete_foregn.= "ALTER TABLE chitiet_qtsd DROP FOREIGN KEY FK_QUA_TRINH_SU_DUNG_CUA_MBA;\n";
	$delete_foregn.= "ALTER TABLE chitiet_qtsd DROP FOREIGN KEY FK_TRAM_SU_DUNG;\n";
	$delete_foregn.= "ALTER TABLE chitiet_tinhtrang DROP FOREIGN KEY FK_THONG_TINH_VE_TINH_TRANG_MBA;\n";
	$delete_foregn.= "ALTER TABLE chitiet_tinhtrang DROP FOREIGN KEY FK_TINH_TRANG_MBA;\n";
	$delete_foregn.= "ALTER TABLE mba DROP FOREIGN KEY FK_DON_VI_QUAN_LY;\n";
	$delete_foregn.= "ALTER TABLE mba DROP FOREIGN KEY FK_DUOC_SAN_XUAT;\n";
	$delete_foregn.= "ALTER TABLE mba DROP FOREIGN KEY FK_LOAI_MAY;\n\n";
	
  $return=$delete_foregn;
  $host='localhost'; $user='root'; $pass=''; $name='qlmba';
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);
  mysql_query("SET NAMES 'UTF8'");
  //Lấy tất cả các bảng
  if($tables == '*'){
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result)){
      $tables[] = $row[0];
    }
  }else{
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //Vòng lặp tạo ra các câu lệnh xoá, insert nội dung với mỗi bảng
  foreach($tables as $table){
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);
    //code xoá
    $return.= "DELETE FROM ".$table.";\n";
    for ($i = 0; $i < $num_fields; $i++) {
      while($row = mysql_fetch_row($result)){
        //code them vao
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++){
          $row[$j] = addslashes($row[$j]);
          $row[$j] = str_replace("\n","\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
    
  }
  //thay thế "" = "NULL" tuỳ các bạn
  //$return=str_replace("\"\"","\"\"",$return);//tuỳ 
  $return.=$add_foregn;//them quan he
  //save file
  /*$handle = fopen('db-backup-'.time().'.sql','w+');
  fwrite($handle,$return);
  fclose($handle);*/
  echo $return;
}
?>