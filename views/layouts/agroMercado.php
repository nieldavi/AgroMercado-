<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AgroMercadoAsset; //ALTERADO
use yii\helpers\Url; //ALTERADO

AgroMercadoAsset::register($this); //ALTERADO
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">  <!--ALTERADO-->

<head>
    
    <meta charset="<?= Yii::$app->charset ?>"> <!--ALTERADO-->
    <!--ALTERADO-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--<link rel="stylesheet" href="site.css">
    <link rel="shortcut icon" href="img/iconee.ico">-->
    <!--<script src="jquery-3.2.1.min.js"></script>-->

    <title>AgroMercado</title>

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</head>

<body id="page-top">

    <?php $this->beginBody() ?>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?=Url::to('?r=site/index')?>">AgroMercado</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="<?=Url::to('?r=site/index')?>">Capa</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=Url::to('?r=site/quem-somos')?>">Quem somos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=Url::to('?r=site/mapa')?>">Nossos produtores</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contato</a>
                    </li>
                    
                    <!--Se o usuário estiver logado-->
            <?php
            if (!Yii::$app->user->isGuest) {
                ?>
                    <li>
                        <a class="page-scroll" href="<?=Url::toRoute('site/conta')?>">Minha conta</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=Url::toRoute('site/logout')?>">Sair</a>
                    </li>
                <?php
            }
            ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <?=$content?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>