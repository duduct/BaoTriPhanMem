<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<?php $this->load->view('layout/library.php'); ?>
	<script type="text/javascript" src="<?php echo base_url();?>template/javascript/capnhatMBA_js.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#menu ul li a').removeClass('selected');
		$('#menu ul li:nth-child(2) a').addClass('selected').removeAttr('href').css({
			cursor: 'pointer'
		});
		/* Act on the event */
		
	});
	</script>
</head>
<body onLoad="khoitao()">
	<?php $this->load->view('layout/header.php'); ?>
	
	<!--Navigation to other link -->
	<ul class="nav nav-pills nav-justified" style="margin-bottom: 15px;">
		<li><a href="<?php echo base_url();?>capnhat/capnhatmba">Máy Biến Áp</a></li>
		<li class='active'><a href="<?php echo base_url();?>capnhat/tinhtrang">Tinh Trạng MBA</a></li>
	</ul><!--End navigation-->
	<?php $this->load->view('layout/contenttinhtrang.php'); ?>
	<?php $this->load->view('layout/footer'); ?>
</body>
</html>