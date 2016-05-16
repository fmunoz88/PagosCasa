<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    

    
    <?= $form->field($model, 'idTiposPagos')->widget(Select2::classname(), [
            'language' => 'es',
            'data' => [1 => 'LUZ', 2 => 'AGUA', 3 => 'RENTA', 4 => 'CABLE'],
            'options' => ['placeholder' => 'Selecciona'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
    ?>
    
    <?= $form->field($model, 'FechaReciboPago')->widget(DatePicker::classname(), [
            'options' => [
                'placeholder' => 'Ingrese una fecha', 
                'readonly' => true
            ],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                
            ]
        ]);
    ?>
    
    <?= $form->field($model, 'FechaRealizadoPago')->widget(DatePicker::classname(), [
            'options' => [
                'placeholder' => 'Ingrese una fecha', 
                'readonly' => true
            ],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>
    
    <?= $form->field($model, 'Cantidad')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$ ',
            //'suffix' => ' $',
            'allowNegative' => false
        ]
    ]); ?> 

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>
    

    
    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*'
            ],
            'pluginOptions' => [
                'showUpload' => false,
                //'browseLabel' => '',
                //'removeLabel' => '',
                //'mainClass' => 'input-group-lg'
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
