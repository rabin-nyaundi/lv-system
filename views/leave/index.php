<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeaveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leaves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leave', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lv_leave_id',
            'leave_user_id',
            'leave_subject:ntext',
            'lv_date_raised',
            'lv_start_date',
            //'lv_end_date',
            //'lv_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>