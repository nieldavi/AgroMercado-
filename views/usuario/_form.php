<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row" style="padding: 0px 0px 0px 0px">
      <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4" style="background-color: white; padding: 25px;">
        <div class="usuario-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nome')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'sobrenome')->textarea(['rows' => 1]) ?>

            

            <?= $form->field($model, 'endereco_id')->textInput() ?>

            <?= $form->field($model, 'email')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'senha')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'produtor')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
    <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>
