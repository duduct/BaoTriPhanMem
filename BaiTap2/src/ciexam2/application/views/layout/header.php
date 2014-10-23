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
			<a id="link-logo" href="<?php echo base_url();?>login">
				<div id="logo">

				</div><!--End logo-->
			</a>
			<div id="right-header">
				<div id="name-cty">
					<h3>Công Ty Điện Lực Cà Mau</h3>
				</div><!--End name-cty-->
				<div id="name-user">
					<p>Chào:
					 <?php 
					echo $this->session->userdata('logged_in')['name'];
					?>
				</p>
				</div><!--End name-user-->
				<div id="logout">
					<a href="<?php echo base_url(); ?>home/logout">Thoát</a>
				</div>
				<div id="change_pass">
					<a href="<?php echo base_url(); ?>change_pass">Đổi mật khẩu</a>
				</div>
			</div><!--End right-header-->
			<div class="clear">
			</div>
			<div id="menu">
				<ul>
					<li><a href="<?php echo base_url();?>quanly/donvi" class="select parent_menu">quản lý</a></li>
					<li><a href="<?php echo base_url(); ?>capnhat/capnhatmba" class="select parent_menu">cập nhật</a></li>
					<li><a href="<?php echo base_url(); ?>timkiem/sono" class="select parent_menu">tìm kiếm</a></li>
					<li><a href="<?php echo base_url(); ?>baocao" class="select parent_menu">báo cáo</a></li>
					<li><a href="<?php echo base_url(); ?>thongke" class="select parent_menu">thống kê</a></li>
					<li><a href="<?php echo base_url(); ?>saoluu_phuchoi" class="select parent_menu">sao lưu</a></li>
				</ul>
			</div><!--End menu-->
		</header>