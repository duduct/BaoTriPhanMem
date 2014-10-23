<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
// Khai Báo tên của file sao lưu được để trên hệ thông hoặc bạn của thể phát triển chức  năng chọn trực tiếp...
if (!$_FILES['namefile']) {echo '<script>alert("Thất bại rồi!"); window.history.back(1);</script>';}
else {
	$extension = end(explode(".", $_FILES["namefile"]["name"]));
	if ($extension!="sql") echo '<script>alert("Yêu cầu dữ liệu là sql!"); window.history.back(1);</script>';
	else {$filename = $_FILES['namefile']['tmp_name'];
		// MySQL host
		$mysql_host = 'localhost';
		// MySQL username
		$mysql_username = 'root';
		// MySQL password
		$mysql_password = '';
		// Database name
		$mysql_database = 'qlmba';
		
		
		//////////////////////////////////////////////////////////////////////////////////////////////
		
		// Connect to MySQL server
		$con=mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Lỗi kết nối MySQL server: ' . mysql_error());
		// Select database
		mysql_select_db($mysql_database) or die('Lỗi truy cập bảng dữ liệu MySQL database: ' . mysql_error());
		
		mysql_query("SET NAMES 'UTF8'");
		
		// Temporary variable, used to store current query
		$templine = '';
		// Read in entire file
		$lines = file($filename);
		foreach ($lines as $line){
			if (strpos($line,";")>0){
				//echo $line."<br>";
				$templine=substr($line,0,strpos($line,";"));
				mysql_query($templine) or die(mysql_error());
			}
		}
		echo '<script>alert("Thành công!"); window.location="'.base_url().'index.php/saoluu_phuchoi"</script>';
	}
}
?>