<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
<script type="text/javascript" src="<?php echo base_url();?>template/javascript/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
            $('#ketquahsx tr:odd').css({
              background: '#FFFFFF'
            });
			$("#ketquahsx tr:eq(0)").css("background","#CCCCCC");
          });
	jQuery(document).ready(function($) {
            $('#menu ul li a').removeClass('selected');
            $('#menu ul li:nth-child(1) a').addClass('selected').removeAttr('href').css({
              cursor: 'pointer'
            });
              /* Act on the event */
              $('#left-menu ul li a').removeClass('left_select');
              $('#left-menu ul li:nth-child(3) a').addClass('left_select');
          
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
<script type="text/javascript" src="<?php echo base_url();?>template/javascript/xulydienHsx.js">
	
</script>
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
            	<?php echo form_open('quanly/hangsanxuat'); ?>
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
                document.getElementById("txtM_Hsx").value="";
                document.getElementById("txtT_Hsx").value="";
                return true;
              }
            </script>
        </ul>
        </div>
				<div id="nhap-tthsx">
                <legend><h3>Thông tin cập nhật:</h3></legend>
                  <table width="700" border="0
                  ">
                  <tr>
                    <td width="128">Mã hãng sản xuất</td>
                    <td width="167"><input name="txtM_Hsx" id="txtM_Hsx" type="text" size="15" value="<?php echo set_value('txtM_Hsx'); ?>"/></td>
                    <td width="136">Tên hãng sản xuất</td>
                    <td width="251"><input name="txtT_Hsx" id="txtT_Hsx" type="text" size="15" value="<?php echo set_value('txtT_Hsx'); ?>"/></td>
                  </tr>
                </table>
                <div id="loi">
					<?php echo form_error('txtM_Hsx','<div style="text-align:center">','</div>'); ?>
                    <?php echo form_error('txtT_Hsx','<div style="text-align:center">','</div>'); ?>
                </div>
                
				<?php form_close(); ?>
                </div>
                <div id="nhap-tthsx">
                  <legend> <h4>Thông tin các nhà sản xuất</h4> </legend></div>
                <table id="ketquahsx" cellspacing="1">
                  <tr>
                    <td width="36">STT</td>
                    <td width="157">Mã hãng sản xuất</td>
                    <td width="149">Tên hãng sản xuất</td>
                  </tr>
                  <?php
				  foreach ($nsx as $k=>$v){
					  $stt=$k+1;
					  echo '<tr style="cursor:pointer">';
					  echo "<td>".$stt."</td>";
					  echo "<td>".$v["MA_HSX"]."</td>";
					  echo "<td>".$v["TEN_HSX"]."</td>";
					  echo "</tr>";
				  };
				  ?>
                 </table>
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
    <?php $this->load->view('layout/footer'); ?>
	</body>
</html>