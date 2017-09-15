<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title ='Detail Buku: ' .$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-view box box-primary">

    <div class="box-header">
        <<!-- h3 class="box-title">Detail Buku</h3> -->
    </div>
    <div class="box-body">

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting Buku', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar Buku', ['buku/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([ /*menampilkan detail*/
        'model' => $model,
        'attributes' => [
            
            'nama',
            //cara 1 relasi
            [
                'attribute' => 'id_jenis',
                'value' => function($data){
                    return $data->getRelationField('idJenis','nama');
                },
            ],
            //cara 2 relasi
            [
                'attribute' => 'id_penulis',
                'value' => function($data){
                    return $data->idPenulis->nama;
                },
            ],
            'cover',
        ],
    ]) ?>
    </div>
</div>
