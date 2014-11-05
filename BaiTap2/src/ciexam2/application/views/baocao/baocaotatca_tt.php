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
		case 3:
		jQuery(document).ready(function($) {
			$('#menu ul li:first-child').remove();
			$('#menu ul li:nth-child(4)').remove();
			$('#menu ul li:last-child').remove();
		});
		break;
	}
	jQuery(document).ready(function($) {
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
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
								<div id="tt" style="margin-left:20px">
									<ul>
										<?php
										$url = base_url();
										foreach ($data_gettt as $k=>$y){
											echo '<li><a href = "'.$url.'baocao/tctinhtrang/'.$y["MA_TT"].'">'.$y["TRANGTHAI"].'</a></li>';							
										}
										?>
									</ul>
								</div>							
							</li>
						</ul>

					</div><!--End left-menu-->
				</div><!--End col 3-->
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<h3>Báo cáo Tất Cả Các Máy Biến Áp</h3>
						<?php
						if ($title_tt==NULL)
							echo "<span>Tình Trạng: Tất Cả</span>";
						else
							foreach ($title_tt as  $v) {
								echo "<span>Tình Trạng:".$v["TRANGTHAI"]."</span>";
							}
							?>
							<?php
								foreach ($title_tt as $k=>$t){$matt = $t["MA_TT"];}
									echo '<a class="btn btn-success btn-xs" style="margin: 10px" href="'.$url.'baocao/xuatexcel_tatca_tt/'.$matt.'"><span class="glyphicon glyphicon-export"></span> Xuất file excel</a>'
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
									<?php foreach ($bc_tatca as $result): ?>
										<tr>
											<td><?php echo $i++; ?></td>
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
									<tr>
										<td colspan="14">Tổng Cộng: <?php echo $i-1; ?> MBA</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div><!--End col 9-->
			</div><!--End row -->
		</div><!--End container-->
		<?php $this->load->view('layout/footer'); ?>
	</body>
	</html>