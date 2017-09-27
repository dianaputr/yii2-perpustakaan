<?php 
use kartik\mpdf\Pdf;
use app\models\Peminjaman;
?>
<div>&nbsp;</div>
<div>&nbsp;</div>



<h2>DETAIL USER</h2>

<table border="1" width="100%" cellpadding="7">
	<tr>
		<th width="35%">ID User</th>
		<td width="3%">:</td>
		<td><?= $model->id; ?></td>
	</tr>
	<tr>
		<th>Nama</th>
		<td>:</td>
		<td><?= $model->nama; ?></td>
	</tr>	
	<tr>
		<th>Username</th>
		<td>:</td>
		<td><?= $model->username; ?></td>
	</tr>
	<tr>
		<th>Password</th>
		<td>:</td>
		<td><?= $model->password; ?></td>
	</tr>
	<tr>
		<th>Role</th>
		<td>:</td>
		<td><?= $model->role; ?></td>
	</tr>
	<tr>
		<th>Foto</th>
		<td>:</td>
		<td><?= $model->foto; ?></td>
	</tr>
</table>


        <h3 class="box-title">Form Peminjaman</h3>

<table border="1" width="100%" cellpadding="7">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>User</th>
            <th>Waktu Dipinjam</th>
            <th>Waktu Pengembalian</th>
        </tr>
        
    </thead>
   
    <tr>
    <?php 
    $i=1;
    //menampilkan buku yang dimana id_jenis nya= id diview 
    foreach (Peminjaman::find()->where(['id_user' => $model->id])->all() as $data) { ?>
            <td><?= $i; ?></td>
            <td><?= $data->idBuku->nama ?></td>
            <td><?= $data->idUser->nama ?></td>
            <td><?= $data->waktu_dipinjam ?></td>
            <td><?= $data->waktu_pengembalian ?></td>
        </tr>
    <?php $i++; } ?>
    
</table>
