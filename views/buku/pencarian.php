<?php   
use yii\helpers\Url;
use app\models\Jenis;
use app\models\Penulis;
use app\models\Buku;
use app\models\Penerbit;
?>

<div class="box box-primary">
<div class="box-header">
	 <h3 class="box-title">Pencarian</h3>
    </div>
    <div class="box-body">
 <div class="col-sm-6">
    <form action="<?= Url::to(['buku/pencarian']); ?>" role="form" method="post">  
	
        <div class="form-group">
            <!-- <label>Cari Buku:</label>
            <input name="pencarian" type="text" class="form-control" id="#"> -->
       <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
        
 		
        <table class="table table-border">
					<thead>
					<tbody>
						<tr>
							<td>Nama Buku</td>
							<td>:</td>
							<td><input class="form-control" type="text" name="nama" required></input></td>
						</tr>
						<tr>
							<td>Jenis Buku</td>
							<td>:</td>
							<td>
							<select class="form-control" name="id_jenis" >
							<option>--Pilih Jenis Buku--</option> 
							<?php $i=1; foreach (Jenis::find()->all() as $data): ?>
									<option><?= $data->nama ?></option>
								<?php $i++; endforeach; ?>									
							</select>
							</td>
						</tr>
						<tr>
							<td>Penulis Buku</td>
							<td>:</td>
							<td><select class="form-control" name="id_penulis" >
							<option>--Pilih Penulis Buku--</option> 
							<?php $i=1; foreach (Penulis::find()->all() as $data): ?> 
									<option><?= $data->nama ?></option>
								<?php $i++; endforeach; ?>									
							</select></td>
						</tr>
						<tr>
							<td>Penerbit Buku</td>
							<td>:</td>
							<td><select class="form-control" name="penerbit" >
							<option>--Pilih Penerbit Buku--</option> 
							<?php $i=1; foreach (Penerbit::find()->all() as $data): ?>
									<option><?= $data->nama ?></option>
								<?php $i++; endforeach; ?>									
							</select></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" class="btn btn-primary" name="submit" value="Cari"></input></td>
						</tr>
						</tbody>
						</thead>
						</div>
					</table>
				</div>
    </form>
   </div> 
</div>
         