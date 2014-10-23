<script type="text/javascript">
  $("document").ready(function(){
    $("#bangketqua tr:odd").css("background","#FFFFFF");
    });
  $("document").ready(function(){
    $("#bangketqua tr:not(#bangketqua tr:eq(0))").click(function (evt){
      Dien($(this).html());
    });
  });
  function Dien(str){
    var bo=chuoigt(str);
    var result=['','','','','','','','','','','','','','','','','','',''];
    for (var i=0;i<19;i++){
      if (bo=="") {
        bo='<td></td>';
      }
      str=str.substring(str.indexOf(bo)+bo.length, str.length);
      bo=chuoigt(str);
      result[i]=bo;
    }
	
    document.getElementById("sono").value=result[0];
    document.getElementById("tenmba").value=result[4];
    document.getElementById("msts").value=result[5];
    document.getElementById("namsx").value=result[6];
    document.getElementById("congsuat").value=result[7];
    document.getElementById("dienap").value=result[8];
    document.getElementById("thongsodo").value=result[10];
    document.getElementById("loaidau").value=result[9];
    document.getElementById("quocgiasx").value=result[11];
    document.getElementById("namnv").value=result[12];
    document.getElementById("chieudai").value=result[13];
    document.getElementById("chieurong").value=result[14];
    document.getElementById("chieucao").value=result[15];
    document.getElementById("tlruotmay").value=result[16];
    document.getElementById("tldau").value=result[17];
    document.getElementById("tongtl").value=result[18];
    <?php
			$chuoi="var thaythe=[";
			foreach ($tendv as $k1=>$v1){
				$chuoi.="'".$v1['TEN_DV']."','".$v1['MA_DV']."',";
			}
			$chuoi.="];";
			echo $chuoi;
		?>
		var j=0;
		while (result[1]!=thaythe[j]) j++;
		var i=0;
		while (document.getElementById('madv').options[i].value!=thaythe[j+1]){
			i++;
		}
    document.getElementById('madv').options[i].selected=true;
	 <?php
			$tendv="var dvten=[";
			foreach ($tenhsx as $k1=>$v1){
				$tendv.="'".$v1['TEN_HSX']."','".$v1['MA_HSX']."',";
			}
			$tendv.="];";
			echo $tendv;
		?>
		j=0;
		while (result[2]!=dvten[j]) j++;
		i=0;
		while (document.getElementById('tenhsx').options[i].value!=dvten[j+1]){
			i++;
		}
    document.getElementById('tenhsx').options[i].selected=true;
 <?php
			$mbaloai="var mamba=[";
			foreach ($tenloaimba as $k1=>$v1){
				$mbaloai.="'".$v1['TENLOAI_MBA']."','".$v1['MA_LOAI']."',";
			}
			$mbaloai.="];";
			echo $mbaloai;
		?>
		j=0;
		while (result[3]!= mamba[j]) j++;
		i=0;
		while (document.getElementById('loaimay').options[i].value!=mamba[j+1]){
			i++;
		}
    document.getElementById('loaimay').options[i].selected=true;
  }
  function chuoigt(str){
    var t1=str.indexOf("<td>");
    var t2=str.indexOf("<",t1+4);
    return str.substring(t1+4,t2);
  }
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
<div id="content" >
        <?php echo form_open('capnhat/capnhatmba');?>
                  
                    <div id="menu1">
                    <ul>
                      <li><input class="select" type="submit" name="them" value="Thêm" onclick="return kiemtra();"></li>
                      <li><input class="select" type="submit" id="bXoa" name="xoa" value="Xóa" onclick="return xoa_mba();"></li>
                      <li><input class="select" type="submit" name="capnhat" value="Sửa"></li>
                      <li><input class="select" type="reset" name="huy" value="Hủy"></li>
                    </ul>
                    </div>
                     <legend><h3> Thông tin cập nhật</h3></legend>
                     <div id="left-menu1" class="content_capnhat">
                       <table border="0" cellspacing="10">
                        <tr><td width="92"><p class="level">Số no</p></td><td width="133"><input type="text" id="sono" name="sono" 
                        value="<?php echo set_value('sono'); ?>"/></td></tr>
                        <tr><td><p class="level">Đơn vị</p></td><td>  <select name="madv" id="madv">
                        <?php
                        $code = $this->session->userdata('logged_in')['code'];
                   $ma_dv = $this->session->userdata('logged_in')['ma_dv'];
                   switch ($code) {
                     case 1:
                      foreach ($madv as $k=>$v){
                        echo "<option value=$v->MA_DV>$v->MA_DV</option>";            
                        }
                       break;
                      case '2':
                        echo "<option value=$ma_dv>$ma_dv</option>";
                        break;
                     case 3:
                       echo "<option value=$ma_dv>$ma_dv</option>";
                      ?>
                        <script type="text/javascript">
                          jQuery(document).ready(function($) {
                            $('#fieldset1').remove();
                          });
                        </script>
                      <?php
                       break;
                   }          

            
                 ?></select></td></tr>
                        <tr><td><p class="level">Loại MBA</p></td><td> 
             <select name="loaimay" id="loaimay">
                        <?php
              foreach ($loaimba as $k=>$v){
                echo "<option value=$v->MA_LOAI>$v->TENLOAI_MBA</option>";            }
            
                 ?></select></td></tr>
                        <tr><td><p class="level">Tên HSX</p></td><td> <select name="tenhsx" id="tenhsx">
                        <?php
                  foreach ($nsx as $k=>$v){
                echo "<option value=$v->MA_HSX>$v->TEN_HSX</option>";           }
            
                 ?></select></td></tr>
                        <tr><td><p class="level">Mã số tài sản</p></td><td><input type="text" name="msts" id="msts"></td></tr>
                        <tr><td><p class="level">Năm sản suất</p></td><td><input name="namsx" type="text" size="15" id="namsx">
                        </td></tr>
                        <tr><td><p class="level">Năm nhập về</p></td><td><input name="namnv" type="text" size="15" id="namnv">
                        </td></tr>
                        </table>
                     </div>
                     <div id="left-menu1" class="content_capnhat">
                      <table width="358" border="0" cellspacing="10">
                        <tr><td width="92"><p class="level">Tên MBA</p></td><td width="214"><input type="text" name="tenmba"
                         id="tenmba">
                        </td></tr>
                        <tr><td><p class="level">Công suất (W)</p></td><td><input name="congsuat" type="text" size="15" id="congsuat">
                        </td></tr>
                        <tr><td><p class="level">Điện áp (Kv)</p></td><td><input name="dienap" type="text" size="15" id="dienap">
                        </td></tr>
                        <tr><td><p class="level">Thông số đo</p></td><td><input type="text" name="thongsodo" id="thongsodo">
                        </td></tr>
                        <tr><td><p class="level">Loại dầu</p></td><td><input name="loaidau" type="text" size="8" id="loaidau">
                          <select name="sl_dau" id="sl_dau" onchange="return change_Dau()">
                                  <option>----</option>
                                  <option><p>Castrol</p></option>
                                  <option><p>SUPER-T</p></option>
                                  <option><p>DIALA-AX</p></option>
                                  <option><p>NYNAS</p></option>
                                  <option><p>DIALA-A</p></option>
                                  <option><p>APBLUBE</p></option>
                            </select>
                        </td></tr>
                        <tr><td><p class="level">Quốc gia sản xuất</p></td><td><input name="quocgiasx" type="text" size="8" id="quocgiasx">
                                  <select name="sl_qg" id="sl_qg" onchange="return change_QG()">  <option>----</option>
                                        <option><p>Việt Nam</p></option> 
                                        <option><p>Thái Lan</p></option>
                                            <option><p>Pháp</p></option>
                                            <option><p>Ý</p></option>
                                            <option><p>Nhật Bản</p></option>
                                            <option><p>Trung Quốc</p></option>
                          </select></td></tr>
                        </table>
                     </div>
                     <div id="left-menu1" class="content_capnhat">
                      <table border="0" cellspacing="10">
                        <tr><td><p class="level">Chiều dài (mm)</p></td><td><input name="chieudai" type="text" size="15" id="chieudai">
                        </td></tr>
                        <tr><td><p class="level">Chiều rộng (mm)</p></td><td><input name="chieurong" type="text" size="15" id="chieurong">
                        </td></tr>
                        <tr><td><p class="level">Chiều cao (mm)</p></td><td><input name="chieucao" type="text" size="15" id="chieucao">
                        </td></tr>
                        <tr><td><p class="level">Trọng lượng ruột máy (kg)</p></td><td><input name="tlruotmay" type="text" size="15"
                         id="tlruotmay">
                        </td></tr>
                        <tr><td><p class="level">Trọng lượng dầu (kg)</p></td><td><input name="tldau" type="text" size="15" id="tldau">
                        </td></tr>
                        <tr><td><p class="level">Tổng trọng lượng (kg)</p></td><td><input name="tongtl" type="text" size="15" id="tongtl">
                        </td></tr>
                        </table>
                     </div>
                   <?php echo form_close(); ?>
                   <div id="upfile">
                   
                   <?php echo form_open_multipart('capnhat/upfile1');?> 
                      <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
               <p class="level">  File XML :</p>
                      <input type="file" name="file" />
                      <input type="submit" name="load" value="Upload file Excel" />
                        <?php echo form_close(); ?>           
            </div>
                    <div id="cndv">
                    <?php echo form_open('capnhat/capnhatmba');?>
                      <p class="level"> Xem MBA của Đơn vị &nbsp;&nbsp;&nbsp;
                      <select name="madv1">
                           <?php
                           $code = $this->session->userdata('logged_in')['code'];
                           $ma_dv = $this->session->userdata('logged_in')['ma_dv'];
                           switch ($code) {
                             case 1:
                              foreach ($madv as $k=>$v){
                                echo "<option value=$v->MA_DV>$v->TEN_DV</option>";            
                                }
                               break;
                              case '2':
                                echo "<option value=$ma_dv>$ma_dv</option>";
                                break;
                             case 3:
                               foreach ($madv as $k=>$v){
                                echo "<option value=$v->MA_DV>$v->MA_DV</option>";            
                                }
                              ?>
                                <script type="text/javascript">
                                  jQuery(document).ready(function($) {
                                    $('#fieldset1').remove();
                                  });
                                </script>
                              <?php
                               break;
                           }            
                          ?>
                          <?php echo set_value('madv1'); ?>
                     </select>&nbsp;
                      <input style="padding: 1px 10px 2px 10px; margin-top: 5px;" name="dv1" type="submit" value="Xem" /> 
                      </p>
            <?php echo form_close(); ?>
                    </div>
                         <div class="clear">
                         <br />
                             <?php echo form_error('sono','<div style="text-align:center">','</div>'); ?>  
                           <?php echo form_error('msts','<div style="text-align:center">','</div>'); ?> 
                           <?php echo form_error('namsx','<div style="text-align:center">','</div>'); ?> 
                           <?php echo form_error('namnv','<div style="text-align:center">','</div>'); ?> 
                   <?php echo form_error('tenmba','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('congsuat','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('dienap','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('thongsodo','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('loaidau','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('quocgiasx','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('chieudai','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('chieurong','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('chieucao','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('tlruotmay','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('tldau','<div style="text-align:center">','</div>'); ?>
                           <?php echo form_error('tongtl','<div style="text-align:center">','</div>'); ?>
                      </div>  
                      <div id="thanhtruot">             
                          <table id="bangketqua">
                        <tr bgcolor="#CCCCCC">
                          <td>Số TT</td>
                          <td>Số No</td>
                          <td>Đơn Vị</td>
                          <td>Nhà Sản Xuất</td>
                          <td>Loại MBA</td>
                          <td>Tên MBA
                          </td><td>MSTT</td>
                          <td>Năm SX</td>
                          <td>CôngSuất</td>
                          <td>Điện Áp</td>
                          <td>Loại Dầu</td>
                          <td>Thông Số Đo</td>
                          <td>Quốc Gia SX</td>
                          <td>Năm Nhập Về</td>
                          <td>Chiều Dài</td>
                          <td>Chiều Rộng</td>
                          <td>Chiều Cao</td>
                          <td>Trọng Lượng Ruột MBA</td>
                          <td>Trọng Lượng Dầu</td>
                          <td>Tổng Trọng Lượng</td>
                        </tr>
                            <?php
                      if (isset($_POST['dv1']))
                               {

                       foreach ($mba as $k=>$v){
                        $stt=$k+1;
                         echo"<tr bgcolor='#F0EEEE'>";
                          echo "<TD>".$stt."</TD>";
                            echo "<TD>".$v["SONO"]."</TD>";
                            echo "<TD>".$v["TEN_DV"]."</TD>";
                          echo "<TD>".$v["TEN_HSX"]."</TD>";
                          echo "<TD>".$v["TENLOAI_MBA"]."</TD>";
                          echo "<TD>".$v["TEN_MBA"]."</TD>";
                          echo "<TD>".$v["MSTS"]."</TD>";
                          echo "<TD>".$v["NAM_SX"]."</TD>";
                          echo "<TD>".$v["CONGSUAT"]."</TD>";
                          echo "<TD>".$v["DIENAP"]."</TD>";
                          echo "<TD>".$v["LOAIDAU"]."</TD>";
                          echo "<TD>".$v["THONGSODO"]."</TD>";
                          echo "<TD>".$v["QUOCGIA_SX"]."</TD>"; 
                          echo "<TD>".$v["NAMNHAPVE"]."</TD>";
                          echo "<TD>".$v["CHIEUDAI"]."</TD>";
                          echo "<TD>".$v["CHIEURONG"]."</TD>";
                          echo "<TD>".$v["CHIEUCAO"]."</TD>";
                          echo "<TD>".$v["TRONGLUONGRUOTMAY"]."</TD>";
                          echo "<TD>".$v["TRONGLUONGDAU"]."</TD>";
                          echo "<TD>".$v["TONGTRONGLUONG"]."</TD>";
                        echo "</tr>";
                        }
                               }
                    ?>
                            </table> 
                    </div><!--End thanh truoct-->
      </div><!--End content-->