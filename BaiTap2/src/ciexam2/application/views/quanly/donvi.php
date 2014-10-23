<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$("document").ready(function(){
		$("#ketqua tr:odd").css("background","#FFFFFF");
		$("#ketqua tr:eq(0)").css("background","#CCCCCC");
		});
   jQuery(document).ready(function($) {
            $('#menu ul li a').removeClass('selected');
            $('#menu ul li:nth-child(1) a').addClass('selected').removeAttr('href').css({
              cursor: 'pointer'
            });
              /* Act on the event */
              $('#left-menu ul li a').removeClass('left_select');
              $('#left-menu ul li:nth-child(1) a').addClass('left_select');
          
          });
          var code = <?php echo $this->session->userdata('logged_in')['code']; ?>;
          switch(code){
                      case 2:
                      jQuery(document).ready(function($) {
                        $('#left-menu ul li:first-child').remove();
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
</script>
<script type="text/javascript" src="<?php echo base_url();?>template/javascript/xulydienDV.js"></script>
</head>

<body>
		<?php $this->load->view('layout/header'); ?>
		<article>
			<div id="left-menu">
				<ul>
					<li><a href="<?php echo base_url();?>quanly/donvi">Đơn vị</a></li>
					<li><a href="<?php echo base_url();?>quanly/tram">Trạm</a></li>
          <li><a href="<?php echo base_url();?>quanly/hangsanxuat">Nhà sản xuất</a></li>
				</ul>

			</div><!--End left-menu-->
			<div id="content">
            	<?php echo form_open('quanly/donvi'); ?>
				<div id="menu1">
        <ul>
          <li><input class="select" name="submit" type="submit" value="Thêm" /></li>
          <li><input class="select" name="submit" type="submit" value="Sửa" /></li>
          <li><input class="select" name="submit" type="submit" value="Xóa" id="bXoa" onclick="return xoa();"/></li>
            <script type="text/javascript">
                        function xoa(){
                var t=confirm("Bạn có chắc chắn xóa?")
                if (t==true)
                  document.getElementById('bXoa').submit();
                else return false;
              }
              </script>
          <li><input class="select" name="" type="button" value="Hủy" onclick="reset_tu();"/></li>
          <script type="text/javascript">
            function reset_tu(){
              document.getElementById("txtM_DV").value="";
              document.getElementById("txtT_DV").value="";
              document.getElementById("txtTK").value="";
              document.getElementById("txtMK").value="";
              document.getElementById("txtQ").value="";
              return true;
            }
          </script>
        </ul>
        </div>
				<div id="nhap-tt">
                <legend><h3>Thông tin cập nhật:</h3></legend>
                    <table width="845">
                      <tr>
                        <td width="150"><p class="level">Mã đơn vị</p></td>
                        <td width="211"><p class="level">Tên đơn vị</p></td>
                        <td width="182"><p class="level">Tài khoản</p></td>
                        <td width="180"><p class="level">Mật khẩu</p></td>
                        <td width="98"><p class="level">Quyền sử dụng</p></td>
                      </tr>
                      <tr>
                        <td><input name="txtM_DV" id="txtM_DV" type="text" size="15" value="<?php echo set_value('txtM_DV'); ?>"/></td>
                        <td><input name="txtT_DV" id="txtT_DV" type="text" size="25" value="<?php echo set_value('txtT_DV'); ?>"/></td>
                        <td><input name="txtTK" id="txtTK" type="text" size="20" value="<?php echo set_value('txtTK'); ?>"/></td>
                        <td><input name="txtMK" id="txtMK" type="password" size="20" value="<?php echo set_value('txtMK'); ?>"/></td>
                        <td><input name="txtQ" id="txtQ" type="text" size="10" value="<?php echo set_value('txtQ'); ?>"/></td>
                      </tr>
                    </table>
                    <div id="loi">
						<?php echo form_error('txtM_DV','<div style="text-align:center">','</div>'); ?>
                        <?php echo form_error('txtT_DV','<div style="text-align:center">','</div>'); ?>
                        <?php echo form_error('txtTK','<div style="text-align:center">','</div>'); ?>
                        <?php echo form_error('txtMK','<div style="text-align:center">','</div>'); ?>
                        <?php echo form_error('txtQ','<div style="text-align:center">','</div>'); ?>
                        <legend><h4>Thông tin các đơn vị</h4></legend>
                	</div>
                
				<?php form_close(); ?>
                </div>
                <table id="ketqua" cellspacing="1">
                  <tr bordercolor="#CCCCCC">
                    <td width="34">STT</td>
                    <td width="92">Mã đơn vị</td>
                    <td width="138">Tên đơn vị</td>
                    <td width="77">Tài khoản</td>
                    <td width="81">Mật khẩu</td>
                    <td width="76">Quyền sử dụng</td>
                  </tr>
                  <?php
				  foreach ($donvi as $k=>$v){
					  $stt=$k+1;
					  echo '<tr style="cursor:pointer">';
					  echo "<td>".$stt."</td>";
					  echo "<td>".$v["MA_DV"]."</td>";
					  echo "<td>".$v["TEN_DV"]."</td>";
					  echo "<td>".$v["TAIKHOAN"]."</td>";
					  echo "<td>".$v["MATKHAU"]."</td>";
					  echo "<td>".$v["QUYEN_SD"]."</td>";
					  echo "</tr>";
				  }
				  ?>
                 </table>
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
    <?php $this->load->view('layout/footer'); ?>
	</body>
</html>