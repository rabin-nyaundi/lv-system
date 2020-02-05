<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lv_department".
 *
 * @property int $deoartment_id
 * @property string $department_name
 *
 * @property LvUsers[] $lvUsers
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lv_department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_name'], 'required'],
            [['department_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'deoartment_id' => 'Deoartment ID',
            'department_name' => 'Department Name',
        ];
    }

    /**
     * Gets query for [[LvUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLvUsers()
    {
        return $this->hasMany(LvUsers::className(), ['department' => 'deoartment_id']);
    }
}
