<?php
 use yii\helpers\Url; //ALTERAD

 $this->title = 'AgroMercado | Produtos';
 ?>
 <section style="float: left; width: 20%">
        <div class="row" >
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-2">
            </div>
        </div>
</section>
    <section id="about" style="color: black; float: right; width: 80%">
            <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10">
                <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active" style="width: 50%"><a href="#Produtos" aria-controls="Produtos" role="tab" data-toggle="tab">Produtos</a></li>
                        <li role="presentation" style="width: 50%"><a href="#Galeria" aria-controls= "Galeria" role="tab" data-toggle="tab">Galeria</a></li>
                    </ul>

                    <div class="tab-content col-sm-9 col-sm-offset-1">
                        <div role="tabpanel" class="tab-pane active" id="Produtos">
                            <div class="col-xs-6 col-md-3 text-center">
                                <a class="thumbnail"><img src='<?=Url::to('@web/startbootstrap-creative-gh-pages/FotosAgroCruz/5.jpg')?>'></a>
                                <label for="text">Jerimum de leite</label>
                            </div>
                            <div class="col-xs-6 col-md-3 text-center">
                                <a href="#" class="thumbnail"><img src='<?=Url::to('@web/startbootstrap-creative-gh-pages/FotosAgroCruz/4.jpg')?>'></a>
                                <label for="text">Feijão verde</label>
                            </div>
                            <div class="col-xs-6 col-md-3 text-center">
                                <a href="#" class="thumbnail"><img src='<?=Url::to('@web/startbootstrap-creative-gh-pages/FotosAgroCruz/3.jpg')?>'></a>
                                <label for="text">Tomate</label>
                            </div>
                            <div class="col-xs-6 col-md-3 text-center">
                                <a href="#" class="thumbnail"><img src='<?=Url::to('@web/startbootstrap-creative-gh-pages/FotosAgroCruz/2.jpg')?>'></a>  
                                <label for="text">Tomate</label> 
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </section>
        <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

    <script type="text/javascript">
       $('#myTabs a[href="#CadastroCliente"]').tab('show')
       $('#myTabs a[href="#CadastroProdutor"]').tab('show') 
    </script>