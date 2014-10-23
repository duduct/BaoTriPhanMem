<script type="text/javascript"> 
	 $("document").ready(function(){
    $("#bangketqua1 tr:odd").css("background","#FFFFFF");
    });
	 $("document").ready(function(){
    $("#bangketqua2 tr:odd").css("background","#FFFFFF");
    });
	 $("document").ready(function(){
    $("#bangketqua3 tr:odd").css("background","#FFFFFF");
    });
    var code = <?php echo $this->session->userdata('logged_in')['code']; ?>;
                    switch(code){
                      case 3:
                      jQuery(document).ready(function($) {
                      $('#menu ul li:first-child').remove();
                      $('#menu ul li:nth-child(4)').remove();
                      $('#menu ul li:last-child').remove();
                      $('.left-menu2').remove();
                      $('#left-menu3').remove();
                      $('#menu1').remove();
                    });
                    break;
                  }
</script>
<div id="content"> 	
                    <?php echo form_open('capnhat/tinhtrang'); ?>
                	<div id="menu1">
                    	<div>
                            <input type="submit" name="capnhat" value="Cập Nhật">
                            <input type="reset" name="huy" value="Hủy" onclick="return khoitao()">
                    	</div>
                    </div>
                    <div>
                    <legend> Thông Tin Tình Trạng</legend>
                     <div class="left-menu2" id="left-menu2">
                   	   <table border="0" cellspacing="10">
                        <tr><td width="92"><p class="level">Số No</p></td><td width="133"> <select name="sono_sl" id="sono_sl">
                         <?php
				   		foreach ($so_no as $k1=>$v1){
								echo "<option value=$v1->SONO>$v1->SONO</option>";						}					
				  			 ?>
               			   </select></td></tr>
                        <tr><td><p class="level">Tình Trạng</p></td><td>  <select name="matt">
                         <?php
				   		foreach ($tinhtrang as $k=>$v){
								echo "<option value=$v->MA_TT>$v->TRANGTHAI</option>";						}
						
				  			 ?></select></td></tr>
                        <tr><td><p class="level">Thời Gian</p></td><td> 
						 <input name="ngayxet" type="text" size="15" readonly="readonly" value="<?php 
								$this->load->helper('date');
								$datestring = "%Y-%m-%d";
			

						echo mdate($datestring);?>">
                        </td></tr>
                        <tr><td><p class="level">Chi Tiết TT</p></td><td><input type="text" name="chitiet_tt" value=""></td></tr>
                        <tr><td><p class="level">Ghi Chú</p></td><td><input name="ghichu" type="text">
                        </td></tr>
                        </table>
                     </div>
                     <div id="left-menu3">
                     	<table width="358" border="0" cellspacing="10">
                        <tr><td colspan="2">
                        <p class="level">Quá trình sử dụng</p>
                        <input name="c1" id="c1" type="checkbox" onclick="check()">
                        </td></tr>
                        <tr><td><p class="level">Mã Trạm</p></td><td> <select name="matram" id="matram">
                         <?php
				   		foreach ($ma_tram as $k=>$v){
								echo "<option value=$v->MATRAM>$v->TENTRAM</option>";						}
						
				  			 ?></select
                        ></td></tr>
                        <tr><td><p class="level">Ngày Bắt Đầu</p></td><td><input id="ngaybd" name="ngaybd" type="date" size="15">
                        </td></tr>
                        <tr><td><p class="level">Ngày Kết Thúc</p></td><td><input name="ngaykt" id="ngaykt" type="date" size="15">
                        </td></tr></table>
                     </div>
                     <div class="left-menu2" id="left-menu2">
                     	<table border="0" cellspacing="10">
                        <tr>
                        <td colspan="2">
                        <p class="level">Đại Tu</p>
                        <input name="c2" id="c2" type="checkbox" onclick="check1()">
                        </td></tr>
                        <tr><td><p class="level">Đại Tu</p>
                        </td><td><select name="ma_dt" id="ma_dt">
                                                 <?php
				   		foreach ($daitu_mba as $k=>$v){
								echo "<option value=$v->MA_DAITU>$v->TEN_DAITU</option>";						}
						
				  			 ?>
                        </select>
                        </td></tr>
                        <tr><td><p class="level">Ghi chú</p></td><td><input name="nd_daitu" id="nd_daitu" type="text" size="25">
                        </td></tr>
                        </tr>
                        <tr><td><p class="level">Ngày Đại Tu</p></td><td><input name="ngay_dt" id="ngay_dt" type="date" size="15">
                        </td></tr>
                        </table>
                     </div>
                     <?php echo form_error('chitiet_tt','<div style="text-align:center">','</div>'); ?> 
                    </div>
                    <div id="cndv">
                      <p class="level"> Xem thông tin chi tiết MBA: &nbsp;&nbsp;&nbsp;
                       <select name="sono_s3" id="sono_s3">
                         <?php
				   		foreach ($so_no as $k1=>$v1){
								echo "<option value=$v1->SONO>$v1->SONO</option>";						}					
				  			 ?>
               			   </select>
                      <input style="padding: 1px 10px 2px 10px; margin-top: 5px;" name="chitiet_sono" id="chitiet_sono" 
                      type="submit" value="Xem"/>
                     </p>
                     <?php form_close(); ?>
                     <br />
                     </div>
                     <p class="level">&nbsp;&nbsp;&nbsp;Chi tiết tình trạng MBA :
                     <table id="bangketqua1">
          				  <tr bgcolor="#CCCCCC">
           				   <td>Số TT</td><td>Số No</td><td>Thời Gian</td><td>Tình Trạng
          				    </td><td>Chi Tiết Tình Trạng</td><td>Ghi Chú</td></tr>
          			      <?php
        			  if (isset($_POST['chitiet_sono']))
          		         {
							  foreach ($cttinhtrang as $k=>$v){
        						$stt=$k+1;
          					    echo"<tr bgcolor='#F0EEEE'>";
             				    echo "<TD>".$stt."</TD>";
               				    echo "<TD>".$v["SONO"]."</TD>";
							  echo "<TD>".$v["NGAYXET_TT"]."</TD>";
							  echo "<TD>".$v["TRANGTHAI"]."</TD>";
							  echo "<TD>".$v["CHITIETTINHTRANGTHIETBI"]."</TD>";
							  echo "<TD>".$v["GHICHU"]."</TD>";
            echo "</tr>";
            }
                   }
        ?>
                </table>
                </p>
                <p class="level">&nbsp;&nbsp;&nbsp;Quá trình sử dụng MBA :
                <table id="bangketqua2">
          				  <tr bgcolor="#CCCCCC">
           				   <td>Số TT</td><td>Số No</td><td>Tên Trạm</td><td>Ngày Bắt Đầu
          				    </td><td>Ngày Kết Thúc</td><td>Địa Chỉ Trạm</td></tr>
          			      <?php
        			  if (isset($_POST['chitiet_sono']))
          		         {
							  foreach ($ctsudung as $k=>$v){
        						$stt=$k+1;
          					    echo"<tr bgcolor='#F0EEEE'>";
             				    echo "<TD>".$stt."</TD>";
               				    echo "<TD>".$v["SONO"]."</TD>";
							  echo "<TD>".$v["TENTRAM"]."</TD>";
							  echo "<TD>".$v["NGAY_BD"]."</TD>";
							  echo "<TD>".$v["NGAY_KT"]."</TD>";
							  echo "<TD>".$v["DIACHITRAM"]."</TD>";
            echo "</tr>";
            }
                   }
        ?>
                </table></p>
                 <p class="level">&nbsp;&nbsp;&nbsp;Chi tiết Đại Tu MBA :
                 <table id="bangketqua3">
          				  <tr bgcolor="#CCCCCC">
           				   <td>Số TT</td><td>Số No</td><td>Đại Tu</td><td>Ngày</td><td>Ghi Chú
          				    </td></tr>
          			      <?php
        			  if (isset($_POST['chitiet_sono']))
          		         {
							  foreach ($ctdaitu as $k=>$v){
        						$stt=$k+1;
          					    echo"<tr bgcolor='#F0EEEE'>";
             				    echo "<TD>".$stt."</TD>";
               				    echo "<TD>".$v["SONO"]."</TD>";
							  echo "<TD>".$v["TEN_DAITU"]."</TD>";
							   echo "<TD>".$v["NGAYDAITU"]."</TD>";
							  echo "<TD>".$v["ND_DAITU"]."</TD>";
							  
            echo "</tr>";
            }
                   }
        ?>
                </table></p>
                
                </div>
               </div>         
			</div><!--End content-->