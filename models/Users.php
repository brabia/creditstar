<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property integer $personalCode
 * @property integer $phone
 * @property integer $active
 * @property integer $isDead
 * @property string $lang
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'email', 'personalCode', 'phone', 'lang'], 'required'],
            [['firstName', 'lastName', 'email', 'lang'], 'string'],
            [['personalCode', 'phone', 'active', 'isDead'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userId' => 'User ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'personalCode' => 'Personal Code',
            'phone' => 'Phone',
            'active' => 'Active',
            'isDead' => 'Is Dead',
            'lang' => 'Lang',
        ];
    }
}
