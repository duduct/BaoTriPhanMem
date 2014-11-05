<?php
$stt = 0;
foreach ($mba as $k=>$v){
    $stt=$k+1;
    echo"<tr>";
    echo "<td>".$stt."</td>";
    echo "<td>".$v["SONO"]."</td>";
    echo "<td>".$v["TEN_DV"]."</td>";
    echo "<td>".$v["TEN_HSX"]."</td>";
    echo "<td>".$v["TENLOAI_MBA"]."</td>";
    echo "<td>".$v["TEN_MBA"]."</td>";
    echo "<td>".$v["MSTS"]."</td>";
    echo "<td>".$v["NAM_SX"]."</td>";
    echo "<td>".$v["CONGSUAT"]."</td>";
    echo "<td>".$v["DIENAP"]."</td>";
    echo "<td>".$v["LOAIDAU"]."</td>";
    echo "<td>".$v["THONGSODO"]."</td>";
    echo "<td>".$v["QUOCGIA_SX"]."</td>"; 
    echo "<td>".$v["NAMNHAPVE"]."</td>";
    echo "<td>".$v["CHIEUDAI"]."</td>";
    echo "<td>".$v["CHIEURONG"]."</td>";
    echo "<td>".$v["CHIEUCAO"]."</td>";
    echo "<td>".$v["TRONGLUONGRUOTMAY"]."</td>";
    echo "<td>".$v["TRONGLUONGDAU"]."</td>";
    echo "<td>".$v["TONGTRONGLUONG"]."</td>";
    echo "</tr>";
}
if ($stt == 0)
    echo "<tr><td colspan='20'>Không có máy biến áp nào</td></tr>";
?>