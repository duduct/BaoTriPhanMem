<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thống kê</title>
	<?php $this->load->view('layout/library.php'); ?>
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<div id="left-menu">
						<!--"<?php echo base_url();?>index.php/donvi"*-->
						<ul>
							<li><a href="#" onClick="dv()">Đơn Vị</a>
								<div id="dv" style="margin-left:20px">
									<ul>	
										<?php								 	
										$url = base_url();
										echo '<li><a href="'.$url.'thongke/tatca/">Tất cả</a></li>';
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
										echo '<li><a href="'.$url.'thongke/hangsanxuat/'.$madv.'">Hãng sản xuất</a></li>';
										echo '<li><a href="'.$url.'thongke/tinhtrang/'.$madv.'">Tình Trạng</a></li>';
										echo '<li><a href="'.$url.'thongke/congsuat/'.$madv.'">Công suất</a></li>';
										?>
									</ul>
								</div>							
							</li>						
						</ul>

					</div><!--End left-menu-->
				</div><!--End col 2-->
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<?php 
					foreach ($title as  $value) {
						echo "<h3>Thống kê máy biến áp của đơn vị <strong>".$value["TEN_DV"]."</strong></h3>";
					}
					?>							
					<?php
					echo '<a class="btn btn-success btn-xs" href="'.$url.'thongke/xuatexcel_donvi/'.$madv.'/'.$title1[2].'"><span class="glyphicon glyphicon-export"></span> Xuất file excel</a>'
					?>

					<table class='table table-hover table-striped'>
						<thead>
							<tr>
								<?php
								echo '<th>#</th>';
								echo '<th>'.$title1[1].'</th>';
								echo '<th>Số lượng</th>';
								?>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($data as $result): ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $result['TEN'] ?></td>
								<td><?php echo $result['soluong'] ?></td>				
							</tr>
						<?php endforeach ?>				
					</tbody>
				</table>	
			</div><!--End col 100-->
		</div><!--End row -->

	</div><!--End container -->
	<?php $this->load->view('layout/footer'); ?>
</body>
</html>