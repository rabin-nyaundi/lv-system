<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Approval */

$this->title = $model->approval_id;
$this->params['breadcrumbs'][] = ['label' => 'Approvals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="approval-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->approval_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->approval_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'approval_id',
            'approval_user_id',
            'approval_leave_id',
            [
                'attribute'=> 'approver_id',
                'value'=> function($model)
                {
                    if(!empty($model->approver_id))
                    {
                        return \app\models\Users::findOne($model->approver_id)->user_lname;
                    }
                }
            ],
            // 'approver_id',
            'approval_date',
            'Remarks:ntext',
            // 'approval_status',
            [
                'attribute' => 'approval_status',
                'filter' => [1 => 'Awaiting approval', 2 => 'Approved', 3 => 'Rejected'],
                'value' => function ($model) {
                    switch ($model->approval_status) {
                    case 3:'Rejected';
                        break;
                        case2:'Approved';
                        break;
                    default:
                        return 'Awaiting approval';
                    }
                },
            ],
        ],
    ]) ?>

</div>
