<?php
use yii\helpers\Html;
?>
<?=Html::hiddenInput(Html::getInputName($model,'tipo'),'produtor')?>

<?= $form->field($endereco, 'latitude')->textInput(['maxlength' => true,
'placeholder'=>'Latitude'
]) ?>

<?= $form->field($endereco, 'longitude')->textInput(['maxlength' => true,
'placeholder'=>'Longitude'
]) ?>