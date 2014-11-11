<!DOCTYPE html>
<html>
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
  <div class="container-fluid">
    <!--Navigation to other link -->
    <ul class="nav nav-pills nav-justified" style="margin-bottom: 15px;">
      <?php
      $code = $this->session->userdata('logged_in')['code'];
      if ($code == 1 ) {
        echo "<li><a href='".base_url()."quanly/donvi'>Đơn vị</a></li>";
      }
      if ($code < 3) {
        echo "<li><a href='".base_url()."quanly/tram'>Trạm</a></li>";
        echo "<li class='active'><a href='".base_url()."quanly/hangsanxuat'>Hãng sản xuất</a></li>";
      }
      ?>
    </ul><!--End navigation-->
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <?php echo form_open('quanly/hangsanxuat'); ?>
      <legend>Thông tin cập nhật</legend>
      <div id="nhap-tthsx">
        <div class="form-group">
          <label>Mã hãng sản xuất</label>
          <input name="txtM_Hsx" id="txtM_Hsx" type="text" class="form-control" size="15" value="<?php echo set_value('txtM_Hsx'); ?>"/>
          <?php echo form_error('txtM_Hsx','<small class="text-danger help-block">','</small>'); ?>
        </div>
        <div class="form-group">
          <label>Tên hãng sản xuất</label>
          <input name="txtT_Hsx" id="txtT_Hsx" type="text" class="form-control" size="15" value="<?php echo set_value('txtT_Hsx'); ?>"/>
          <?php echo form_error('txtT_Hsx','<small class="text-danger help-block">','</small>'); ?>
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
          <input class="btn btn-default" name="" type="reset" value="Hủy"/>
        </div>
        <?php form_close(); ?>
      </div> 
    </div><!--End col 4 -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      <legend>Thông tin các nhà sản xuất </legend>
      <table id="ketquahsx" class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Mã hãng sản xuất</th>
            <th>Tên hãng sản xuất</th>
          </tr>
        </thead>
        <tbody>
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
       </tbody>

     </table>  
   </div><!--End col 8 -->

 </div><!--End contianer-fluid-->
 <?php $this->load->view('layout/footer'); ?>
</body>
</html>