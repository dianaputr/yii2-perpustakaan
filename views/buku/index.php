<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index box box-primary">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Buku', ['create'], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel Buku', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-warning btn-flat']) ?>
        <!-- coba pake beda controller -->
         <!-- <?= Html::a('<i class="fa fa-print"></i> Export Excel Daftar Buku', ['export/export'], ['class' => 'btn btn-success btn-flat']) ?> -->
         <!-- <?=  Html::a('<i class="fa fa-print"></i> Export PDF Buku', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat']) ?> -->
         <?= Html::a('<i class="glyphicon glyphicon-search"></i> Cari Buku', ['pencarian'], ['class' => 'btn btn-success btn-flat']) ?>

    </div>

    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'header' => 'No' ,
            'headerOptions' => ['style' => 'text-align:center'],
            ],

             [
                'attribute' => 'nama',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center'],
                
            ],
            //cara 1 relasi
            [
                'attribute' => 'id_jenis',
                'format' => 'raw',
                'value' => function($data){
                    return $data->getRelationField('idJenis','nama');
                },
                'headerOptions' => ['style' => 'text-align:center'],
                
            ],
            //cara 2 relasi
            [
                'attribute' => 'id_penulis',
                'format' => 'raw',
                'value' => function($data){
                    return $data->idPenulis->nama;
                },
                'headerOptions' => ['style' => 'text-align:center'],
                
            ],
            [
                'attribute' => 'cover',
                'format' => 'raw',
                'value' => function($data){
                    return $data->getGambar(['style'=>'width:100px']);
                }, 
                'headerOptions' => ['style' => 'text-align:center'],
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
