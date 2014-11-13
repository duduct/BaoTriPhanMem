<script type="text/javascript"> 
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
<div class="container-fluid">
  <?php echo form_open('capnhat/tinhtrang', array('class' => 'form-horizontal')); ?>
  <legend> Thông tin tình trạng</legend>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
  <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Số NO</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="sono_sl" id="sono_sl" class='form-control'>
         <?php
         foreach ($so_no as $k1=>$v1){
          echo "<option value=$v1->SONO>$v1->SONO</option>";            }         
          ?>
        </select>
      </div>
    </div><!--End form group -->
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  <?php echo form_error('tinhtrang_tc','<small class="text-danger help-block">','</small>'); ?> 
   <?php echo form_error('tinhtrang_tb','<small class="text-danger help-block">','</small>'); ?> 
   <?php echo form_error('qtsd_tc','<small class="text-danger help-block">','</small>'); ?>
   <?php echo form_error('qtsd_tb','<small class="text-danger help-block">','</small>'); ?>
   <?php echo form_error('daitu_tc','<small class="text-danger help-block">','</small>'); ?>
   <?php echo form_error('daitu_tb','<small class="text-danger help-block">','</small>'); ?>
 </div>
  <div class='clearfix'></div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label"></label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="checkbox">
          <label>
            <input name="c3" id="c3" type="checkbox" onclick="check2()" checked>
            Tình trạng
          </label>
        </div>
      </div>
    </div><!--End form group -->

    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Tình trạng</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="matt" id="matt" class='form-control'>
              <?php
                foreach ($tinhtrang as $k=>$v){
                echo "<option value=$v->MA_TT>$v->TRANGTHAI</option>";            }
              ?>
        </select>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Thời gian</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input name="ngayxet" class='form-control' type="text" size="15" readonly="readonly" value="<?php 
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        echo mdate($datestring);?>">
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Chi tiết TT</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input type="text" name="chitiet_tt" id="chitiet_tt" value="" class='form-control'>
        <?php echo form_error('chitiet_tt','<small class="text-danger help-block">','</small>'); ?> 
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Ghi chú</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <textarea name="ghichu" id="ghichu" value="" class='form-control'></textarea>
      </div>
    </div><!--End form group -->
  </div><!-- End first col 4 -->
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label"></label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="checkbox">
          <label>
            <input name="c1" id="c1" type="checkbox" onclick="check()">
            Quá trình sử dụng
          </label>
        </div>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Mã trạm</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="matram" id="matram" class='form-control'>
          <?php
          foreach ($ma_tram as $k=>$v){
            echo "<option value=$v->MATRAM>$v->TENTRAM</option>";
          }
          ?>
        </select>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Ngày bắt đầu</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input id="ngaybd" name="ngaybd" type="date" size="15" class='form-control' required>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Ngày kết thúc</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input name="ngaykt" id="ngaykt" type="date" size="15" class='form-control'>
      </div>
    </div><!--End form group -->
    <input type="hidden" name='tinhtrang_tc' id='tinhtrang_tc' value='1'>
    <input type="hidden" name='tinhtrang_tb' id='tinhtrang_tb' value='1'>
    <input type="hidden" name='qtsd_tc' id='qtsd_tc' value='1'>
    <input type="hidden" name='qtsd_tb' id='qtsd_tb' value='1'>
    <input type="hidden" name='daitu_tc' id='daitu_tc' value='1'>
    <input type="hidden" name='daitu_tb' id='daitu_tb' value='1'>
   
  </div><!--End second col 4 -->
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label"></label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="checkbox">
          <label>
            <input name="c2" id="c2" type="checkbox" onclick="check1()">
            Đại tu
          </label>
        </div>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Loại đại tu</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="ma_dt" id="ma_dt" class='form-control'>
          <?php
          foreach ($daitu_mba as $k=>$v){
            echo "<option value=$v->MA_DAITU>$v->TEN_DAITU</option>";
          }
          ?>
        </select>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Ngày đại tu</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <input name="ngay_dt" id="ngay_dt" type="date" size="15" class='form-control' required>
      </div>
    </div><!--End form group -->
    <div class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Ghi chú</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <textarea name="nd_daitu" id="nd_daitu" type="text" size="25" class='form-control'></textarea>
        <br>
      </div>
    </div><!--End form group -->
    <div class="form-group pull-right">
      <input class='btn btn-default' type="submit" name="capnhat" value="Cập Nhật">
      <input class='btn btn-default' type="reset" name="huy" value="Nhập lại">
    </div>
  </div><!--End last col 4 -->
  
  <?php echo form_close(); ?><!--Close form-->
  <div class='clearfix'></div>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <form class="form-horizontal">

    <div id='cndv' class="form-group">
      <label class="col-xs-12 col-sm-4 control-label">Xem máy biến áp</label>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <select name="sono_s3" id="sono_s3" class='form-control' onchange="reLoadMayBienApResult()">
         <?php
         foreach ($so_no as $k1=>$v1){
          echo "<option value=$v1->SONO>$v1->SONO</option>";            }         
          ?>
        </select>
      </div><!--End col 8 -->
      <script type="text/javascript">
        function reLoadMayBienApResult() {
          $.ajax({
            type: 'get',
            url: 'capnhattinhtrangAjax',
            data: 'sono_s3=' + $('#sono_s3').val(),
            success: function(data) {
              $('#mayBienApResult').html(data);
            },
            error: function() {

            }
          });
        }
      </script>
    </div><!--End div id cndv-->  
    </form>
  </div><!--End col 4-->
  <div id="mayBienApResult">

  <legend>Chi tiết tình trạng máy biến áp</legend>
  <table id='bangketqua1' class="table table-bordered table-hover table-stripped">
    <thead>
      <tr>
        <th>#</th>
        <th>Số NO</th>
        <th>Thời Gian</th>
        <th>Tình Trạng</th>
        <th>Chi Tiết Tình Trạng</th>
        <th>Ghi Chú</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_POST['chitiet_sono']))
      {
       foreach ($cttinhtrang as $k=>$v){
        $stt=$k+1;
        echo"<tr>";
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
  </tbody>
</table>
<legend>Quá trình sử dụng máy biến áp</legend>
<table id="bangketqua2" class="table table-bordered table-hover table-stripped">
  <thead>
    <tr>
      <th>#</th>
      <th>Số NO</th>
      <th>Tên Trạm</th>
      <th>Ngày Bắt Đầu</th>
      <th>Ngày Kết Thúc</th>
      <th>Địa Chỉ Trạm</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($_POST['chitiet_sono']))
    {
      foreach ($ctsudung as $k=>$v){
        $stt=$k+1;
        echo"<tr>";
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
  </tbody>
</table>
<legend>Chi tiết đại tu máy biến áp</legend>
<table id="bangketqua3" class="table table-bordered table-hover table-stripped">
  <thead>
    <tr>
      <th>#</th>
      <th>Số NO</th>
      <th>Đại Tu</th>
      <th>Ngày</th>
      <th>Ghi Chú</th>
    </tr>
  </thead>
  <tbody>
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
</tbody>

</table>
</div><!--End mayBienApResult-->
</div>         
</div><!--End content-->
</div><!--End container fluid-->