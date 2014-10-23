<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title></title>
			<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
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
		<article>
			<?php $this->load->view('layout/leftmba.php'); ?>
			<?php $this->load->view('layout/contentcapnhat.php'); ?>
			<div class="clear">

			</div><!--End clear-->
		</article>
		<?php $this->load->view('layout/footer'); ?>
	</body>
</html>