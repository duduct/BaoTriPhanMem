<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title></title>
			<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
			<style type="text/css">
			</style>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript">

			$(document).ready(function(){
				$('a.parent_menu').click(function() {
					$('#metro').remove();
					$('#menu ul li').removeClass('active');
					$(this).parent().addClass('active');
					$('#menu ul li a').removeClass('selected');
					$(this).addClass('selected');
					$('#menu ul li .sub_menu').css({
						display: 'none'
					});
					$('.active .sub_menu').css({
						display: 'block'
					});
					$('#menu ul li .sub_menu li:first-child a').addClass('sub_select');
				});
				$('ul.sub_menu li a').click(function(){
					$('.sub_menu li a').removeClass('sub_select');
					$(this).addClass('sub_select');
				});
			});
			</script>
	</head>
	<body>
		<?php $this->load->view('layout/header.php'); ?>
		<article>
			<?php $this->load->view('layout/left.php'); ?>

			<?php
				switch (uri_string()) {
					case 'site/member':
						$this->load->view('layout/content.php');
						break;
					case 'site/timkiem1':
						$this->load->view('layout/timkiem1');
						break;
					case 'site/timkiem2':
						$this->load->view('layout/timkiem2');
						break;
					default:
						$this->load->view('layout/login');
				}
			?>
			<div class="clear">

			</div><!--End clear-->
		</article>
	</body>
</html>