<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
//directori aplikasi yang dibuka
use app\models\Jenis;
use app\models\Penulis;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-form box box-primary">
<div class="box-header">
        <!-- <h3 class="box-title">Form Buku</h3> -->
    </div>
    <div class="box-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
<!-- 
    <?= $form->field($model, 'id_jenis')->textInput() ?> -->

    <?= $form->field($model, 'id_jenis')->widget(Select2::classname(), [
            'data' => Jenis::getList(),
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ], 
        ]); ?>

    <?= $form->field($model, 'id_penulis')->widget(Select2::classname(), [
            'data' => Penulis::getList(),
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ], 
        ]); ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Sunting', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>  

</div>
