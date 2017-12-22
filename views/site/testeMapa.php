<?php
  use yii\helpers\Url; //ALTERAD
  $this->title = 'AgroMercado | Mapa';
?>

<div class="coordenadas">
  <span>Coordenadas Google Maps</span>
  <label for="lat">Lat:</label>
  <input type="text" name="lat" id="lat" value="0" />
  <label for="lng">Lng:</label>
  <input type="text" name="lng" id="lng" value="0" />
</div>
<div id="map-canvasss"/>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVQeyR68swH-QiAqCVnqXRXKgcv7z6FMM&sensor=false"/>
  <script type="text/javascript" src=map.js"></script>