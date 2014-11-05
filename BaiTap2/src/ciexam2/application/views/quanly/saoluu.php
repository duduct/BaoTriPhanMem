<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php $this->load->view('layout/library.php'); ?>
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
		<div class="container" style="height: 500px;">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<a class='btn btn-success btn-lg btn-block' href="<?php echo base_url();?>index.php/saoluu_phuchoi/backup" id="sluu"><span style="display: block; font-size: 50px;" class="glyphicon glyphicon-export"></span>Tạo sao lưu toàn bộ dữ liệu.</a>
			</div><!--End col 6-->
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<form class='btn btn-danger btn-lg btn-block' enctype="multipart/form-data" action="<?php echo base_url();?>index.php/saoluu_phuchoi/restore" method="post">
							<span style="display: block; font-size: 50px;" class="glyphicon glyphicon-import"></span>
                            <input name="namefile" type="file" style="float: left;"/>
                            <input type="submit" class='btn btn-xs' style="color: red; background: white; padding: 2px 8px;" value="Khôi phục dữ liệu" style="float: left"/>
                            <div class="clearfix">
                            
                            </div>
                    </form>
			</div><!--End col 6-->
		</div><!--End container-->
		<?php $this->load->view('layout/footer'); ?>
	</body>
</html>