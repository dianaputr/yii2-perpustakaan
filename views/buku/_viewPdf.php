<?php 
use kartik\mpdf\Pdf;
?>
<div>&nbsp;</div>
<div>&nbsp;</div>

<h2>Biodata </h2>

<table width="100%" cellpadding="7">
	<tr>
		<td width="15%">Nama</td>
		<td width="2%">:</td>
		<td><?= $model->nama; ?></td>
	</tr>
	<tr>
		<td>Jenis buku</td>
		<td>:</td>
		<td><?= $model->idJenis->nama; ?></td>
	</tr>	
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td><?= $model->idPenulis->nama; ?></td>
	</tr>
	<tr>
		<td>Cover</td>
		<td>:</td>
		<td><?= $model->cover; ?></td>
	</tr>
</table>