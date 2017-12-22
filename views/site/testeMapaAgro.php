<?php
  use yii\helpers\Url; //ALTERAD

  //$this->registerJsFile('@web/startbootstrap-creative-gh-pages/jquery/jquery-ui.js');
  //$this->registerJsFile('@web/startbootstrap-creative-gh-pages/jQuery-ui_i18n.js');
  $this->registerCssFile('@web/startbootstrap-creative-gh-pages/mapa.css');
  $this->title = 'teste';
?>
<section class="sec" style="float: left;">
	<div class="row">
      	<div class="col-xs-12 col-sm-12" >                 
		  	<form method="post" >
			      <div class="form-group">
			        <label for="produtos">Produtos:</label>
			        <input type="text" name="produtos" class="form-control" placeholder="Produtos">
			      </div>
			      <div class="form-group">
			        <label for="produtor">Produtor:</label>
			        <input type="text" name="produtos" class="form-control" placeholder="Produtor">
			      </div>
			       <div class="form-group">
			        <label for="cidade">Cidade: </label>
			        <input type="text" name="cidade" class="form-control" placeholder="Cidade">
			      </div>
		    <div class="form-group">
		        <label for="estado">Estado:</label>
		        <select name="estado" class="form-control"> 
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
		        <option value="ro">Rondônia</option> 
		        <option value="rs">Rio Grande do Sul</option> 
		        <option value="rr">Roraima</option> 
		        <option value="sc">Santa Catarina</option> 
		        <option value="se">Sergipe</option> 
		        <option value="sp">São Paulo</option> 
		        <option value="to">Tocantins</option> 
		       </select>
	    </div>
	    <input class="btn btn-primary btn-xl page-scroll" type="submit" value="Pesquisar">
	</form>
</div>
</div>
</section>
<script>
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
</script>
<!--FIM DO SCRIPT DO FORMULÁRIO-->
<!--MAPA-->

<div id="map"></div>
<script>

  // The following example creates complex markers to indicate beaches near
  // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
  // to the base of the flagpole.

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: {lat: -6.2588691, lng: -36.5259705}
    });

    setMarkers(map);
  }

  // Data for the markers consisting of a name, a LatLng and a zIndex for the
  // order in which these markers should display on top of each other.
  var beaches = [
    ['IFRN', -6.2530397,-36.5361182, 1],
    ['Prefeitura', -6.26083333333,-36.5177777778, 2],
    //['Cronulla Beach', -34.028249, 151.157507, 3],
    //['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
    //['Maroubra Beach', -33.950198, 151.259302, 1]
  ];

  function setMarkers(map) {
    // Adds markers to the map.

    // Marker sizes are expressed as a Size of X,Y where the origin of the image
    // (0,0) is located in the top left of the image.

    // Origins, anchor positions and coordinates of the marker increase in the X
    // direction to the right and in the Y direction down.
    var image = {
      url: '<?=Url::to('@web//startbootstrap-creative-gh-pages/marcador.png')?>',
      // This marker is 20 pixels wide by 32 pixels high.
      size: new google.maps.Size(20, 32),
      // The origin for this image is (0, 0).
      origin: new google.maps.Point(0, 0),
      // The anchor for this image is the base of the flagpole at (0, 32).
      anchor: new google.maps.Point(0, 32)
    };
    // Shapes define the clickable region of the icon. The type defines an HTML
    // <area> element 'poly' which traces out a polygon as a series of X,Y points.
    // The final coordinate closes the poly by connecting to the first coordinate.
    var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18, 1],
      type: 'poly'
    };
    for (var i = 0; i < beaches.length; i++) {
      var beach = beaches[i];
      var marker = new google.maps.Marker({
        position: {lat: beach[1], lng: beach[2]},
        map: map,
        icon: image,
        shape: shape,
        title: beach[0],
        zIndex: beach[3],
      });
    }
  }
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVQeyR68swH-QiAqCVnqXRXKgcv7z6FMM&callback=initMap">
</script>
