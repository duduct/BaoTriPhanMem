<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Quản lý máy biến áp</title>
 <?php $this->load->view('layout/library.php'); ?>
 <script type="text/javascript">

 $(document).ready(function() {
  $('a.parent_menu').click(function() {
    $('#metro').remove();
    $('#menu ul li').removeClass('active');
    $(this).parent().addClass('active');
    $('#menu ul li a').removeClass('selected');
    $(this).addClass('selected');
    $('#menu ul li .sub_menu').css({
      display: 'none'
    });
    $('.active .sub_menu').css({
      display: 'block'
    });
    $('#menu ul li .sub_menu li:first-child a').addClass('sub_select');
  });
  $('ul.sub_menu li a').click(function(){
    $('.sub_menu li a').removeClass('sub_select');
    $(this).addClass('sub_select');
  });

});
 var code = <?php echo $this->session->userdata('logged_in')['code']; ?>;
 switch(code){
  case 3:
  jQuery(document).ready(function($) {
    $('#menu ul li:first-child').remove();
    $('#menu ul li:nth-child(4)').remove();
    $('#menu ul li:last-child').remove();
  });
  break;
}
</script>
</head>
<body>
  <div class="container">
    <h2>Công ty điện lực Cà Mau trên bước đường phát triển</h2>
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <p>Điện lực Cà Mau được thành lập ngày 01/4/1997 trên cơ sở tách ra từ Điện lực Minh Hải cũ, là Doanh nghiệp Nhà nước trực thuộc Công ty Điện lực 2 - Tập đoàn Điện lực Việt Nam.</p>
        <p>Từ ngày 14-04-2010 Điện lực Cà Mau được đổi tên thành Công ty Điện lực Cà Mau trực thuộc Tổng Công ty Điện lực Miền Nam - Tập đoàn Điện lực Việt Nam.</p>
        <p>Ngành nghề kinh doanh sản xuất chính gồm:</p>
        <ul>
         <li>Tư vấn đầu tư xây dựng, sửa chữa đường dây và trạm biến áp đến cấp điện áp 35kV : Lập dự án đầu tư, lập báo cáo nghiên cứu khả thi, lập báo cáo đầu tư, lập thiết kế kỹ thuật thi công, tổng hợp dự toán, lập hồ sơ mời thầu, đấu thầu, xét thầu.</li>
         <li>Tư vấn giám sát thi công các công trình đường dây và trạm đến cấp điện áp 110kV.</li>
         <li>Sản xuất, truyền tải, phân phối và kinh doanh điện năng.</li>
         <li>Sửa chữa, đại tu thiết bị điện đến cấp điện áp 35kV.</li>
         <li>Kinh doanh vật tư, thiết bị điện.</li>
       </ul>
       <address>
        <strong>Địa chỉ</strong><br>
        Số 22 Ngô Quyền<br>
        Phường 2, Tp Cà Mau, Tỉnh Cà Mau<br>
        <abbr title="Phone">Điện thoại:</abbr> (123) 456-7890 (0780) 3 700-705 | (0780) 3 700-706<br>
        <abbr title="Fax">Fax:</abbr> (123) (0780) 3 836-819<br>
        <abbr title="Email">Email:</abbr> dienluc.cm@pc2.vn<br>
      </address>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <a href="#" class="thumbnail">
          <img src="<?php echo base_url(); ?>template/images/dlcm.jpg" class="img-responsive" alt="">
        </a>
      </div>  
    </div>
    
  </div>
  <p id="rule"></p>
  <?php $this->load->view('layout/header.php'); ?>
  <?php $this->load->view('layout/footer'); ?>
</body>
</html>