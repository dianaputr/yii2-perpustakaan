<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'header' => 'No' ,
            ],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
