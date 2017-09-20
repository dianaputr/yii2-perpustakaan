<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah User', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'username',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],
             [
                'attribute' => 'password',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],
           /*  [
                'attribute' => 'authKey',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],*/
            // 'accessToken',
            [
                'attribute' => 'role',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
