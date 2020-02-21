<?php

namespace app\controllers;

use app\models\Approval;
use app\models\Leave;
use app\models\LeaveSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * LeaveController implements the CRUD actions for Leave model.
 */
class LeaveController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Leave models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeaveSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leave model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Leave model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Leave();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->lv_status = 1;

            $approver = (new \yii\db\Query())
            ->select(['id'])
            ->from('lv_users')
            ->where(['user_type' => 1])
            ->one();

            $approval = new Approval();
            $approval->approval_user_id = $this->_getUser('id');
            $approval->approval_leave_id = $model->lv_leave_id;
            $approval->approver_id = $approver;
            $approval->approval_date = date('Y-m-d m-i-s');
            $approval->Remarks = "Not yet approved, Awaiting approval";
            $approval->approval_status = 1;
            $approval->save(false);

            // var_dump($approval->errors);
            // print_r($approval);
            // exit();

            return $this->redirect(['view', 'id' => $model->lv_leave_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Leave model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lv_leave_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Leave model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leave model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Leave the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Leave::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function _getUser($field)
    {
        $user = \app\models\Users::find()->one();
        return $user->$field;
    }

    protected function _getLeaveId($field)
    {
        $leave = \app\models\Leave::find()->one();
        return $leave->$field;
    }

    protected function _getApprover($field)
    {
        $approver = \app\models\Users::find()->where(['user_type' => 'Admin'])->one();
        return $approver->$field;
    }

    protected function _getApproverU($field)
    {
        $approver = \app\models\Users::find()->select('user_lname')->where(['user_type' => 'Admin']);
        return $approver->$field;
    }
}
