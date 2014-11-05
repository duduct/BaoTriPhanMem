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
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					<div id="left-menu">
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
										echo '<li><a href="'.$url.'thongke/tchangsanxuat">Hãng sản xuất</a></li>';
										echo '<li><a href="'.$url.'thongke/tctinhtrang">Tình Trạng</a></li>';
										echo '<li><a href="'.$url.'thongke/tccongsuat">Công suất</a></li>';
										?>
									</ul>
								</div>							
							</li>								
						</ul>

					</div><!--End left-menu-->
				</div><!--End col 2-->
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<div id="timkiem1">
						<h3>Thống kê tất cả các máy biến áp</h3>							
						<div id="result_tk4">
							<h4 class='pull-left'><?php echo $title[0];?></h4>
							<?php
								echo '<a class="btn btn-success btn-xs" style="margin: 10px" href="'.$url.'thongke/xuatexcel_tatca/'.$title[2].'"><span class="glyphicon glyphicon-export"></span> Xuất file excel</a>';
							?>
							<table class='table table-hover table-striped'>
								<thead>
									<tr>
										<?php
										echo '<th>#</th>';
										echo '<th>'.$title[1].'</th>';
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
					</div><!--End result_tk4-->					
				</div><!--End timkiem1-->
				<div id="xuat_excel">
					
				</div>
				</div><!--End col 10->>
			</div><!--End row-->
		</div><!--End container-->
		<?php $this->load->view('layout/footer'); ?>
	</body>
	</html>