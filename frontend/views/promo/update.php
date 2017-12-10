<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Promo */

$this->title = 'Редактирование промокода';
$this->params['breadcrumbs'][] = ['label' => 'Промокоды', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
