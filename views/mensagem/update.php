<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mensagem */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Mensagem',
]) . $model->mensagem_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mensagems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mensagem_id, 'url' => ['view', 'id' => $model->mensagem_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="mensagem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
