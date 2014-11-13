<script type="text/javascript">
$(function(){
  loadDanhSachMBA();
});

function loadDanhSachMBA(){
  var maDv = $('#maDonViCanXem').val();
  $('#bangketqua tbody').html("<tr><td colspan='20'>Đang tải...</td></tr>");
  $.ajax({
    type: 'get',
    url: 'capnhatmbaAjax',
    data: 'madv=' + maDv,
    success: function(data){
      $('#bangketqua tbody').html(data).fadeIn();
      $("#bangketqua tr:not(#bangketqua tr:eq(0))").click(function (evt){
        Dien($(this).html());
      });
    },
    error: function(){
      alert("Lỗi kết nối cơ sở dữ liệu. Hãy thử lại!");
    }
  });
}
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

  $("#madv option").filter(function() {
    return $(this).text() == result[1]; 
  }).attr('selected', true);
  
  $("#loaimay option").filter(function() {
    return $(this).text() == result[3]; 
  }).attr('selected', true);

  $("#tenhsx option").filter(function() {
    return $(this).text() == result[2]; 
  }).attr('selected', true);
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
<div class="container-fluid">
  <?php echo form_open('capnhat/capnhatmba', array('class' => 'form-horizontal'));?>
  <legend>Thông tin cập nhật</legend>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Số NO</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input type="text" id="sono" name="sono" class="form-control" value="<?php echo set_value('sono'); ?>"/>
        <?php echo form_error('sono','<small class="text-danger help-block">','</small>'); ?>  
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Đơn vị</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="madv" id="madv" class="form-control">
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
          echo "<option value=$ma_dv>$ten_dv</option>";
          break;
          case 3:
          echo "<option value=$ma_dv>$ten_dv</option>";
          ?>
          <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('#fieldset1').remove();
          });
          </script>
          <?php
          break;
        }
        ?></select>
      </div>
    </div><!--End form group-->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Loại MBA</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="loaimay" id="loaimay" class="form-control">
          <?php
          foreach ($loaimba as $k=>$v){
            echo "<option value=$v->MA_LOAI>$v->TENLOAI_MBA</option>";
          }
          ?>
        </select>
      </div>
    </div><!--End form group-->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Tên HSX</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="tenhsx" id="tenhsx" class="form-control">
          <?php
          foreach ($nsx as $k=>$v){
            echo "<option value=$v->MA_HSX>$v->TEN_HSX</option>";
          }
          ?>
        </select>
      </div>
    </div><!--End form group-->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Mã số tài sản</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input type="text" name="msts" id="msts" class="form-control" value="<?php echo set_value('msts'); ?>">
        <?php echo form_error('msts','<small class="text-danger help-block">','</small>'); ?> 
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Năm sản suất</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input type="number" name="namsx" type="text" size="15" id="namsx" class="form-control" min="1800" value="<?php echo set_value('namsx'); ?>">
        <?php echo form_error('namsx','<small class="text-danger help-block">','</small>'); ?> 
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Năm nhập về</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input type="number" name="namnv" type="text" size="15" id="namnv" class="form-control" min="1900" value="<?php echo set_value('namnv'); ?>">
        <?php echo form_error('namnv','<small class="text-danger help-block">','</small>'); ?> 
      </div>
    </div><!--End form group -->
  </div><!--End first col3-->

  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Tên MBA</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input type="text" name="tenmba" id="tenmba" class="form-control" value="<?php echo set_value('tenmba'); ?>">
        <?php echo form_error('tenmba','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Công suất (W)</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input name="congsuat" type="text" size="15" id="congsuat" class="form-control" value="<?php echo set_value('congsuat'); ?>">
        <?php echo form_error('congsuat','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Điện áp (Kv)</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
       <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <input name="dienap" type="text" size="15" id="dienap" class='form-control' value="<?php echo set_value('dienap'); ?>">
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <select name="sl_dienap" id="sl_dienap" onchange="return change_DienAp()" class='form-control'>
                  <option>----</option>
                  <option><p>8.66/0.22</p></option>
                  <option><p>12.7/0.23</p></option>
                  <option><p>15/0.4</p></option>
                  <option><p>22/04</p></option>
                  <option><p>12.7-11.5/0.23</p></option>
                  <option><p>12.7-8.6/0.23</p></option>
                  <option><p>12.7-11.5-8.66/0.23</p></option>
            </select>

          </div>  
        </div>
        <?php echo form_error('dienap','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Thông số đo</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input type="text" name="thongsodo" id="thongsodo" class='form-control' value="<?php echo set_value('thongsodo'); ?>">
        <?php echo form_error('thongsodo','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Loại dầu</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <input name="loaidau" type="text" size="8" id="loaidau" class='form-control' value="<?php echo set_value('loaidau'); ?>">
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <select name="sl_dau" id="sl_dau" onchange="return change_Dau()" class='form-control'>
              <option>----</option>
              <option><p>Castrol</p></option>
              <option><p>SUPER-T</p></option>
              <option><p>DIALA-AX</p></option>
              <option><p>NYNAS</p></option>
              <option><p>DIALA-A</p></option>
              <option><p>APBLUBE</p></option>
            </select>

          </div>  
        </div>
        <?php echo form_error('loaidau','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Quốc gia sản xuất</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <input name="quocgiasx" type="text" size="8" id="quocgiasx" class='form-control' value="<?php echo set_value('quocgiasx'); ?>">
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <select name="sl_qg" id="sl_qg" onchange="return change_QG()" class='form-control'>
              <option>----</option>
              <option><p>Việt Nam</p></option> 
              <option><p>Thái Lan</p></option>
              <option><p>Pháp</p></option>
              <option><p>Ý</p></option>
              <option><p>Nhật Bản</p></option>
              <option><p>Trung Quốc</p></option>
            </select>
          </div>  
        </div>
      </div>
      <?php echo form_error('quocgiasx','<small class="text-danger help-block">','</small>'); ?>
    </div><!--End form group -->
  </div><!--End firsl col 4 -->
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group">
      <label class="col-xs-12 col-sm-5 control-label">Chiều dài (mm)</label>
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
        <input name="chieudai" type="text" size="15" id="chieudai" class="form-control" value="<?php echo set_value('chieudai'); ?>">
        <?php echo form_error('chieudai','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-5 control-label">Chiều rộng (mm)</label>
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
        <input name="chieurong" type="text" size="15" id="chieurong" class="form-control" value="<?php echo set_value('chieurong'); ?>">
        <?php echo form_error('chieurong','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-5 control-label">Chiều cao (mm)</label>
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
        <input name="chieucao" type="text" size="15" id="chieucao" class="form-control" value="<?php echo set_value('chieucao'); ?>">
        <?php echo form_error('chieucao','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-5 control-label">Trọng lượng ruột máy (kg)</label>
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
        <input name="tlruotmay" type="text" size="15" id="tlruotmay" class="form-control" value="<?php echo set_value('tlruotmay'); ?>">
        <?php echo form_error('tlruotmay','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-5 control-label">Trọng lượng dầu (kg)</label>
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
        <input name="tldau" type="text" size="15" id="tldau" class="form-control" value="<?php echo set_value('tldau'); ?>">
        <?php echo form_error('tldau','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-5 control-label">Tổng trọng lượng (kg)</label>
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
        <input name="tongtl" type="text" size="15" id="tongtl" class="form-control" value="<?php echo set_value('tongtl'); ?>">
        <?php echo form_error('tongtl','<small class="text-danger help-block">','</small>'); ?>
      </div>
    </div><!--End form group -->
    <div class="form-group pull-right" style="margin-right: 5px;">
      <input class="btn btn-default" type="submit" name="them" value="Thêm" onclick="return kiemtra();">
      <input class="btn btn-default" type="submit" id="bXoa" name="xoa" value="Xóa" onclick="return xoa_mba();">
      <input class="btn btn-default" type="submit" name="capnhat" value="Sửa">
      <input class="btn btn-default" type="reset" name="huy" value="Hủy">
    </div><!--End form group -->
    <div class="clearfix">
    </div>
  </div><!--End col4 -->
  <?php echo form_close(); ?>
  <div class="clearfix">

  </div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <?php echo form_open('capnhat/capnhatmba', array('class' => 'form-horizontal'));?>
    <div class="form-group">
      <label class='col-xs-12 col-sm-4 control-label'>Xem MBA của</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="madv1" class='form-control' onchange="loadDanhSachMBA()" id='maDonViCanXem'>
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
          echo "<option value=$ma_dv>$ten_dv</option>";
          break;
          case 3:
          foreach ($madv as $k=>$v){
            echo "<option value=$v->MA_DV>$v->ten_DV</option>";            
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

      </select>
    </div><!--End col 8-->

  </div>
  <?php echo form_close(); ?>
</div><!--End col 4 xem mba cua don vi -->
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style='text-align: right;'>
 <?php echo form_open_multipart('capnhat/upfile1', array('class' => 'form-inline'));?>
 <div class="form-group">
   <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
   <div class="form-group">
    <label for="file">File XML: </label>
    <input type="file" name="file" id='file' class='form-control'/>
    <input type="submit" name="load" value="Upload" class='btn btn-primary'/>
  </div>
</div>
<?php echo form_close(); ?>   
</div><!--End col 6 -->

<div id="thanhtruot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px;">
  <table id="bangketqua" class="table table-hover table-striped table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Số NO</th>
        <th>Đơn vị</th>
        <th>Nhà sx</th>
        <th>Loại MBA</th>
        <th>Tên MBA</th>
        <th>Ms tài sản</th>
        <th>Năm sx</th>
        <th>Công suất</th>
        <th>Điện áp</th>
        <th>Loại dầu</th>
        <th>Thông số đo</th>
        <th>Quốc gia SX</th>
        <th>Năm Nhập Về</th>
        <th>Chiều dài</th>
        <th>Chiều rộng</th>
        <th>Chiều cao</th>
        <th>Trọng lượng ruột MBA</th>
        <th>Trọng lượng dầu</th>
        <th>Tổng trọng lượng</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table> 
</div><!--End thanh truot-->
</div><!--End container -->