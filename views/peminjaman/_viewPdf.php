<?php 
use kartik\mpdf\Pdf;
?>
<div>&nbsp;</div>
<div>&nbsp;</div>



<h2>DETAIL PEMINJAMAN</h2>

<table border="1" width="100%" cellpadding="7">
	<tr>
		<th width="35%">ID Peminjaman</th>
		<td width="3%">:</td>
		<td><?= $model->id; ?></td>
	</tr>
	<tr>
		<th>Buku</th>
		<td>:</td>
		<td><?= $model->idBuku->nama; ?></td>
	</tr>	
	<tr>
		<th>Peminjam</th>
		<td>:</td>
		<td><?= $model->idUser->nama; ?></td>
	</tr>
	<tr>
		<th>Waktu Dipinjam</th>
		<td>:</td>
		<td><?= $model->waktu_dipinjam; ?></td>
	</tr>
	<tr>
		<th>Waktu Dikembalikan</th>
		<td>:</td>
		<td><?= $model->waktu_pengembalian; ?></td>
	</tr>
</table>