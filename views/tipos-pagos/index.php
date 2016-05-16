<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TiposPagosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-pagos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipos Pagos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
