<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `loans`.
 */
class m170725_162653_create_loans_table extends Migration
{
    /*
		"loanId": "36470",
		"userId": "7521",
		"amount": "300.0000",
		"interest": "15.0000",
		"duration": "30",
		"dateApplied": "1436313600",
		"dateLoanEnds": "1444089600",
		"campaign": "7",
		"status": "1"
	*/
	/**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }
 
          $this->createTable('{{%loans}}', [
              'loanId' => Schema::TYPE_PK,
              'userId' => Schema::TYPE_INTEGER . ' NOT NULL',
              'amount' => Schema::TYPE_FLOAT  . ' NOT NULL',
              'interest' => Schema::TYPE_FLOAT  . ' NOT NULL',
              'duration' => Schema::TYPE_INTEGER  . ' NOT NULL',
              'dateApplied' => Schema::TYPE_INTEGER  . ' NOT NULL',
              'dateLoanEnds' => Schema::TYPE_INTEGER  . ' NOT NULL',
              'campaign' => Schema::TYPE_INTEGER  . ' NOT NULL',
              'status' => Schema::TYPE_INTEGER  . ' NOT NULL'
          ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%loans}}');
    }
}
