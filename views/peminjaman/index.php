<?php

use yii\helpers\Html;
use yii\grid\GridView;
/*use app\models\User; */

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index box box-primary">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'id_buku',
                'value' => function($data){
                    /*$data=variabel,->=namarelasi, ->=targetrelasi*/
                    return $data->idBuku->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
            ],
            
            [
                'attribute' => 'id_user',
                'value' => function($data){
                    return $data->idUser->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'waktu_dipinjam',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],
            [
                'attribute' => 'waktu_pengembalian',
                'headerOptions' => ['style' => 'text-align:center;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
