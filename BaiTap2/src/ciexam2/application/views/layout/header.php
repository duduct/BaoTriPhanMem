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
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>template/images/logo.png" alt="Công ty điện lực Cà Mau" style="height: 40px; witdh: auto; margin: -10px;"></a>
			<a class="navbar-brand" href="<?php echo base_url();?>">Công Ty Điện Lực Cà Mau</a>
		</div><!--End brand-->
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php
      		$code = $this->session->userdata('logged_in')['code'];
			echo "<ul class='nav navbar-nav'>";
				echo "<li class='dropdown'>";
					if ($code < 3){
					echo '<a href="" class="dropdown-toggle" data-toggle="dropdown">Quản lý <span class="caret"></span></a>';
					echo '<ul class="dropdown-menu" role="menu">';
						
      					if($code == 1){
      						echo "<li><a href='".base_url()."quanly/donvi'>Đơn vị</a></li>";
      					}
						if($code < 3){
							echo "<li><a href='".base_url()."quanly/tram'>Trạm</a></li>";
							echo "<li><a href='".base_url()."quanly/hangsanxuat'>Hãng sản xuất</a></li>";
						}
						
					echo "</ul>";
					}
				echo "</li>";
				echo '<li class="dropdown">';
					echo '<a href="" class="dropdown-toggle" data-toggle="dropdown">Cập nhật  <span class="caret"></span></a>';
					echo '<ul class="dropdown-menu" role="menu">';
						echo '<li><a href="'.base_url().'capnhat/capnhatmba">Máy biến áp</a></li>';
						if($code < 3){
						echo '<li><a href="'.base_url().'capnhat/tinhtrang">Tình trạng máy biến áp</a></li>';
						}
					echo '</ul>';
				echo '</li>';
				echo '<li><a href="'.base_url().'timkiem" >Tìm kiếm</a></li>';
				if($code < 3){
				echo '<li><a href="'.base_url().'baocao/tatca" >Báo cáo</a></li>';
				echo '<li><a href="'.base_url().'thongke/tatca" >Thống kê</a></li>';
				echo '<li><a href="'.base_url().'saoluu_phuchoi" >Sao lưu</a></li>';
				}
			echo '</ul>';
			?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('logged_in')['name'];?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo base_url(); ?>change_pass">Đổi mật khẩu</a></li>
						<li><a href="<?php echo base_url(); ?>home/logout">Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
		</div><!--End toggle-->
		
	</nav>
</header>