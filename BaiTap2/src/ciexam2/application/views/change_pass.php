<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/style/css.css">
</head>
<body>
  <header>
    <div id="logo">
    </div>
  </header>
  <article>
    <div id="change_pass">
      <ul>
        <?php echo form_open('check_change_pass'); ?>
        <li><p>Tên đăng nhập:</p></li>
        <li><input type="text" size="20" id="username" name="username" value="<?php echo $this->session->userdata('logged_in')['username'] ?>" /></li>
        <?php echo form_error('username'); ?>
        <li><p>Mật khẩu:</p></li>
        <li><input type="password" size="20" id="password" name="password"/></li>
        <?php echo form_error('password'); ?>
        <li><p>Mật khẩu mới:</p></li>
        <li><input type="password" name="password_new" id="password_new"></li>
        <?php echo form_error('password_new'); ?>
        <li><p>Nhập lại mật khẩu:</p></li>
        <li><input type="password" name="password_config" id="password_config"></li>
        <?php echo form_error('password_config'); ?>
        <li><input type="submit" value="Change"/></li>
        <?php form_close(); ?>
        <li><a id="home" href="http://localhost/ciexam2/" title="">Home</a></li>
      </ul>
    </div>
  </article>
  <footer>
    <div id="slogen">
      <p>Developed by kenlove</p>
    </div>
  </footer>
</body>
</html>