<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\Buku;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="peminjaman-form box box-primary">
<div class="box-header with-border">
       <h3 class="box-title">Form Peminjaman</h3> 
    </div>
    <div class="box-body">

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_buku')->widget(Select2::classname(), [
            'data' => Buku::getList(),
            'language' => 'de',
            'options' => ['placeholder' => 'Pilih Buku'],
            'pluginOptions' => [
                'allowClear' => true
            ], 
        ]); ?>

    

    <?= $form->field($model, 'waktu_dipinjam')->widget(DatePicker:: classname(),[
            'removeButton' => false,
            'options' => ['placeholder' => 'Tanggal'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',]
                    
    ]); ?>

    <?= $form->field($model, 'waktu_pengembalian')->widget(DatePicker:: classname(),[
            'removeButton' => false,
            'options' => ['placeholder' => 'Tanggal'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',]
                    
    ]); ?>

    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Sunting', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    
</div>
</div>
<?php ActiveForm::end(); ?>
