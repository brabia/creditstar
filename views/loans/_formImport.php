<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <?php
	$loans = json_decode(file_get_contents('./json/loans.json'), true);


	Yii::$app
	->db
	->createCommand('DELETE FROM loans')
	->execute();
			
	Yii::$app
	->db
	->createCommand()
	->batchInsert('loans',
	[
		'loanId',
		'userId',
		'amount',
		'interest',
		'duration',
		'dateApplied',
		'dateLoanEnds',
		'campaign',
		'status'
	], $loans)->execute();
	echo '[ '.count($loans).' ] Loans .. OK !';
	Yii::$app->response->redirect(['/loans']);
	?>
</div>
