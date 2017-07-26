<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Loans */

$this->title = 'Import Loans';
$this->params['breadcrumbs'][] = ['label' => 'Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loans-create">

    <h1><?= Html::encode($this->title) ?><small> loans.json will be imported</small></h1>

    <?= $this->render('_formImport', [
        'model' => $model,
    ]) ?>

</div>
