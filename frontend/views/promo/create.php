<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Promo */

$this->title = 'Создание промокода';
$this->params['breadcrumbs'][] = ['label' => 'Промокоды', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
