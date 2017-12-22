<?php
  use yii\helpers\Url; //ALTERAD

  //$this->registerJsFile('@web/startbootstrap-creative-gh-pages/jquery/jquery-ui.js');
  //$this->registerJsFile('@web/startbootstrap-creative-gh-pages/jQuery-ui_i18n.js');
  $this->registerCssFile('@web/startbootstrap-creative-gh-pages/mapa.css');
  $this->title = 'AgroMercado | Mapa';
?>
  <section id="pesquisaMapa">  
    <div class="col-xs-12 col-sm-11.5 col-sm-offset-0.5" >   

      <form method="post" action="<?=Url::to('?r=site/json-produtores')?>" >
          <div class="form-group">
            <label for="produtos">Produtos:</label>
            <input type="text" id="inProdutos" name="produtos" class="form-control" placeholder="Produtos">
          </div>
          <div class="form-group">
            <label for="produtor">Produtor:</label>
            <input type="text" id="inProdutor" name="produtos" class="form-control" placeholder="Produtor">
          </div>
           <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" id="inCidade" name="cidade" class="form-control" placeholder="Cidade">
          </div>
          <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id="inEstado" class="form-control">
            <option value="selecione">Selecione</option>
            <option value="ac">Acre</option> 
            <option value="al">Alagoas</option> 
            <option value="am">Amazonas</option> 
            <option value="ap">Amapá</option> 
            <option value="ba">Bahia</option> 
            <option value="ce">Ceará</option> 
            <option value="df">Distrito Federal</option> 
            <option value="es">Espírito Santo</option> 
            <option value="go">Goiás</option> 
            <option value="ma">Maranhão</option> 
            <option value="mt">Mato Grosso</option> 
            <option value="ms">Mato Grosso do Sul</option> 
            <option value="mg">Minas Gerais</option> 
            <option value="pa">Pará</option> 
            <option value="pb">Paraíba</option> 
            <option value="pr">Paraná</option> 
            <option value="pe">Pernambuco</option> 
            <option value="pi">Piauí</option> 
            <option value="rj">Rio de Janeiro</option> 
            <option value="rn">Rio Grande do Norte</option> 
            <option value="rs">Rio Grande do Sul</option> 
            <option value="ro">Rondônia</option> 
            <option value="rr">Roraima</option> 
            <option value="sc">Santa Catarina</option> 
            <option value="sp">São Paulo</option> 
            <option value="se">Sergipe</option> 
            <option value="to">Tocantins</option> 
           </select>
          </div>
           <!-- <input class="btn btn-primary btn-xl page-scroll" type="submit" value="Pesquisar"> -->
           <!-- <br/><br/> -->
          </form>
          <input id="pesquisar" class="btn btn-primary btn-xl page-scroll" type="submit" value="Pesquisar">
    </div>
  </section>
  <!--FIM DO FORMULÁRIO-->
  <!--SCRIPT DO FORMULÁRIO-->
  <!-- <script>
    $( "#produtos" ).autocomplete({
        source: produtos,
        minLength: 3
    });
    $( "#produtor" ).autocomplete({
        source: produtor,
        minLength: 3
    });

    $( "#cidade" ).autocomplete({
        source: cidade,
        minLength: 3
    });
  </script>-->
  <!--FIM DO SCRIPT DO FORMULÁRIO-->
  <!--MAPA-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <div id="map" class="col-xs-12 col-sm-12 container-agro"></div>

  <script>
    $("#pesquisar").click(function(){
      
      $.getJSON(montarGet(), function( json ) {
      //$.getJSON( "http://localhost/AgroMercado/web/index.php?r=site/json-produtores", function( json ) {
        
        //alert(JSON.stringify(json));
        plotarMapa(json);
      });
    }); 

    function montarGet(){
      var produto = $("#inProdutos").val();
      var produtor = $("#inProdutor").val();
      var cidade = $("#inCidade").val();
      var estado = $("#inEstado").val();
      
      var url = "<?=Url::to('?r=site/json-produtores')?>"+"&produto="+produto+"&produtor="+produtor+"&cidade="+cidade+"&estado="+estado;
      
      //alert(msg);
      return url;
    }  

    function plotarMapa(json){
      $.each(json, function(index,produtor){

        var contentString = "<b>"+produtor.nome+" "+produtor.sobrenome+"<br/>Endereço: </b>"+produtor.endereco;
        var local = {lat: produtor.latitude, lng: produtor.longitude};

        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 400
        });

        var marker = new google.maps.Marker({
          position: local,
          map: map,
          title: produtor.nome
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
/*        */
      });
      
    }


    // The following example creates complex markers to indicate beaches near
    // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
    // to the base of the flagpole.

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {lat: -6.244316, lng: -36.340027}
      });

      //setMarkers(map);
    }

    // Data for the markers consisting of a name, a LatLng and a zIndex for the
    // order in which these markers should display on top of each other.
    //var beaches = [
      //['IFRN', -6.2530397,-36.5361182, 1],
      //['Prefeitura', -6.26083333333,-36.5177777778, 2],
      //['Cronulla Beach', -34.028249, 151.157507, 3],
      //['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      //['Maroubra Beach', -33.950198, 151.259302, 1]
    //];

    
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVQeyR68swH-QiAqCVnqXRXKgcv7z6FMM&callback=initMap">
  </script>

