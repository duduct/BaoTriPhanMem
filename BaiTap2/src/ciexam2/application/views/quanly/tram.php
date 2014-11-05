<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
  <?php $this->load->view('layout/library.php'); ?>
  <script type="text/javascript">
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
  <div class="container-fluid">
    <!--Navigation to other link -->
    <ul class="nav nav-pills nav-justified" style="margin-bottom: 15px;">
      <?php
      $code = $this->session->userdata('logged_in')['code'];
      if ($code == 1 ) {
        echo "<li><a href='".base_url()."quanly/donvi'>Đơn vị</a></li>";
      }
      if ($code < 3) {
        echo "<li class='active'><a href='".base_url()."quanly/tram'>Trạm</a></li>";
        echo "<li><a href='".base_url()."quanly/hangsanxuat'>Hãng sản xuất</a></li>";
      }
      ?>
    </ul><!--End navigation-->

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <?php echo form_open('quanly/tram'); ?>
      <div id="nhap-tt">
        <legend>Thông tin cập nhật</legend>
        <div class="form-group">
          <label>Mã trạm</label>
          <input name="txtM_Tr" id="txtM_Tr" class="form-control" type="text" size="15" value="<?php echo set_value('txtM_Tr'); ?>"/>
          <?php echo form_error('txtM_Tr','<div style="text-align:center">','</div>'); ?>
        </div>
        <div class="form-group">
          <label for="">Tên trạm</label>
          <input name="txtT_Tr" id="txtT_Tr" type="text" class="form-control" size="40" value="<?php echo set_value('txtT_Tr'); ?>"/>
          <?php echo form_error('txtT_Tr','<div style="text-align:center">','</div>'); ?>
        </div>
        <div class="form-group">
          <label>Địa chi trạm</label>
          <input name="txtDC_Tr" id="txtDC_Tr" type="text" class="form-control" size="20" value="<?php echo set_value('txtDC_Tr'); ?>"/>
          <?php echo form_error('txtDC_Tr','<div style="text-align:center">','</div>'); ?>
        </div>
        <div class="form-group">
          <input class="btn btn-default" name="submit" type="submit" value="Thêm" />
          <input class="btn btn-default" name="submit" type="submit" value="Sửa" />
          <input class="btn btn-default" name="submit" type="submit" value="Xóa" id="bXoa" onclick="return xoa();"/>
          <script type="text/javascript">
          function xoa(){
            var t=confirm("Bạn có chắc chắn xóa?")
            if (t==true)
              document.getElementById('bXoa').submit();
            else return false;
          }
          </script>
          <input class="btn btn-default" name="" type="reset" value="Nhập lại"/>
        </div>
      </div><!--End nhap tt -->
      <?php form_close(); ?>
    </div><!--End col 4-->
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      <legend>Thông tin các trạm MBA</legend>
      <table id="ketqua" class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Mã trạm</th>
            <th>Tên trạm</th>
            <th>Địa chỉ trạm</th>
          </tr>
        </thead>
        <tbody>
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
       </tbody>

     </table>
   </div><!--End col 8-->
 </div><!--End container fluid -->
 <?php $this->load->view('layout/footer'); ?>
</body>
</html>