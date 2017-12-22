<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioProduto */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Usuario Produto',
]) . $model->produto_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuario Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->produto_id, 'url' => ['view', 'id' => $model->produto_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="usuario-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
