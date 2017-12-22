[
	{
		"id":18,
		"nome":"Igna",
		"telefone":null,
		"latitude":null,
		"longitude":null
	},
	{"id":19,"nome":"Jv","telefone":null,"latitude":null,"longitude":null},
	{"id":20,"nome":"João","telefone":null,"latitude":-6.2534,"longitude":-36.5134},
	{"id":21,"nome":"Eu","telefone":null,"latitude":-6.26725,"longitude":-36.5137},
	{"id":22,"nome":"Eu","telefone":null,"latitude":-6.26197,"longitude":-36.5219}
]

function plotarMapa(json){
      $.each(json, function(index,produtor){
        alert(JSON.stringify(produtor));
/*
        var contentString = '...';

        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          title: 'Uluru (Ayers Rock)'
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });*/
      });
      
    }