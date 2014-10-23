<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title></title>
			<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
			<style type="text/css">
			p{
				cursor: pon
			}
			</style>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript">
					jQuery(document).ready(function($) {
						$('#menu ul li a').removeClass('selected');
						$('#menu ul li:nth-child(4) a').addClass('selected').removeAttr('href').css({
							cursor: 'pointer'
						});
						$('#left-menu ul li a').click(function(event) {
							/* Act on the event */
							$('#left-menu ul li a').removeClass('left_select');
							$(this).addClass('left_select');
							return false;
						});
					});
			</script>
	</head>
	<body>
		<?php $this->load->view('layout/header.php'); ?>
		<article>
			<div id="left-menu">
				<ul>
					<li><a href="" class="left_select left_bg">Bao Cao 1</a></li>
					<li><a href="" class="left_bg">Bao Cao 2</a></li>
					<li><a href="" class="left_bg">Bao Cao 3</a></li>
					<li><a href="" class="left_bg">Bao Cao 4</a></li>
				</ul>
			</div><!--End left-menu-->
			<div id="content">
					<?php echo form_open(); ?>
					<?php echo form_close(); ?>
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
	</body>
</html>