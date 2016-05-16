<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TiposPagos */

$this->title = 'Create Tipos Pagos';
$this->params['breadcrumbs'][] = ['label' => 'Tipos Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-pagos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
