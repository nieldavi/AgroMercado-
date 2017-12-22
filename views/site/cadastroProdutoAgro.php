<?php
 use yii\helpers\Url; //ALTERAD
 use yii\helpers\Html;
use yii\widgets\ActiveForm;

 $this->title = 'AgroMercado | Cadastrar produtos';
 ?>
<section style="color: black;">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'nome')->textInput(['maxlength' => 150, 'placeholder'=>'Nome do produto']) ?>
                <?= $form->field($model, 'descricao')->textInput(['maxlength' => 500, 'placeholder'=>'Descrição do produto']) ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Cadastro') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?> 
        </div>
    </div>
</section>
