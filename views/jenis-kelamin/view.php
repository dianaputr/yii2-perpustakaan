<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKelamin */

$this->title ='Detail Jenis Kelamin: ' .$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kelamins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kelamin-view box box-primary">

    <div class="box-header">
        <!-- <h3 class="box-title">Detail Jenis Kelamin</h3> -->
    </div>
    <div class="box-body">

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar Jenis Kelamin', ['jenis-kelamin/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'id',
            'nama',
        ],
    ]) ?>
    </div>

</div>
