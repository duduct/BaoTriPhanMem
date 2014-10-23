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
					jQuery(document).ready(function($) {
						$('#result_tk1 tr:even').css({
							background: 'white'
						});
					});
					jQuery(document).ready(function($) {
						$('#menu ul li a').removeClass('selected');
						$('#menu ul li:nth-child(3) a').addClass('selected').removeAttr('href').css({
							cursor: 'pointer'
						});
							/* Act on the event */
							$('#left-menu ul li a').removeClass('left_select');
							$('#left-menu ul li:nth-child(4) a').addClass('left_select');
					
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
		<?php $this->load->view('layout/header.php'); ?>
		<article>
			<div id="left-menu">
				<ul>
					<li><a href="<?php echo base_url(); ?>timkiem/sono">Tìm MBA theo số no</a></li>
					<li><a href="<?php echo base_url(); ?>timkiem/donvi">Tìm MBA theo đơn vị</a></li>
					<li><a href="<?php echo base_url(); ?>timkiem/tram">Tìm MBA theo trạm</a></li>
					<li><a href="<?php echo base_url(); ?>timkiem/tinhtrang">Tìm MBA theo tình trạng</a></li>
					<li><a href="<?php echo base_url(); ?>timkiem/congsuat">Tìm MBA theo công suất</a></li>
				</ul>
			</div><!--End left-menu-->
			<div id="content">
				<div id="timkiem1">
					<span>Nội dung tìm kiếm</span>
					<div id="form_tk1">
					<?php $this->load->helper('form'); ?>
				    <?php echo validation_errors(); ?>
				    <?php echo form_open($this->uri->uri_string); ?>
				    <?php echo form_dropdown('q', $name_tram, 'default'); ?>
				    <?php echo form_submit('search', 'Tìm'); ?>
				    <?php echo form_close(); ?>
				     </div><!--End form_tk1-->
				     <div class="re">
					     <div id="menu_tk1">
					     	<ul>
					     		<li><p>STT</p></li>
					     		<li><p>Số No</p></li>
					     		<li><p>Tên MBA</p></li>
					     		<li style="width:170px; text-align:center;"><p>Tên Đơn Vị</p></li>
					     		<li style="width: 120px; text-align: center;" ><p>Tên HSX</p></li>
					     		<li><p>Mã Số Tài Sản</p></li>
					     		<li><p>Năm SX</p></li>
					     		<li><p>Năm Nhập về</p></li>
					     		<li><p >Loại Dầu</p></li>
					     		<li><p style="padding:5px;">Trong Lượng Dầu</p></li>
					     		<li><p style="padding:5px 8px;">Loại MBA</p></li>
					     		<li><p>Thông Số Đo</p></li>
					     		<li><p>Công Suất</p></li>
					     		<li><p>Điện Áp</p></li>
					     	</ul>
					     </div><!--End menu_tk1-->
					     <div id="result_tk1">
							    <?php if ( ! is_null($results)): ?>
							        <?php if ($results): ?>
							            <table>
							                	<?php $i = 1; ?>
							                    <?php foreach ($results as $result): ?>
							                    

							                    <tr>
								<td class="tk_stt"><?php echo $i++; ?></td>
								<td class="tk_sono"><?php echo $result->SONO ?></td>
								<td class="tk_ten"><?php echo $result->TEN_MBA ?></td>
								<td style="width: 170px;" class="tk_madv"><?php echo $result->TEN_DV ?></td>
								<td style="width:120px;" class="tk_mahsd"><?php echo $result->TEN_HSX ?></td>
								<td class="tk_msts"><?php echo $result->MSTS ?></td>
								<td class="tk_sono"><?php echo $result->NAM_SX ?></td>
								<td style="width: 140px; text-align:center;" ><?php echo $result->NAMNHAPVE ?></td>
								<td style="width: 95px; text-align:center;" ><?php echo $result->LOAIDAU ?></td>
								<td style="width: 135px; text-align:center;"><?php echo $result->TRONGLUONGDAU ?></td>
								<td class="tk_maloai"><?php echo $result->TENLOAI_MBA?></td>
								<td class="tk_thongsodo"><?php echo $result->THONGSODO ?></td>
								<td class="tk_congsuat"><?php echo $result->CONGSUAT ?></td>
								<td class="tk_dienap"><?php echo $result->DIENAP ?></td>					
								</tr>
							            	<?php endforeach ?>
							                </table>
							        <?php else: ?>
							        	<div id="result"><p>Không tìm thấy kết quả trong dữ liệu!</p></div>						               
							        <?php endif ?>
							    <?php endif ?>
							</div><!--End result_tk1-->
						</div>
				</div><!--End timkiem2-->
			</div><!--End content-->
			<div class="clear">

			</div><!--End clear-->
		</article>
		<?php $this->load->view('layout/footer'); ?>
	</body>
</html>