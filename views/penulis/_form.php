<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\JenisKelamin;

/* @var $this yii\web\View */
/* @var $model app\models\Penulis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penulis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenis_kelamin')->widget(Select2::classname(), [
            'data' => JenisKelamin::getList(),
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ], 
        ]); ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Sunting', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
