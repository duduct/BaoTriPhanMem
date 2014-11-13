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
<body>
	<?php $this->load->view('layout/header.php'); ?>
	<div class="container-fluid">
		<!--Navigation to other link -->
	    <ul class="nav nav-pills nav-justified" style="margin-bottom: 15px;">
	      	<li class='active'><a href="<?php echo base_url();?>capnhat/capnhatmba">Máy Biến Áp</a></li>
	      	<?php
      		$code = $this->session->userdata('logged_in')['code'];
      		if($code < 3){
			echo'<li><a href="'.base_url().'capnhat/tinhtrang">Tinh Trạng MBA</a></li>';
			}
			?>
	    </ul><!--End navigation-->
	</div><!--End container -->
	<?php $this->load->view('layout/contentcapnhat.php'); ?>
	<?php $this->load->view('layout/footer'); ?>
</body>
</html>