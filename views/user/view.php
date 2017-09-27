<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Peminjaman;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Detail User: ' .$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="box-header">
       <!--  <h3 class="box-title">Form Mahasiswa</h3> -->
    </div>
    <div class="box-body">

    <p>
       <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar User', ['user/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('<i class="fa fa-file"></i> Export PDF', ['view-export-pdf', 'id' => $model->id], ['target' => '_blank', 'class' => 'btn btn-success btn-flat']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'id',
            'nama',
            'username',
            'password',
            'role',
             /*'authKey',
            'accessToken',*/
            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => Html::img('@web/uploads/'.$model->foto,['width'=>'100px']),
            ],
        ],
    ]) ?>
    </div>

</div>
<div class="box box-primary">
<div class="box-header">
        <h3 class="box-title">Form Peminjaman</h3>
    </div>
    <div class="box-body">
<table class="table table-bordered table-hover table-striped">
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
</div>
