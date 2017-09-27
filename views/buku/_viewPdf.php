<?php 
use kartik\mpdf\Pdf;
?>
<div>&nbsp;</div>
<div>&nbsp;</div>



<h2>DETAIL BUKU </h2>

<table border="1" width="100%" cellpadding="7">
	<tr>
		<th width="20%">Nama Buku</th>
		<td width="3%">:</td>
		<td><?= $model->nama; ?></td>
	</tr>
	<tr>
		<th>Jenis Buku</th>
		<td>:</td>
		<td><?= $model->idJenis->nama; ?></td>
	</tr>	
	<tr>
		<th>Penulis</th>
		<td>:</td>
		<td><?= $model->idPenulis->nama; ?></td>
	</tr>
	<tr>
		<th>Cover</th>
		<td>:</td>
		<td><?= $model->cover; ?></td>
	</tr>
</table>