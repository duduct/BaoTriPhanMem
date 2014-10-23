<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
<script type="text/javascript" src="<?php echo base_url();?>template/javascript/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
	$("document").ready(function(){
		var kt_nhan=0;
		$("#anh2, #phhoi").click(function (evt){
			if (kt_nhan==0){
				$("#form1").css("display","block");
				kt_nhan=1;
			}
			else {
				$("#form1").css("display","none");
				kt_nhan=0;
			}
		});
	});
	function doihinh1(){
		document.getElementById('anh1').src="<?php echo base_url();?>template/images/muixanh.jpg";
	}
	function doihinh2(){
		document.getElementById('anh1').src="<?php echo base_url();?>template/images/2.jpg";
	}
	function doihinh3(){
		document.getElementById('anh2').src="<?php echo base_url();?>template/images/muido.jpg";
	}
	function doihinh4(){
		document.getElementById('anh2').src="<?php echo base_url();?>template/images/1.jpg";
	}
</script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
            $('#menu ul li a').removeClass('selected');
            $('#menu ul li:nth-child(6) a').addClass('selected').removeAttr('href').css({
              cursor: 'pointer'
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
		<?php $this->load->view('layout/header'); ?>
		<article>
			<div id="left-menu">
				

			</div><!--End left-menu-->
			<div id="content">
            	<table id="saoluu" width="550" border="0" cellspacing="1">
                  <tr>
                    <td><a href="<?php echo base_url();?>index.php/saoluu_phuchoi/backup"><img id="anh1" src="<?php echo base_url();?>template/images/2.jpg" onmouseover="doihinh1();" onmouseout="doihinh2();"/></a></td>
                    <td><a href="<?php echo base_url();?>index.php/saoluu_phuchoi/backup" id="sluu">Tạo sao lưu toàn bộ dữ liệu.</a></td>
                  </tr>
                  <tr>
                    <td><img id="anh2" src="<?php echo base_url();?>template/images/1.jpg" onmouseover="doihinh3();" onmouseout="doihinh4();"/></td>
                    <td><p id="phhoi">Khôi phục lại toàn bộ dữ liệu.</p><br/>
                        <form style="display:none;" id="form1" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/saoluu_phuchoi/restore" method="post">
                            <input name="namefile" type="file" />
                            <input type="submit" value="Phục hồi" />
                        </form>
                    </td>
                  </tr>
                </table>

			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
		<?php $this->load->view('layout/footer'); ?>
	</body>
</html>