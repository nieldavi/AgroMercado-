<?php
 use yii\helpers\Url; //ALTERAD
 use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->registerCssFile('@web/startbootstrap-creative-gh-pages/css/style.css');

 $this->title = 'AgroMercado | Cadastre-se';
?>
<section style="color: black;">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
      <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active" style="width: 50%"><a href="#CadastroCliente" aria-controls="CadastroCliente" role="tab" data-toggle="tab">Cliente</a></li>
          <li role="presentation" style="width: 50%"><a href="#CadastroProdutor" aria-controls= "CadastroProdutor" role="tab" data-toggle="tab">Produtor</a></li>
      </ul>

      <div class="tab-content col-sm-8 col-sm-offset-2">
        <div role="tabpanel" class="tab-pane active" id="CadastroCliente">
          </br>
          </br>
          <?php $form = ActiveForm::begin(); ?>
            <?=$this->render('cadastroComum',[
              'form'=>$form,
              'model'=>$model,
              'endereco'=>$endereco
            ]);?>
            <?=$this->render('cliente',[
              'form'=>$form,
              'model'=>$model
            ]);?>

            <div class="form-group">
              <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
          <?php ActiveForm::end(); ?>    
        </div>

        <div role="tabpanel" class="tab-pane" id="CadastroProdutor">
          </br>
          </br>
          <?php $form = ActiveForm::begin(); ?>
          <?=$this->render('cadastroComum',[
            'form'=>$form,
            'model'=>$model,
            'endereco'=>$endereco
          ]);?>
          <?=$this->render('produtor',[
            'form'=>$form,
            'model'=>$model,
            'endereco'=>$endereco
          ]);?>

          <div class="form-group">
              <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          </div>
          <?php ActiveForm::end(); ?>
        </div>
      </div>
      <!--<input id="pesquisar" class="btn btn-primary btn-xl page-scroll" type="submit" value="p">-->
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
   $('#myTabs a[href="#CadastroCliente"]').tab('show')
   $('#myTabs a[href="#CadastroProdutor"]').tab('show') 
</script>

<script>
  $("#CadastroProdutor").find("#usuario-login").focus(function(){
  //$("button").click(function(){
    $.getJSON(montarGetGeoCode(), function( json ) {        
      //alert(JSON.stringify(json));
      $("#endereco-latitude").val(json.results[0].geometry.location.lat);
      $("#endereco-longitude").val(json.results[0].geometry.location.lng);
    });
  }); 

  function montarGetGeoCode(){
    var endereco = $("#CadastroProdutor").find("#endereco-endereco").val();
    var numero = $("#CadastroProdutor").find("#endereco-numero").val();
    var bairro = $("#CadastroProdutor").find("#endereco-bairro").val();
    var cidade = $("#CadastroProdutor").find("#endereco-cidade").val();
    var estado = $("#CadastroProdutor").find("#endereco-estado").val();

    var enderecoURL = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDVQeyR68swH-QiAqCVnqXRXKgcv7z6FMM&new_forward_geocoder=true&';
    enderecoURL = enderecoURL+'address='+endereco+','+numero+','+bairro+','+cidade+','+estado;
    //alert(enderecoURL);
    return enderecoURL;
  }
</script>


  