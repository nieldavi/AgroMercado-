<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;

$css=<<<css
@media (min-width:768px){
.navbar-default.affix-top {
    background-color: transparent!important;
}
.navbar-default.affix {
    background-color: white!important;
}
.navbar-default .nav>li>a,.navbar-default .nav>li>a:focus{
    color:#8dbf41;
}
.navbar-default .navbar-header .navbar-brand{
    color:#8dbf41;
}
}
@media (max-width:640px){
#mainNav {
    background-color: #449d44!important;
}
}
css;
$this->registerCss($css);
?>
<section style="background-image:url(../web/startbootstrap-creative-gh-pages/img/agroecologia.jpg); background-position:center; background-size:cover;color: black; height: 100%;">
    <div class="row" style="padding: 80px 0px 0px 0px">
      <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4" style="background-color: white; padding: 25px;">
            <div class="site-login">
                <h1><?= Html::encode($this->title) ?></h1>

                <!--<p>Please fill out the following fields to login:</p>-->

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-lg-offset-0 col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?>

                    <!--DUVIDA-->
                    <!--COMO COLOCAR TEXTO PARA REFERENCIAR-->
                    
                    
                    <div class="form-group">
                        <div class="col-lg-offset-0 col-lg-11">
                            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-default', 'style' => 'background-color: #8dbf41', 'name' => 'login-button']) ?>
                        </div>
                    </div>                    

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
