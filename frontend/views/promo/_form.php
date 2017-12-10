<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\Promo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'begin_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'city_id')->dropDownList(City::cityList()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if (!$model->isNewRecord) {
        echo $form->field($model, 'active')->dropDownList($model->statusList);
    }?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    if (!$model->isNewRecord) {
        $this->registerJsFile('@web/js/promo-set-fields.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    }
?>
