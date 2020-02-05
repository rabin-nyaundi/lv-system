<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeaveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lv_leave_id') ?>

    <?= $form->field($model, 'leave_user_id') ?>

    <?= $form->field($model, 'leave_subject') ?>

    <?= $form->field($model, 'lv_date_raised') ?>

    <?= $form->field($model, 'lv_start_date') ?>

    <?php // echo $form->field($model, 'lv_end_date') ?>

    <?php // echo $form->field($model, 'lv_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
