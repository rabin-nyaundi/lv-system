<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leave_user_type".
 *
 * @property int $id
 * @property string $user_type
 *
 * @property LvUsers[] $lvUsers
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leave_user_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_type'], 'required'],
            [['user_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type' => 'User Type',
        ];
    }

    /**
     * Gets query for [[LvUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLvUsers()
    {
        return $this->hasMany(LvUsers::className(), ['user_type' => 'id']);
    }
}
