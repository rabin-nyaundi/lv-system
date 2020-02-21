<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Approval */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approval-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'approval_user_id')->textInput() ?>

    <?= $form->field($model, 'approval_leave_id')->textInput() ?>

    <?= $form->field($model, 'approver_id')->textInput() ?>

    <?= $form->field($model, 'approval_date')->textInput() ?>

    <?= $form->field($model, 'Remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'approval_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
