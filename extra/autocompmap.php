
<!DOCTYPE html>
<html>
  <head>
    <title>Google Maps JavaScript API v3 Example: Places Autocomplete</title>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

    <style>
      body {
        font-family: sans-serif;
        font-size: 14px;
      }
      #map {
        height: 400px;
        width: 600px;
        margin-top: 0.6em;
      }
      input {
        border: 1px solid  rgba(0, 0, 0, 0.5);
      }
      input.notfound {
        border: 2px solid  rgba(255, 0, 0, 0.4);
      }
    </style>

    <script>
	var lat;
	var long;
      function initialize() {
		  
	
		 var pyrmont = new google.maps.LatLng(33.8688,151.2195);

        map = new google.maps.Map(document.getElementById('map'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center:pyrmont ,
          zoom: 15
        });
        
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          input.className = '';
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // Inform the user that the place was not found and return.
            input.className = 'notfound';
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          var image = new google.maps.MarkerImage(
              place.icon,
              new google.maps.Size(71, 71),
              new google.maps.Point(0, 0),
              new google.maps.Point(17, 34),
              new google.maps.Size(35, 35));
          marker.setIcon(image);
          marker.setPosition(place.geometry.location);
		  

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
						
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        
            alert(address);
			
			 lat=place.geometry.location.lat();
		     long=place.geometry.location.lng();
			 
			var map1=new google.maps.LatLng(lat,long);
			  var service = new google.maps.places.PlacesService(map);
			 var request = {
          location:map1,
          radius: 1000,
          types: ['hospital']
        };
		 alert(request.location);
		     marker.setMap(map);

        infowindow = new google.maps.InfoWindow();
      
        service.nearbySearch(request, callback);
		});
       
			    
      }
	   function callback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
			
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
	          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
			

          infowindow.setContent('<strong>' + place.name + '</strong>');
         
          infowindow.open(map, this);
        });
      }
	 
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div>
      <input id="searchTextField" type="text" size="50" >
     
     
    </div>
    
    <div id="map"></div>
  </body>
</html>
