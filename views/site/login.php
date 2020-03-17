<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->context->layout= 'mini';
$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container center_div">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        <div class="site-login">

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
    ],
]); ?>

    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
    ]) ?>

    <div class="form-group">
        <div class="container center_div">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-md-offset-3">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div> -->
    </div>

<?php ActiveForm::end(); ?>
</div>
        </div>
    </div>
</div>

