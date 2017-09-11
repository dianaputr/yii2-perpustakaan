<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Buku;

/* @var $this yii\web\View */
/* @var $model app\models\Penulis */

$this->title ='Detail Penulis: ' .$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Penulis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penulis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar Penulis', ['penulis/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            [
                'attribute' => 'id_jenis_kelamin',
                'value' => function($data){
                    return $data ->idJenisKelamin->nama;
                },
            ],
            'alamat:ntext',
        ],
    ]) ?>

</div>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Penulis</th>
            <th>Cover</th>
        </tr>
        
    </thead>
    <tr>
    <?php 
    $i=1;
    //menampilkan buku yang dimana id_jenis nya= id diview 
    foreach (Buku::find()->where(['id_penulis' => $model->id])->all() as $data) { ?>
            <td><?= $i; ?></td>
            <td><?= $data->nama ?></td>
            <td><?= $data->idJenis->nama ?></td>
            <td><?= $data->idPenulis->nama ?></td>
            <td><?= $data->cover ?></td>
        </tr>
    <?php $i++; } ?>
    
</table>
