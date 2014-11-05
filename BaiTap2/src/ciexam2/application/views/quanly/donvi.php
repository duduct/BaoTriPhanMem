<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản lý đơn vị</title>
  <?php $this->load->view('layout/library.php'); ?>
  <!-- Load quan ly don vi Jquery -->
  <script type="text/javascript" src="<?php echo base_url();?>template/javascript/qlmba.quanly.donvi.js"></script>
</head>

<body>
  <?php $this->load->view('layout/header'); ?>
  <div class="container-fluid">
    <!--Navigation to other link -->
    <ul class="nav nav-pills nav-justified" style="margin-bottom: 15px;">
      <?php
      $code = $this->session->userdata('logged_in')['code'];
      if ($code == 1 ) {
        echo "<li class='active'><a href='".base_url()."quanly/donvi'>Đơn vị</a></li>";
      }
      if ($code < 3) {
        echo "<li><a href='".base_url()."quanly/tram'>Trạm</a></li>";
        echo "<li><a href='".base_url()."quanly/hangsanxuat'>Hãng sản xuất</a></li>";
      }
      ?>
    </ul><!--End navigation-->
    <!-- Form xử lý -->
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <?php echo form_open('quanly/donvi'); ?>
      <legend>Thông tin đơn vị</legend>
      <div class="form-group">
        <label for="">Mã đơn vị</label>
        <input name="txtM_DV" id="txtM_DV" type="text" size="15" value="<?php echo set_value('txtM_DV'); ?>" class='form-control'/>
        <?php echo form_error('txtM_DV','<small class="text-danger help-block">','</small>'); ?>
      </div>
      <div class="form-group">
        <label for="">Tên đơn vị</label>
        <input name="txtT_DV" id="txtT_DV" type="text" size="25" value="<?php echo set_value('txtT_DV'); ?>" class='form-control'/>
        <?php echo form_error('txtT_DV','<small class="text-danger help-block">','</small>'); ?>
      </div>

      <div class="form-group">
        <label for="">Tài khoản</label>
        <input name="txtTK" id="txtTK" type="text" size="20" value="<?php echo set_value('txtTK'); ?>" class='form-control'/>
        <?php echo form_error('txtTK','<small class="text-danger help-block">','</small>'); ?>
      </div>
      <div class="form-group">
        <label for="">Mật khẩu</label>
        <input name="txtMK" id="txtMK" type="password" size="20" value="<?php echo set_value('txtMK'); ?>" class='form-control'/>
        <?php echo form_error('txtMK','<small class="text-danger help-block">','</small>'); ?>
      </div>
      <div class="form-group">
        <label for="">Quyền</label>
        <input name="txtQ" id="txtQ" type="text" size="10" value="<?php echo set_value('txtQ'); ?>" class='form-control'/>
        <?php echo form_error('txtQ','<small class="text-danger help-block">','</small>'); ?>
      </div>
      <button type="submit" name="submit" class="btn btn-default" value="Thêm">Thêm</button>
      <button type="submit" name="submit" class="btn btn-default" value="Sửa">Sửa</button>
      <button type="submit" name="submit" class="btn btn-default" id="bXoa" onclick="return xoa();" value="Xóa">Xóa</button>
      <button type="button" name="submit" class="btn btn-default" onclick="reset_tu();" value="Hủy">Làm lại</button>
      <?php form_close(); ?>
    </div> <!--End col 4-->

    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      <legend>Danh sách đơn vị</legend>
      <table id="ketqua" class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Quyền</th>
          </tr>
        </thead>
        <tbody>
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
       </tbody>
     </table>  

   </div><!--End col 8-->
 </div><!--End container -->
 <?php $this->load->view('layout/footer'); ?>
</body>
</html>