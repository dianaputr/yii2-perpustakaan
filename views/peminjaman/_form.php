<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\Buku;
use app\models\Login;
/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_buku')->widget(Select2::classname(), [
            'data' => Buku::getList(),
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ], 
        ]); ?>

    <?= $form->field($model, 'id_user')->widget(Select2::classname(), [
            'data' => Login::getList(),
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ], 
        ]); ?>

    <?= $form->field($model, 'waktu_dipinjam')->widget(DatePicker:: classname(),[]) ?>

    <?= $form->field($model, 'waktu_pengembalian')->widget(DatePicker:: classname(),[]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Sunting', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
