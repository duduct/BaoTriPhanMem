<header>
	<script type="text/javascript">
	var code = <?php echo $this->session->userdata('logged_in')['code']; ?>;
	var madv = '<?php echo $this->session->userdata('logged_in')['ma_dv']; ?>';
	var name_dv = '<?php echo $this->session->userdata('logged_in')['name']; ?>';
	switch(code){
		case 2:
		jQuery(document).ready(function($) {
			$('#dv ul li.child_li').remove();
			$('#dv ul li:first-child').after('<li><a href="http://localhost/ciexam2/thongke/donvi/'+madv+'">'+name_dv+'</a></li>');
			$('#menu ul li:first-child a').attr('href', '<?php echo base_url();?>quanly/tram');
			$('#menu ul li:nth-child(4) a').attr('href', '<?php echo base_url();?>baocao/donvi/'+madv);
			$('#menu ul li:nth-child(5) a').attr('href', '<?php echo base_url();?>thongke/donvi/'+madv);
			$('#dv1 ul li.child_li').remove();
			$('#dv1 ul li:first-child').after('<li><a href="http://localhost/ciexam2/baocao/donvi/'+madv+'">'+name_dv+'</a></li>');
			$('#menu ul li:first-child a').attr('href', '<?php echo base_url();?>quanly/tram');
			$('#menu ul li:last-child').remove();
		});
		break;
		case 3:
		jQuery(document).ready(function($) {
			$('#menu ul li:nth-child(4)').remove();
			$('#menu ul li:last-child').remove();
			$('.content_capnhat').remove();
			$('#upfile').remove();

		});
		break;
	}
	</script>
	<!--Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<a class="navbar-brand" href="<?php echo base_url();?>login"><img src="<?php echo base_url();?>template/images/logo.png" alt="Công ty điện lực Cà Mau" style="height: 40px; witdh: auto; margin: -10px;"></a>
		<a class="navbar-brand" href="javascript:void(0)">Công Ty Điện Lực Cà Mau</a>
		<ul class="nav navbar-nav">
			<li class='dropdown'>
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Quản lý <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo base_url(); ?>quanly/donvi">Đơn vị</a></li>
					<li><a href="<?php echo base_url(); ?>quanly/tram">Trạm</a></li>
					<li><a href="<?php echo base_url(); ?>quanly/hangsanxuat">Hãng sản xuất</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Cập nhật  <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo base_url(); ?>capnhat/capnhatmba">Máy biến áp</a></li>
					<li><a href="<?php echo base_url(); ?>capnhat/tinhtrang">Tình trạng máy biến áp</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>timkiem" >Tìm kiếm</a></li>
			<li><a href="<?php echo base_url(); ?>baocao" >Báo cáo</a></li>
			<li><a href="<?php echo base_url(); ?>thongke" >Thống kê</a></li>
			<li><a href="<?php echo base_url(); ?>saoluu_phuchoi" >Sao lưu</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('logged_in')['name'];?> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo base_url(); ?>change_pass">Đổi mật khẩu</a></li>
					<li><a href="<?php echo base_url(); ?>home/logout">Đăng xuất</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</header>