<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <?php
	$users = json_decode(file_get_contents('./json/users.json'), true);


	Yii::$app
	->db
	->createCommand('DELETE FROM users')
	->execute();
			
	Yii::$app
	->db
	->createCommand()
	->batchInsert('users',
	[
		'userId',
		'firstName',
		'lastName',
		'email',
		'personalCode',
		'phone',
		'active',
		'isDead',
		'lang'
	], $users)->execute();
	echo '[ '.count($users).' ] users .. OK !';
	Yii::$app->response->redirect(['/users']);
	?>	
</div>
