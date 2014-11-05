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
        $stt = 0;
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
      if ($stt == 0) echo "<tr><td colspan='6'>0 máy biến áp.</td></tr>"
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
      $stt = 0;
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
      if ($stt == 0) echo "<tr><td colspan='6'>0 máy biến áp.</td></tr>"
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
      $stt = 0;
      foreach ($ctdaitu as $k=>$v){
        $stt=$k+1;
        echo"<tr>";
        echo "<TD>".$stt."</TD>";
        echo "<TD>".$v["SONO"]."</TD>";
        echo "<TD>".$v["TEN_DAITU"]."</TD>";
        echo "<TD>".$v["NGAYDAITU"]."</TD>";
        echo "<TD>".$v["ND_DAITU"]."</TD>";
        echo "</tr>";
      }
      if ($stt == 0) echo "<tr><td colspan='6'>0 máy biến áp.</td></tr>"
 
  ?>
</tbody>

</table>