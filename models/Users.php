<?php

namespace app\models;


use Yii;
use yii\base\Security;

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
 * @property Approval[] $lvApprovals
 * @property Leave[] $lvLeaves
 * @property Department $department0
 * @property UserType $userType
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            'emp_no' => 'Employee No.',
            'user_fname' => 'Firstname',
            'user_lname' => 'Lastname',
            'user_email' => 'Email',
            'user_pswd' => 'Password',
            'user_phone' => 'Phone',
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

    // login identity interface

    public function getAuthKey()
    {
        // return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->user_pswd === $password;
    }

    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        return null;
    }

    /**
     * Finds user by email
     *
     * @param string $user_email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['user_email' => $email]);

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }
}
