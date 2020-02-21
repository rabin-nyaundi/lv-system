<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Leave */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'leave_user_id')->hiddenInput(['value' => Yii::$app->session['userid']])->label(false)?>

    <?=$form->field($model, 'leave_subject')->textarea(['rows' => 6])?>

    <?=$form->field($model, 'lv_date_raised')->hiddenInput(['value' => date('Y-m-d H:i:s')])->label(false)?>

    <?=$form->field($model, 'lv_start_date')->widget(
    DatePicker::className(), [
        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-M-dd',
        ],
    ]);?>

    <?=$form->field($model, 'lv_end_date')->widget(
    DatePicker::className(), [
        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-M-dd',
        ],
    ]);?>

    <?=$form->field($model, 'lv_status')->hiddenInput(['value'=>1])->label(false)?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
