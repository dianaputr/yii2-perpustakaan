<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title ='Detail Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-view box box-primary">
    <div class="box-header">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar Peminjaman', ['peminjaman/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>
    </div>
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'id',
            [
                'attribute' => 'id_buku',
                'value' => function($data){
                    /*$data=variabel,->=namarelasi, ->=targetrelasi*/
                    return $data->idBuku->nama;
                },
            ],
            [
                'attribute' => 'id_user',
                'value' => function($data){
                    /*$data=variabel,->=namarelasi, ->=targetrelasi*/
                    return $data->idUser->nama;
                },
            ],
            'waktu_dipinjam',
            'waktu_pengembalian',
        ],
    ]) ?>
    </div>

</div>


