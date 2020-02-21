<?php

use yii\grid\GridView;
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeaveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leave Application';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-index">

    <h3><?=Html::encode($this->title)?></h3>

    <p>
        <?=Html::a('New Leave', ['create'], ['class' => 'btn btn-primary'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'lv_leave_id',
        // 'leave_user_id',
        // 'leave_subject:ntext',
        // 'lv_date_raised',
        'lv_start_date',
        'lv_end_date',
        // [
        //     'attribute'=> 'lv_start_date',
        //     'filter' => \dosamigos\datepicker\DatePicker::widget([
        //         'name' => 'lv_start_date',
        //         // 'value' => '02-16-2012',
        //         // 'template' => '{addon}{input}',
        //             'clientOptions' => [
        //                 'autoclose' => true,
        //                 'format' => 'dd-M-yyyy'
        //             ] 
        //     ]),

        // ],
        // 'lv_status',
        [
            'attribute' => 'lv_status',
            'filter' => [1 => 'Awaiting approval', 2 => 'Approved', 3 => 'Rejected'],
            'value' => function ($model) {
                switch ($model->lv_status) {
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
]);?>


</div>
