<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <?php $this->load->view('layout/library.php'); ?>
</head>
<body style="background-image: url(<?php echo base_url();?>template/images/background.png);">
    <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-4 col-lg-offset-4" style="background: white; box-shadow: 0 20px 100px rgba(0,0,0,.5); border-radius: 4px; padding-top: 20px;">
     <?php echo form_open('check_change_pass'); ?>
      <legend>Đổi mật khẩu</legend>
    
      <div class="form-group">
        <label for="">Tên đăng nhập</label>
        <input type="text" class='form-control' size="20" id="username" name="username" value="<?php echo $this->session->userdata('logged_in')['username'] ?>" disabled/>
        <?php echo form_error('username','<small class="text-danger help-block">','</small>'); ?>
      </div>
    <div class="form-group">
        <label for="">Mật khẩu cũ:</label>
        <input type="password" class='form-control' size="20" id="password" name="password"/>
        <?php echo form_error('password','<small class="text-danger help-block">','</small>'); ?>
    </div>
    <div class="form-group">
        <label for="">Mật khẩu mới:</label>
        <input type="password" class='form-control' name="password_new" id="password_new">
        <?php echo form_error('password_new','<small class="text-danger help-block">','</small>'); ?>
    </div>
    <div class="form-group">
        <label for="">Nhập lại mật khẩu:</label>
        <input type="password" class='form-control' name="password_config" id="password_config">
        <?php echo form_error('password_config','<small class="text-danger help-block">','</small>'); ?>
    </div>
    <div class="form-group">
        <input type="submit" class='btn btn-block btn-primary' value="Cập nhật"/>
    </div>
    <div class="form-group">
        <a href="<?php echo base_url();?>" title="" class='btn btn-link btn-block'>Trang chủ</a>
    </div>
  <?php form_close(); ?>
  </div><!--End col 4 -->
</body>
</html>