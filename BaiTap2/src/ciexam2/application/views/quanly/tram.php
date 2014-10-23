<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
<script type="text/javascript" src="<?php echo base_url();?>template/javascript/jquery-2.0.3.min.js"></script>
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
              $('#left-menu ul li:nth-child(2) a').addClass('left_select');
          
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
<script type="text/javascript" src="<?php echo base_url();?>template/javascript/xulydienTr.js">
	
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
            	<?php echo form_open('quanly/tram'); ?>
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
                document.getElementById("txtM_Tr").value="";
                document.getElementById("txtT_Tr").value="";
                document.getElementById("txtDC_Tr").value="";
                return true;
              }
            </script>
        </ul>
        </div>
				<div id="nhap-tt">
                <legend><h3>Thông tin cập nhật:</h3></legend>
                  <table width="845" border="0
                  ">
                  <tr>
                    <td width="64">Mã trạm</td>
                    <td width="160"><input name="txtM_Tr" id="txtM_Tr" type="text" size="15" value="<?php echo set_value('txtM_Tr'); ?>"/></td>
                    <td width="61">Tên trạm</td>
                    <td width="306"><input name="txtT_Tr" id="txtT_Tr" type="text" size="40" value="<?php echo set_value('txtT_Tr'); ?>"/></td>
                    <td width="85">Địa chỉ trạm</td>
                    <td width="143"><input name="txtDC_Tr" id="txtDC_Tr" type="text" size="20" value="<?php echo set_value('txtDC_Tr'); ?>"/></td>
                  </tr>
                </table>
                <div id="loi">
					<?php echo form_error('txtM_Tr','<div style="text-align:center">','</div>'); ?>
                    <?php echo form_error('txtT_Tr','<div style="text-align:center">','</div>'); ?>
                    <?php echo form_error('txtDC_Tr','<div style="text-align:center">','</div>'); ?>
                </div>
				<?php form_close(); ?>
                </div>
                <div id="nhap-tt">
                 <legend><h4>Thông tin các trạm MBA</h4></legend></div>
                <table id="ketqua" cellspacing="1">
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
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
    <?php $this->load->view('layout/footer'); ?>
	</body>
</html>