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
				function kt(){
					document.getElementById("dv").style.display = "none";
					document.getElementById("tt").style.display = "none";
				}
				function dv(){
					if(document.getElementById("dv").style.display == "none")
						document.getElementById("dv").style.display = "block";
					else
						document.getElementById("dv").style.display = "none";
				}
				function tt(){
					if(document.getElementById("tt").style.display == "none")
						document.getElementById("tt").style.display = "block";
					else
						document.getElementById("tt").style.display = "none";
				}
				jQuery(document).ready(function($) {
					$('#menu ul li a').removeClass('selected');
					$('#menu ul li:nth-child(5) a').addClass('selected').removeAttr('href').css({
						cursor: 'pointer'
					});
						/* Act on the event */
						$('#left-menu ul li a').removeClass('left_select');
						$('#left-menu ul li:nth-child(2) a').addClass('left_select');
				
				});
				jQuery(document).ready(function($) {
                  	$('#dv ul li:nth-child(2) a').hide();
                  	$('#dv ul li:nth-child(3) a').hide();
                  	$('#dv ul li:nth-child(4) a').hide();
                  });
			</script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
	<body onLoad="kt()">
		<?php $this->load->view('layout/header.php'); ?>
		<article>
			<div id="left-menu">
                <!--"<?php echo base_url();?>index.php/donvi"*-->
				<ul>
					<li><a href="#" onClick="dv()">Đơn Vị</a>
                    	<div id="dv" style="margin-left:20px">
                        	<ul>								
								<?php
									$url = base_url();
									echo '<li><a href="'.$url.'thongke/tatca/">Tất Cả Các Đơn Vị</a></li>';
									foreach ($data_getdv as $k=>$v){
									$stt=$k+1;									
										echo '<li><a href = "'.$url.'thongke/donvi/'.$v["MA_DV"].'">'.$v["TEN_DV"].'</a></li>';	
					
									}
								?>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#" onclick="tt()">Thống kê theo</a>
						<div id="tt" style="margin-left:20px">
                			<ul>
                        		<li><a href="#">Hảng sản xuất</a></li>
                        		<li><a href="#">Tình Trạng</a></li>
                        		<li><a href="#">Đơn vị</a></li>
                        		<li><a href="#">Công suất</a></li>
							</ul>
            			</div>							
					</li>						
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