<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lv_approval".
 *
 * @property int $approval_id
 * @property int $approval_user_id
 * @property int $approval_leave_id
 * @property int $approver_id
 * @property string $approval_date
 * @property string $Remarks
 * @property int $approval_status
 *
 * @property LvLeave $approvalLeave
 * @property LvUsers $approvalUser
 */
class Approval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lv_approval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['approval_user_id', 'approval_leave_id', 'approver_id', 'approval_date', 'Remarks', 'approval_status'], 'required'],
            [['approval_user_id', 'approval_leave_id', 'approver_id', 'approval_status'], 'integer'],
            [['approval_date'], 'safe'],
            [['Remarks'], 'string'],
            [['approval_leave_id'], 'exist', 'skipOnError' => true, 'targetClass' => Leave::className(), 'targetAttribute' => ['approval_leave_id' => 'lv_leave_id']],
            [['approval_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['approval_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'approval_id' => 'Approval ID',
            'approval_user_id' => 'User',
            'approval_leave_id' => 'Leave ID',
            'approver_id' => 'Approver',
            'approval_date' => 'Date approved',
            'Remarks' => 'Remarks',
            'approval_status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ApprovalLeave]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalLeave()
    {
        return $this->hasOne(Leave::className(), ['lv_leave_id' => 'approval_leave_id']);
    }

    /**
     * Gets query for [[ApprovalUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'approval_user_id']);
    }
}
