<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Báo cáo</title>
	<?php $this->load->view('layout/library.php'); ?>
	<script type="text/javascript">
	function kt(){
		document.getElementById("dv1").style.display = "block";
		document.getElementById("tt").style.display = "block";
	}
	function dv1(){
		if(document.getElementById("dv1").style.display == "none")
			document.getElementById("dv1").style.display = "block";
		else
			document.getElementById("dv1").style.display = "none";
	}
	function tt(){
		if(document.getElementById("tt").style.display == "none")
			document.getElementById("tt").style.display = "block";
		else
			document.getElementById("tt").style.display = "none";
	}
	jQuery(document).ready(function($) {
		$('#menu ul li a').removeClass('selected');
		$('#menu ul li:nth-child(4) a').addClass('selected').removeAttr('href').css({
			cursor: 'pointer'
		});
		/* Act on the event */
		$('#left-menu ul li a').removeClass('left_select');
		$('#left-menu ul li:nth-child(2) a').addClass('left_select');

	});
	var code = <?php echo $this->session->userdata('logged_in')['code']; ?>;
	switch(code){
		case 2:
		jQuery(document).ready(function($) {
			$('#dv1').parent().remove();
		});
		break;
		case 3:
		jQuery(document).ready(function($) {
			$('#menu ul li:first-child').remove();
			$('#menu ul li:nth-child(4)').remove();
			$('#menu ul li:last-child').remove();
		});
		break;
	}
	jQuery(document).ready(function($) {
                   	//$('#dv1 ul li:nth-child(1) a').hide();
                   	$('#dv1 ul li:nth-child(2) a').hide();
                   	$('#dv1 ul li:nth-child(3) a').hide();
                   	$('#dv1 ul li:nth-child(4) a').hide();
                   });
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
							<li><a href="#" onClick="dv1()">Đơn Vị</a>
								<div id="dv1" style="margin-left:20px">
									<ul>	
										<?php								 	
										$url = base_url();
										echo '<li><a href="'.$url.'baocao/tatca/">Tất Cả Các Đơn Vị</a></li>';
										foreach ($data_getdv as $k=>$r){							
											echo '<li class="child_li"><a href = "'.$url.'baocao/donvi/'.$r["MA_DV"].'">'.$r["TEN_DV"].'</a></li>';							
										}
										?>
									</ul>
								</div>
							</li>						
							<li><a href="#" onClick="tt()">Tình Trạng</a>
								<div id="tt"  style="margin-left:20px">
									<ul>
										<?php
										$url = base_url();
										foreach ($madv as $k=>$t){$madv = $t["MA_DV"];}
										foreach ($data_gettt as $k=>$y){
											echo '<li><a href = "'.$url.'baocao/tinhtrang/'.$madv.'/'.$y["MA_TT"].'">'.$y["TRANGTHAI"].'</a></li>';							
										}
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
						echo "<legend>Báo cáo máy biến áp của đơn vị  <strong>".$value["TEN_DV"]."</strong></legend>";
					}
					if ($title_tt==NULL)
						echo "Tình trạng: Tất cả";
					else
						foreach ($title_tt as  $v) {
							echo "Tình trạng: ".$v["TRANGTHAI"]."";
						}
						?>
						<?php
						foreach ($title_tt as $k=>$t) {
							$matt = $t["MA_TT"];
						}
						echo '<a class="btn btn-success btn-xs pull-right" href="'.$url.'baocao/xuatexcel_donvi_tt/'.$madv.'/'.$matt.'"><span class="glyphicon glyphicon-export"></span> Xuất file excel</a>'
						?>

						<table class='table table-hover table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Số NO</th>
									<th>Tên MBA</th>
									<th>Tên đơn vị</th>
									<th>Tên HSX</th>
									<th>Mã số tài sản</th>
									<th>Mã sản xuất</th>
									<th>Mã nhập về</th>
									<th>Loại dầu</th>
									<th>Trọng lương dầu</th>
									<th>Loại MBA</th>
									<th>Thông số đo</th>
									<th>Công suất</th>
									<th>Điện áp</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($data_bcdv as $result): ?>
								<tr>
									<td ><?php echo $i++; ?></td>
									<td><?php echo $result['SONO'] ?></td>
									<td><?php echo $result['TEN_MBA'] ?></td>
									<td><?php echo $result['TEN_DV'] ?></td>
									<td><?php echo $result['TEN_HSX'] ?></td>
									<td><?php echo $result['MSTS'] ?></td>
									<td><?php echo $result['NAM_SX'] ?></td>
									<td><?php echo $result['NAMNHAPVE'] ?></td>
									<td><?php echo $result['LOAIDAU'] ?></td>
									<td><?php echo $result['TRONGLUONGDAU'] ?></td>
									<td><?php echo $result['TENLOAI_MBA'] ?></td>
									<td><?php echo $result['THONGSODO'] ?></td>
									<td><?php echo $result['CONGSUAT'] ?></td>
									<td><?php echo $result['DIENAP'] ?></td>					
								</tr>
							<?php endforeach ?>	
							</tbody>
						<tr>
							<td colspan="14">Tổng Cộng: <?php echo $i-1; ?> MBA</td>
						</tr>							
					</table>
				</div><!--End col 10 -->
			</div><!--End row -->
		</div><!--End container fluid-->
		<?php $this->load->view('layout/footer'); ?>
	</body>
	</html>