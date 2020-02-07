<?php

use app\models\Department;
use app\models\UserType;
use yii\helpers\Arrayhelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'emp_no')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user_fname')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user_lname')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user_email')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user_pswd')->passwordInput(['maxlength' => true])?>
    <!-- <?=Html::checkbox('reveal-password', true, ['id' => 'reveal-password'])?> <?=Html::label('Show password', 'reveal-password')?> -->

    <?=$form->field($model, 'user_phone')->textInput()?>

    <?=$form->field($model, 'department')->dropDownList(Arrayhelper::map(Department::find()->all(),
    'deoartment_id', 'department_name'),
    ['prompt' => 'Select Department'])?>

    <?=$form->field($model, 'user_type')->dropDownList(Arrayhelper::map(UserType::find()->all(),
    'id', "user_type"),
    ['prompt' => 'Select User'])?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
