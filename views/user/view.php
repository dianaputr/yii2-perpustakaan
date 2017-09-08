<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Peminjaman;

/* @var $this yii\web\View */
/* @var $model app\models\Login */

$this->title = 'Detai User: ' .$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting User', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar User', ['user/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'username',
            'password',
            /*'authKey',
            'accessToken',*/
            'role',
        ],
    ]) ?>

</div>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Buku</th>
            <th>User</th>
            <th>Waktu Peminjaman</th>
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