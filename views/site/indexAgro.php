<?php
 use yii\helpers\Url; //ALTERAD

 $this->title = 'AgroMercado';

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
<header>
         <!--<div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Logo AgroMercado</h1>
                <hr>
                <p>Descrição sobre o AgroMercado (opcional)</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Veja mais</a>
            </div>
        </div>-->
        <div class="header-content" style="top:90%;">
            <div class="header-content-inner" style=" max-width:1330px">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        <a href="<?=Url::to('?r=site/cadastro')?>" class="btn btn-primary btn-xl page-scroll">Cadastre-se</a>
                        <a href="<?=Url::to('?r=site/login')?>" class="btn btn-primary btn-xl page-scroll">Faça seu login</a>
                        <a href="<?=Url::to('?r=site/mapa')?>" class="btn btn-primary btn-xl page-scroll">Nosso mapa</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Nós temos o que você precisa!</h2>
                    <hr class="light">
                    <p class="text-faded">O que nós temos e podemos oferecer</p>
                    <hr>
                    <p class="text-faded">O que nós temos e podemos oferecer</p>
                    <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Veja!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nossos serviços</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <a href="https://www.facebook.com/agrocruzpovoado/" target="_blank" title="Facebook"><i class="fa fa-4x fa-facebook-square text-primary sr-icons"></i></a>
                        <h3>Rede social</h3>
                        <p class="text-muted">Visite nossa Fanpage.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Notícias</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-users text-primary sr-icons"></i>
                        <h3>Nosso grupo</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>