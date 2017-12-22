<?= $form->field($model, 'username')->textInput()->hint('Please enter your name')->label('Name') ?>

//Usuário
<?= $form->field($model, 'bairro')->textInput(['maxlength' => true,
'placeholder'=>'Bairro'
]) ?>

<?= $form->field($model, 'cidade')->textInput(['maxlength' => true,
'placeholder'=>'Cidade'
]) ?>

<?= $form->field($model, 'cep')->textInput(['maxlength' => 9,
'placeholder'=>'CEP'
]) ?>

<?= $form->field($model, 'estado')->textInput(['maxlength' => true,
'placeholder'=>'Estado'
]) ?>


<!--Códigos de minhaConta-->

@media (min-width:768px){
#mainNav {
    background-color: transparent!important;
}
.navbar-default .nav>li>a,.navbar-default .nav>li>a:focus{
    color:#8dbf41;
}
.navbar-default .navbar-header .navbar-brand{
    color:#8dbf41;
}
}

<div class="form-group">
  <label for="imagem">Imagem de perfil:</label>
  <input type="file" name="imagem">
</div>
