<?php

        $hostLatitude = 38.562579;
        $hostLongitude = -84.401139; //union ky
        $migrantLatitude = 39.14300;
        $migrantLongitude = -84.203060;//montgomery
        $centerLatitude = ($hostLatitude + $migrantLatitude) /2;
        $centerLongitude = ($hostLongitude + $migrantLongitude)/ 2;
        $hostLike1 = "climbing";
        $hostLike2 = "soccer";
        $migrantLike1 = "movies";
        $migrantLike2 = "concert";
        $migrantEthnicity = "Italian";
        $likesHostArray = array($hostLike1, $hostLike2, $migrantLike1, $migrantLike2, $migrantEthnicity);
        $ideasArray = array();
    ?>
<!DOCTYPE html>
<html>
<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script><!-- Latest compiled and minified CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"><!-- Latest compiled and minified JavaScript -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<title></title>
</head>
<body>
<?php 
      foreach($likesHostArray as $like){
        $geocode = file_get_contents('https://maps.googleapis.com/maps/api/place/findplacefromtext/xml?input='.$like. '&inputtype=textquery&fields=formatted_address,name&locationbias=circle:30@'.$centerLatitude.',' . $centerLongitude.'&key=AIzaSyAhc-gJsL4DOC6hA4DUW-uZGLCR_vPDkSk');
        #print_r($geocode);
        $test = (array)simplexml_load_string($geocode);
        $test = (array)$test['candidates'];
        $ideasArray[] =  $test;
        #print_r($ideasArray);
         
      }
     # echo "<pre>";
      #print_r($geocode);
      #echo "</pre>";
      #json_decode($geocode)->candidates[0];?>
	<div class="container map-container">
		<div class="row">
			<div class="col-md-6" id="googleMap" style="height: 400px;"></div>
			<script>
        var geocoder;
                 function initMap()
                 {
                     var hostLocation = {lat: <?php echo $hostLatitude; ?>,lng: <?php echo $hostLongitude; ?>};
                     var migrantLocation =  {lat: <?php echo $migrantLatitude; ?>,lng: <?php echo $migrantLongitude; ?>};
                     var centerLocation = {lat: <?php echo $centerLatitude; ?>,lng: <?php echo $centerLongitude; ?>};
                     var map = new google.maps.Map(document.getElementById("googleMap"), {zoom: 4, center: centerLocation});
                     var likeMarkers = [-2000];
                     geocoder = new google.maps.Geocoder();
                     var array = JSON.parse('<?php echo json_encode($ideasArray); ?>')
                     //console.log(array);
                     for(var i = 0; i < <?php echo sizeOf($ideasArray) ?>; i++)
                     {
                        var address = array[i]['formatted_address'];
                        geocoder.geocode({'address' : address}, function(results, status){
                            likeMarkers.push(new google.maps.Marker({position: results[0].geometry.location, map: map}));
                        
                        });
                        
                     }
                     //var markerCenter = new google.maps.Marker({position: centerLocation, map: map});
                     var markerHost = new google.maps.Marker({position: hostLocation, map: map});
                     var markerMigrant = new google.maps.Marker({position: migrantLocation, map: map});
                     
                     
                     //place predictions
                     
<<<<<<< HEAD
                     
       
=======
                      var activity = 'climbing';
                    var location = 'Ohio';
        var displaySuggestions = function(predictions, status) {
          if (status != google.maps.places.PlacesServiceStatus.OK) {
            alert(status);
            return;
          }
>>>>>>> 92100b013f919a462186295e1ef1c86845cfff29


<<<<<<< HEAD
             for(var i = 0; i < <?php echo sizeof($ideasArray)?>; i++) {
                var divcard= document.createElement('div');
                divcard.setAttribute("class", "card");
                var divcardbody = document.createElement('div');
                divcardbody.setAttribute("class","card-body");
                divcardbody.appendChild(document.createTextNode(array[i]['name'] + " " + array[i]['formatted_address']));
                divcard.appendChild(divcardbody);
                document.getElementById("results").appendChild(divcard);
          }

          var service = new google.maps.places.AutocompleteService();
        
=======
        var service = new google.maps.places.AutocompleteService();
        service.getPlacePredictions({ input: activity }, displaySuggestions);
>>>>>>> 92100b013f919a462186295e1ef1c86845cfff29
      
                 }
			</script> 
			 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhc-gJsL4DOC6hA4DUW-uZGLCR_vPDkSk&libraries=places&callback=initMap"
        async defer></script>
          
          
			<div class= "col-md-6 info" id = "results">
			</div>
		</div>
	</div>
</body>
</html>