<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tìm kiếm</title>
	<?php $this->load->view('layout/library.php'); ?>
</head>
<body>
	<?php $this->load->view('layout/header.php'); ?>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<form action="" method="POST" role="form" id='form-search'>
				<legend>Tìm kiếm</legend>
				<div class="form-group">
					<label for="">Số NO</label>
					<input type="text" class="form-control" id="sono" name='sono' placeholder="Số NO" onkeyup='search()'>
				</div>
				<div class="form-group">
					<label for="">Đơn vị</label>
					<select class="form-control" id='madv' name='madv' onchange='search()'>
						<option value='all'>--Tất cả--</option>
						<?php
						foreach ($donvis as $donvi) {
							echo "<option value='".$donvi['MA_DV']."'>".$donvi['TEN_DV']."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Trạm</label>
					<select class="form-control" id='matram' name='matram' required="required" onchange='search()'>
						<option value='all'>--Tất cả--</option>
						<?php
						foreach ($trams as $tram) {
							echo "<option value='".$tram['MATRAM']."'>".$tram['TENTRAM']."</option>";
						}							
						?>
						<option value=""></option>
					</select>
				</div>
				<div class="form-group">
					<label>Tình trạng</label>
					<select id="input" class="form-control" id='matt' name='matt' onchange='search()'>
						<option value='all'>--Tất cả--</option>
						<?php
						foreach ($tinhtrangs as $tinhtrang)
							echo "<option value='".$tinhtrang['MA_TT']."'>".$tinhtrang['TRANGTHAI']."</option>";
						
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Công suất</label>
					<input class="form-control" onkeyup='search()' id='congsuat' name='congsuat'></input>
				</div>

			</form>	
			<script type="text/javascript">
			$(function(){
				search();
			});
			function search(){
				$('#result_mba').html('<h1>Đang tải</h1>');
				$.ajax({
					type: 'get',
					url: 'timkiem/searchAjax',
					data: $('#form-search').serialize(),
					success: function(data) {
						$('#result_mba').html(data);
					},
					error: function () {
						alert("Lỗi kết nối cơ sở dữ liệu.\nHãy thử lại!")
					}
				});
			};
			</script>
		</div><!--End col 4 -->
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="result_mba">
		</div><!--End col 9-->

	</div><!--End container fluid -->

	<?php $this->load->view('layout/footer'); ?>
</body>
</html>