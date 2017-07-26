<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170725_151708_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        /* 
			"userId": "7521",
			"firstName": "Ullalaa",
			"lastName": "Ziip",
			"email": "ulallaaa@mldllm.tt",
			"personalCode": "49005025465",
			"phone": "50170262",
			"active": "1",
			"isDead": "0",
			"lang": "est"
		*/
		$tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }
 
          $this->createTable('{{%users}}', [
              'userId' => Schema::TYPE_PK,
              'firstName' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
              'lastName' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
              'email' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
              'personalCode' => Schema::TYPE_INTEGER . ' NOT NULL',
              'phone' => Schema::TYPE_INTEGER . ' NOT NULL',
              'active' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
              'isDead' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',              
              'lang' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
          ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
		$this->dropTable('{{%users}}');
    }
}
