<!DOCTYPE html>
   <html>
   <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title></title>
         <link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">

         <style type="text/css">
         </style>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
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
      <p id="rule"></p>
      <?php $this->load->view('layout/header.php'); ?>
      <article>
         <?php $this->load->view('layout/left.php'); ?>
         <div id="content">
           <div id="gioithieu">
             <h2>
               công ty điện lực cà mau trên bước đường phát triển
             </h2>
             <img src="<?php echo base_url(); ?>template/images/dlcm.jpg" style="width:450px; height: 300px;" alt="">
             <p>Điện lực Cà Mau được thành lập ngày 01/4/1997 trên cơ sở tách ra từ Điện lực Minh Hải cũ, là Doanh nghiệp Nhà nước trực thuộc Công ty Điện lực 2 - Tập đoàn Điện lực Việt Nam.</p>
             <p>Từ ngày 14-04-2010 Điện lực Cà Mau được đổi tên thành Công ty Điện lực Cà Mau trực thuộc Tổng Công ty Điện lực Miền Nam - Tập đoàn Điện lực Việt Nam.</p>
             <p>-Ngành nghề kinh doanh sản xuất chính gồm:</p>
             <ul>
               <li><p>+ Tư vấn đầu tư xây dựng, sửa chữa đường dây và trạm biến áp đến cấp điện áp 35kV : Lập dự án đầu tư, lập báo cáo nghiên cứu khả thi, lập báo cáo đầu tư, lập thiết kế kỹ thuật thi công, tổng hợp dự toán, lập hồ sơ mời thầu, đấu thầu, xét thầu.</p></li>
               <li><p>+ Tư vấn giám sát thi công các công trình đường dây và trạm đến cấp điện áp 110kV.</p></li>
               <li><p>+ Sản xuất, truyền tải, phân phối và kinh doanh điện năng.</p></li>
               <li><p>+ Sửa chữa, đại tu thiết bị điện đến cấp điện áp 35kV.</p></li>
               <li><p>+ Kinh doanh vật tư, thiết bị điện.</p></li>
               <li><p>Địa chỉ: số 22 Ngô Quyền, Phường 2, Tp Cà Mau, Tỉnh Cà Mau.</p></li>
               <li><p>Số Điện thoại: 0780.3700705; 0780.3700706</p></li>
               <li><p>Fax: (0780) 3836819</p></li>
               <li><p>Email: dienluc.cm@pc2.vn</p></li>
             </ul>
           </div>
         </div>
         <div class="clear">
           
         </div>
      </article>
      <?php $this->load->view('layout/footer'); ?>
   </body>
</html>