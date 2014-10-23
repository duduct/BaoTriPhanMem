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
					document.getElementById("dv").style.display = "block";
					document.getElementById("tt").style.display = "block";
				}
				function dv1(){
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
				var code = <?php echo $this->session->userdata('logged_in')['code']; ?>;
                  	switch(code){
                  	  case 2:
                  	  	jQuery(document).ready(function($) {
                  	  		$('#dv').parent().remove();
                  	  	});
                  	  break;
                  }
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
									foreach ($data_getdv as $k=>$r){							
										echo '<li><a href = "'.$url.'thongke/donvi/'.$r["MA_DV"].'">'.$r["TEN_DV"].'</a></li>';							
									}
								?>
                            </ul>
                        </div>
                    </li>	
                    <li><a href="#" onclick="tt()">Thống kê theo</a>
						<div id="tt" style="margin-left:20px">
                			<ul>
                			<?php
                				foreach ($madv as $k=>$t){$madv = $t["MA_DV"];}
                        		echo '<li><a href="'.$url.'thongke/hangsanxuat/'.$madv.'">Hảng sản xuất</a></li>';
                        		echo '<li><a href="'.$url.'thongke/tinhtrang/'.$madv.'">Tình Trạng</a></li>';
                        		echo '<li><a href="'.$url.'thongke/donvi/'.$madv.'">Đơn vị</a></li>';
                        		echo '<li><a href="'.$url.'thongke/congsuat/'.$madv.'">Công suất</a></li>';
                        	?>
							</ul>
            			</div>							
					</li>						
				</ul>

			</div><!--End left-menu-->
			<div id="content">
				<div id="timkiem1">
					<?php 
						foreach ($title as  $value) {
							echo "<h3 style='padding:10px 0px 0px 20px; font-size: 20px;'>Thống kê Các MBA Của Đơn Vị ".$value["TEN_DV"]."</h4>";
						}
					 ?>							
				     		<div id="result_tk4">
				     		<h3><?php echo $title1[0];?></h3>
							<table>
								<tr>
									<?php
									echo '<th style="text-align: center;padding: 5px;">STT</th>';
									echo '<th style="text-align: center;padding: 5px;">'.$title1[1].'</th>';
									echo '<th style="text-align: center;padding: 5px;">Số lượng</th>';
									?>
								</tr>
								<?php $i = 1; ?>
								<?php foreach ($data as $result): ?>
									<tr>
									<td style="text-align: center;padding: 5px;" class="tk_stt"><?php echo $i++; ?></td>
									<td style="text-align: center;padding: 5px;"><?php echo $result['TEN'] ?></td>
									<td class="tk_ten"><?php echo $result['soluong'] ?></td>				
									</tr>
								<?php endforeach ?>				
							</table>	
					</div><!--End result_tk4-->					
				</div><!--End timkiem1-->				
				<div id="xuat_excel">
					<?php
						echo '<a href="'.$url.'thongke/xuatexcel_donvi/'.$madv.'/'.$title1[2].'">Xuất file excel</a>'
					?>
				</div>
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
		<?php $this->load->view('layout/footer'); ?>
	</body>
</html>