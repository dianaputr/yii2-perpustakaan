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
        <!-- h3 class="box-title">Detail Buku</h3> -->
    </div>
    <div class="box-body">

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting Buku', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar Buku', ['buku/index', 'id' => $model->id], ['class' => 'btn btn-warning btn-flat']) ?>
        <?= Html::a('<i class="fa fa-file"></i> Export PDF', ['view-export-pdf', 'id' => $model->id], ['target' => '_blank', 'class' => 'btn btn-success btn-flat']) ?>
    </p>

    <?= DetailView::widget([ /*menampilkan detail*/
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
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
            [
                'attribute' => 'cover',
                'format' => 'raw',
                'value' => Html::img('@web/uploads/'.$model->cover,['width'=>'100px']),
            ],
        ],
    ]) ?>
    </div>
</div>
