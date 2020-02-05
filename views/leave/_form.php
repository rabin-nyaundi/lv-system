<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Leave */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'leave_user_id')->textInput() ?>

    <?= $form->field($model, 'leave_subject')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lv_date_raised')->textInput() ?>

    <?= $form->field($model, 'lv_start_date')->textInput() ?>

    <?= $form->field($model, 'lv_end_date')->textInput() ?>

    <?= $form->field($model, 'lv_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
