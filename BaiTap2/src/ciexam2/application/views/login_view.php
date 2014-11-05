<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <?php $this->load->view('layout/library.php'); ?>
</head>
<body style="background-image: url(<?php echo base_url();?>template/images/background.png);">
        <?php echo form_open('verifylogin', array("class" => "col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-3 col-md-offset-4 col-lg-offset-4", "style" => "background: white; border-radius: 4px; box-shadow: 0 20px 100px rgba(0,0,0,.6); padding: 25px 20px 10px;")); ?>
        <div class="form-group">
            <input type="text" size="20" id="username" name="username" class='form-control'/>
            <?php echo form_error('username'); ?>
        </div>
        <div class="form-group">
            <input type="password" size="20" id="password" name="password" class="form-control"/>
            <?php echo form_error('password'); ?>
        </div>
        <div class="form-group">
          <input type="submit" value="Đăng nhập" class='btn btn-block btn-primary'/>
        </div>
        <?php form_close(); ?>      
</body>
</html>