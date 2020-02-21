<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Leave */

$this->title = 'Create Leave';
// $this->params['breadcrumbs'][] = ['label' => 'Leaves', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
