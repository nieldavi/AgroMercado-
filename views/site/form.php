<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => 200,
'placeholder'=>'Nome'
]) ?>

<?= $form->field($model, 'sobrenome')->textInput(['maxlength' => 200,
'placeholder'=>'Sobrenome'
]) ?>

<?= $form->field($model, 'endereco')->textInput(['maxlength' => true,
'placeholder'=>'Endereco'
]) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true,
'placeholder'=>'Email'
]) ?>

<?= $form->field($model, 'login')->textInput(['maxlength' => 15,
'placeholder'=>'Login'
]) ?>

<?= $form->field($model, 'senha')->passwordInput(['maxlength' => true,
'placeholder'=>'Senha'
]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Criar') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
