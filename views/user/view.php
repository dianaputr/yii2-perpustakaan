<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Detail User: ' .$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="box-header">
       <!--  <h3 class="box-title">Form Mahasiswa</h3> -->
    </div>
    <div class="box-body">

    <p>
       <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar User', ['user/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'username',
            'password',
            'authKey',
            'accessToken',
            'role',
        ],
    ]) ?>
    </div>

</div>
