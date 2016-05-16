<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\widgets\DatePicker;
use app\components\formato;
use app\components\formatosFechas;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pagos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,
        'responsive'=>true,
        'resizableColumns'=>true,
        //'showPageSummary' => true,
        'exportConfig' => [
            GridView::CSV => [/*'label' => 'Save as CSV'*/],
            GridView::HTML => [/* html settings*/ ],
            GridView::PDF => [/* pdf settings*/],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Pagos</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Anio'
            ],
            [
                'attribute' => 'Mes',
                /*'value' => function($model){
                    return $model->getMes();
                }*/
                'value' => function($data){
                    if(!is_null($data->Mes)){
                        return formatosFechas::nameMonths($data->Mes);
                    } else {
                        return 'N/A';
                    }
                }
            ],
            [
                'attribute' => 'idTiposPagos',
                'value' => 'idTiposPagos0.Nombre',
                'contentOptions' => [
                    'class' => 'col-sm-4'
                ]
            ],
            [
                'attribute' => 'FechaReciboPago',
                'value' => 'FechaReciboPago',
                'format' => 'raw',
                'filter' =>DatePicker::widget([
                    'model' => $searchModel, 
                    'attribute' => 'FechaReciboPago',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),
                'contentOptions' => ['style' => 'width: 200px;']
            ],
            [
                'attribute' => 'FechaRealizadoPago',
                'value' => 'FechaRealizadoPago',
                'format' => 'raw',
                'filter' =>DatePicker::widget([
                    'model' => $searchModel, 
                    'attribute' => 'FechaRealizadoPago',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),
                'contentOptions' => ['style' => 'width: 200px;']
            ],
            [
                'attribute' => 'Cantidad',
                'value' => function($data){
                    if($data->Cantidad != NULL) {
                        return formato::formatPesosSigned($data->Cantidad);
                    } else {
                        return 'N/A';
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
