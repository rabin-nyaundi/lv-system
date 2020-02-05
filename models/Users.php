<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lv_users".
 *
 * @property int $id
 * @property string $emp_no
 * @property string $user_fname
 * @property string $user_lname
 * @property string $user_email
 * @property string $user_pswd
 * @property int $user_phone
 * @property int $department
 * @property int $user_type
 *
 * @property LvApproval[] $lvApprovals
 * @property LvLeave[] $lvLeaves
 * @property LvDepartment $department0
 * @property LeaveUserType $userType
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lv_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_no', 'user_fname', 'user_lname', 'user_email', 'user_pswd', 'user_phone', 'department', 'user_type'], 'required'],
            [['user_phone', 'department', 'user_type'], 'integer'],
            [['emp_no', 'user_fname', 'user_lname', 'user_email', 'user_pswd'], 'string', 'max' => 50],
            [['user_email'], 'unique'],
            [['department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department' => 'deoartment_id']],
            [['user_type'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_no' => 'Emp No',
            'user_fname' => 'User Fname',
            'user_lname' => 'User Lname',
            'user_email' => 'User Email',
            'user_pswd' => 'User Pswd',
            'user_phone' => 'User Phone',
            'department' => 'Department',
            'user_type' => 'User Type',
        ];
    }

    /**
     * Gets query for [[LvApprovals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLvApprovals()
    {
        return $this->hasMany(Approval::className(), ['approval_user_id' => 'id']);
    }

    /**
     * Gets query for [[LvLeaves]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLvLeaves()
    {
        return $this->hasMany(Leave::className(), ['leave_user_id' => 'id']);
    }

    /**
     * Gets query for [[Department0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment0()
    {
        return $this->hasOne(Department::className(), ['deoartment_id' => 'department']);
    }

    /**
     * Gets query for [[UserType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type']);
    }
}
