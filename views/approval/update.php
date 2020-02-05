<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Approval */

$this->title = 'Update Approval: ' . $model->approval_id;
$this->params['breadcrumbs'][] = ['label' => 'Approvals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->approval_id, 'url' => ['view', 'id' => $model->approval_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="approval-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
