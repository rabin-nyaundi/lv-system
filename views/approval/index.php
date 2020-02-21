<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApprovalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approvals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approval-index">

    <h4><?= Html::encode($this->title) ?></h4>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'approval_id',
            // 'approval_user_id',
            'approval_leave_id',
            // 'approver_id',
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
            'approval_date',
            //'Remarks:ntext',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
