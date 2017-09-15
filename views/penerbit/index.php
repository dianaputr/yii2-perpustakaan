<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenerbitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penerbit';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-index box box-primary">

    <<!-- h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Penerbit', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'header' => 'No' ,
             'headerOptions' => ['style' => 'text-align:center;'],
             ],

            [
                'attribute' => 'nama',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],
            [
                'attribute' => 'alamat',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],
            [
                'attribute' => 'lat',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],
            [
                'attribute' => 'lng',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],
            // 'tahun_terbit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
