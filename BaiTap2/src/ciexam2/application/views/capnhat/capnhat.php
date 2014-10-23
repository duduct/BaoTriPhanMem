<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title></title>
			<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
			<style type="text/css">
			.display{
				display: none;
			}
			</style>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript">
					jQuery(document).ready(function($) {
						$('#menu ul li a').removeClass('selected');
						$('#menu ul li:nth-child(2) a').addClass('selected').removeAttr('href').css({
							cursor: 'pointer'
						});
							/* Act on the event */

					});
					var code = <?php echo $this->session->userdata('logged_in')['code']; ?>;
					switch(code){
                      case 3:
                      jQuery(document).ready(function($) {
                      $('#menu ul li:first-child').remove();
                      $('#menu ul li:nth-child(4)').remove();
                      $('#menu ul li:last-child').remove();
                	  $('#left-menu ul li:last-child').remove();
                    });
                      break;
                  }
			</script>
	</head>
	<body>
		<?php $this->load->view('layout/header.php'); ?>
		<article>
			<div id="left-menu">
				<ul>
					<li><a href="#" class="left_select left_bg">Tiềm Kiếm Số No</a></li>
					<li><a href="#" class="left_bg">Tinh</a></li>
				</ul>
			</div><!--End left-menu-->
			<div id="content">
				
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
		<?php $this->load->view('layout/footer'); ?>
	</body>
</html>