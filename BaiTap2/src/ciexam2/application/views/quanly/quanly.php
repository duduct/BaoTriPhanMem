<!DOCTYPE html>
	<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title></title>
			<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
			<style type="text/css">
			p{
				cursor: pointer;
			}
			.display{
				display: none;
			}
			</style>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript" src="<?php echo base_url();?>template/javascript/xulydienDV.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>template/javascript/xulydienTr.js"></script>
			<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".ketqua tr:odd").css("background","#FFFFFF");
						$('#menu ul li a').removeClass('selected');
						$('#menu ul li:nth-child(1) a').addClass('selected').removeAttr('href').css({
							cursor: 'pointer'
						});
						$('#left-menu ul li a').click(function(event) {
							/* Act on the event */
							$('#left-menu ul li a').removeClass('left_select');
							$(this).addClass('left_select');
							return false;
						});
						$('#left-menu ul li:nth-child(1) a').click(function(event) {
							/* Act on the event */
							$('#donvi').removeClass('display');
							$('#tram').addClass('display');
						});
						$('#left-menu ul li:nth-child(2) a').click(function(event) {
							/* Act on the event */
							$('#tram').removeClass('display');
							$('#donvi').addClass('display');
						});
					});
					if (window.location.pathname=="/ciexam2/index.php/quanly/them_tram") {
						jQuery(document).ready(function($) {
							$('#tram').removeClass('display');
							$('#donvi').addClass('display');
						});
					};
					
			</script>
	</head>
	<body>
		<?php $this->load->view('layout/header.php'); ?>
		<article>
			<div id="left-menu">
				<ul>
					<li><a href="" class="left_select left_bg">Don Vi</a></li>
					<li><a href="" class="left_bg">Tram</a></li>
				</ul>
			</div><!--End left-menu-->
			<div id="content">
				<div id="donvi">
						<?php echo form_open('quanly/them_donvi'); ?>
						<table id="congcu" border="0">
  				 <tr>
    				<td width="56"><input name="submit" type="submit" value="Thêm" /></td>
    				<td width="49"><input name="submit" type="submit" value="Sửa" /></td>
                    <td width="86"><input name="submit" type="submit" value="Xóa" id="bXoa" onclick="return xoa();"/></td>
                    <script type="text/javascript">
                    	function xoa(){
							var t=confirm("Bạn có chắc chắn xóa?")
							if (t==true)
								document.getElementById('bXoa').submit();
							else return false;
						}
                    </script>
                    <td width="118"><input name="" type="reset" value="Hủy" /></td>
                    <td width="45"><input name="" type="button" value="Add" /></td>
  				 </tr>
				</table>
				<div id="nhap-tt">
                <fieldset><legend>Thông tin Đơn vị điện lực</legend>
                    <table width="740">
                      <tr>
                        <td width="161">Mã đơn vị</td>
                        <td width="224">Tên đơn vị</td>
                        <td width="189">Tài khoản</td>
                        <td width="146">Mật khẩu</td>
                      </tr>
                      <tr>
                        <td><input name="txtM_DV" id="txtM_DV" type="text" size="15" value="<?php echo set_value('txtM_DV'); ?>"/></td>
                        <td><input name="txtT_DV" id="txtT_DV" type="text" size="25" value="<?php echo set_value('txtT_DV'); ?>"/></td>
                        <td><input name="txtTK" id="txtTK" type="text" size="20" value="<?php echo set_value('txtTK'); ?>"/></td>
                        <td><input name="txtMK" id="txtMK" type="password" size="20" value="<?php echo set_value('txtMK'); ?>"/></td>
                      </tr>
                    </table>
                    <div id="loi">
						<?php echo form_error('txtM_DV','<div style="text-align:center">','</div>'); ?>
                        <?php echo form_error('txtT_DV','<div style="text-align:center">','</div>'); ?>
                        <?php echo form_error('txtTK','<div style="text-align:center">','</div>'); ?>
                        <?php echo form_error('txtMK','<div style="text-align:center">','</div>'); ?>
                	</div>
				</fieldset>
                
				<?php echo form_close(); ?>
                </div>
                <div id="nhap-tt"><h3>Các đơn vị hiện có</h3></div>
                <table id="ketqua1" class="ketqua" cellspacing="1">
                  <tr>
                    <td width="35">STT</td>
                    <td width="98">Mã đơn vị</td>
                    <td width="147">Tên đơn vị</td>
                    <td width="81">Tài khoản</td>
                    <td width="118">Mật khẩu</td>
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
					  echo "</tr>";
				  }
				  ?>
                 </table>
        		</div><!--End donvi-->     
		        <div id="tram" class="display">    
		                <?php echo form_open('quanly/them_tram'); ?>
						<table id="congcu" border="0">
  				 <tr>
    				<td width="56"><input name="submit" type="submit" value="Thêm"/></td>
    				<td width="49"><input name="submit" type="submit" value="Sửa"/></td>
                    <td width="86"><input name="submit" id="bXoa" type="submit" value="Xóa" onclick="return xoa();"/></td>
                    <script type="text/javascript">
                    	function xoa(){
							var t=confirm("Bạn có chắc chắn xóa?")
							if (t==true)
								document.getElementById('bXoa').submit();
							else return false;
						}
                    </script>
                    <td width="118"><input name="" type="reset" value="Hủy" /></td>
                    <td width="45"><input name="" type="button" value="Add" /></td>
  				 </tr>
				</table>
				<div id="nhap-tt">
                <fieldset><legend>Thông tin Trạm</legend>
                  <table width="739px" border="0
                  ">
                  <tr>
                    <td width="73">Mã trạm</td>
                    <td width="156"><input name="txtM_Tr" id="txtM_Tr" type="text" size="15" value="<?php echo set_value('txtM_Tr'); ?>"/></td>
                    <td width="74">Tên trạm</td>
                    <td width="191"><input name="txtT_Tr" id="txtT_Tr" type="text" size="20" value="<?php echo set_value('txtT_Tr'); ?>"/></td>
                    <td width="95">Địa chỉ trạm</td>
                    <td width="124"><input name="txtDC_Tr" id="txtDC_Tr" type="text" size="20" value="<?php echo set_value('txtDC_Tr'); ?>"/></td>
                  </tr>
                </table>
                <div id="loi">
					<?php echo form_error('txtM_Tr','<div style="text-align:center">','</div>'); ?>
                    <?php echo form_error('txtT_Tr','<div style="text-align:center">','</div>'); ?>
                    <?php echo form_error('txtDC_Tr','<div style="text-align:center">','</div>'); ?>
                </div>
                </fieldset>
				<?php echo form_close(); ?>
                </div>
                <div id="nhap-tt"><h3>Các trạm hiện có</h3></div>
                <table id="ketqua2" class="ketqua" cellspacing="1">
                  <tr>
                    <td width="36">STT</td>
                    <td width="91">Mã trạm</td>
                    <td width="168">Tên trạm</td>
                    <td width="187">Địa chỉ trạm</td>
                  </tr>
                  <?php
				  foreach ($tram as $k=>$v){
					  $stt=$k+1;
					  echo '<tr style="cursor:pointer">';
					  echo "<td>".$stt."</td>";
					  echo "<td>".$v["MATRAM"]."</td>";
					  echo "<td>".$v["TENTRAM"]."</td>";
					  echo "<td>".$v["DIACHITRAM"]."</td>";
					  echo "</tr>";
				  };
				  ?>
                 </table>
		        </div><!--End Tram-->
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
	</body>
</html>