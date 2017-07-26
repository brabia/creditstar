<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loans".
 *
 * @property integer $loanId
 * @property integer $userId
 * @property double $amount
 * @property double $interest
 * @property integer $duration
 * @property integer $dateApplied
 * @property integer $dateLoanEnds
 * @property integer $campaign
 * @property integer $status
 */
class Loans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'amount', 'interest', 'duration', 'dateApplied', 'dateLoanEnds', 'campaign', 'status'], 'required'],
            [['userId', 'duration', 'dateApplied', 'dateLoanEnds', 'campaign', 'status'], 'integer'],
            [['amount', 'interest'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loanId' => 'Loan ID',
            'userId' => 'User ID',
            'amount' => 'Loan principal',
            'interest' => 'Cost of loan',
            'duration' => 'Total according to schedule',
            'dateApplied' => 'Date Applied',
            'dateLoanEnds' => 'Payment Deadlines',
            'campaign' => 'Campaign',
            'status' => 'Status',
        ];
    }
	
	public function getUserId() {
		$foundUsers = Users::find()
		->where(['active' => 1])
		->all();
		$users = [];
		foreach($foundUsers as $foundUser) {
			$users[$foundUser['userId']] = $foundUser['userId'].' - '.$foundUser['firstName'].' '.$foundUser['lastName'];
		}
		return $users;
    }
}
