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
    <div id="form">
      <ul>
        <?php echo form_open('verifylogin'); ?>
        <li><p>Tên đăng nhập:</p></li>
        <li><input type="text" size="20" id="username" name="username"/></li>
        <?php echo form_error('username'); ?>
        <li><p>Mật khẩu:</p></li>
        <li><input type="password" size="20" id="password" name="password"/></li>
        <?php echo form_error('password'); ?>
        <li><input type="submit" value="Đăng nhập"/></li>
        <?php form_close(); ?>
      </ul>
    </div>
  </article>
  <footer>
    <div id="slogen">
      <p>Phát triển bởi Cty Điện Lực Cà Mau</p>
    </div>
  </footer>
</body>
</html>