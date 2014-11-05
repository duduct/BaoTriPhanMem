<table class='table table-hover'>
	<thead>
		<tr>
			<th>#</th>
			<th>Số NO</th>
			<th>Tên MBA</th>
			<th>Tên đơn vị</th>
			<th>Tên hsx</th>
			<th>Mã số tài sản</th>
			<th>Năm sản xuất</th>
			<th>Năm nhập về</th>
			<th>Loại dầu</th>
			<th>Trọng lượng dầu</th>
			<th>Loại MBA</th>
			<th>Thông số đo</th>
			<th>Công suất</th>
			<th>Điện áp</th>
		</tr>
	</thead>
	<tbody>

	<?php $i = 1?>
	<?php foreach ($results as $result): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $result['SONO'] ?></td>
			<td><?php echo $result['TEN_MBA'] ?></td>
			<td><?php echo $result['TEN_DV'] ?></td>
			<td><?php echo $result['TEN_HSX'] ?></td>
			<td><?php echo $result['MSTS'] ?></td>
			<td><?php echo $result['NAM_SX'] ?></td>
			<td><?php echo $result['NAMNHAPVE'] ?></td>
			<td><?php echo $result['LOAIDAU'] ?></td>
			<td><?php echo $result['TRONGLUONGDAU'] ?></td>
			<td><?php echo $result['TENLOAI_MBA'] ?></td>
			<td><?php echo $result['THONGSODO'] ?></td>
			<td><?php echo $result['CONGSUAT'] ?></td>
			<td><?php echo $result['DIENAP'] ?></td>					
		</tr>
	<?php endforeach ?>
	</tbody>
</table>