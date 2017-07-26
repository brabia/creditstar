<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Import Loans', ['import'], ['class' => 'btn btn-success btn-import']) ?>
		<?= Html::a('Create Loans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dateLoanEnds',
            // 'loanId',
            // 'userId',
            'amount',
            'interest',
            'duration',
            // 'dateApplied',
            // 'campaign',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	
	<p>
        <?= Html::a('vaatan saldoseisu', ['create'], ['class' => 'creditstar-btn btn-creditstar-green']) ?>
        <?= Html::a('maksan volgnevuse', ['create'], ['class' => 'creditstar-btn btn-creditstar-red']) ?>
        <?= Html::a('maksan kogu laenu uhe maksega', ['create'], ['class' => 'creditstar-btn btn-creditstar-red']) ?>
    </p>
</div>
