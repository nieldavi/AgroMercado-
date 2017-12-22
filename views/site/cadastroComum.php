<?php
use yii\helpers\Html;
?>
<?=Html::hiddenInput(Html::getInputName($model,'tipo'),'cliente')?>
<?= $form->field($model, 'nome')->textInput(['maxlength' => 200,
'placeholder'=>'Nome'
]) ?>

<?= $form->field($model, 'sobrenome')->textInput(['maxlength' => 200,
'placeholder'=>'Sobrenome'
]) ?>	

<?= $form->field($model, 'email')->textInput(['maxlength' => 100,
'placeholder'=>'Email'
]) ?>

<?= $form->field($endereco, 'endereco')->textInput(['maxlength' => 200,
'placeholder'=>'Endereco'
]) ?>

<?= $form->field($endereco, 'numero')->textInput(['maxlength' => 15,
'placeholder'=>'Numero'
]) ?>

<?= $form->field($endereco, 'bairro')->textInput(['maxlength' => 200,
'placeholder'=>'Bairro'
]) ?>

<?= $form->field($endereco, 'cidade')->textInput(['maxlength' => 200,
'placeholder'=>'Cidade'
]) ?>

<?= $form->field($endereco, 'cep')->textInput(['maxlength' => 9,
'placeholder'=>'CEP'
]) ?>

<?= $form->field($endereco, 'estado')->textInput(['maxlength' => 45,
'placeholder'=>'Estado'
]) ?>

<?= $form->field($endereco, 'pais')->textInput(['maxlength' => 100,
'placeholder'=>'País'
]) ?>

<?= $form->field($model, 'login')->textInput(['maxlength' => 15,
'placeholder'=>'Login'
]) ?>

<?= $form->field($model, 'senha')->passwordInput(['maxlength' => 45,
'placeholder'=>'Senha'
]) ?>