<?php

    $hostLatitude = 38.562579;
    $hostLongitude = -84.401139; //union ky
    $migrantLatitude = 39.14300;
    $migrantLongitude = -84.203060;//montgomery
    $centerLatitude = ($hostLatitude + $migrantLatitude) /2;
    $centerLongitude = $hostLongitude - ($hostLongitude - $migrantLongitude);
?>
<html>
    <head>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
   
    </head>
 <!--<div class = "map-container">
        <div class="row">
            <div class = "col-md-6">-->
            <div id="googleMap" style="width:80%;height:400px;"></div>
                    <script>
                        function initMap()
                        {
                            var hostLocation = {lat: <?php echo $hostLatitude; ?>,lng: <?php echo $hostLongitude; ?>};
                            var migrantLocation =  {lat: <?php echo $migrantLatitude; ?>,lng: <?php echo $migrantLongitude; ?>};
                            var centerLocation = {lat: <?php echo $centerLatitude; ?>,lng: <?php echo $centerLongitude; ?>};
                            var map = new google.maps.Map(document.getElementById("googleMap"), {zoom: 4, center: centerLocation});
                            var markerCenter = new google.maps.Marker({position: centerLocation, map: map});
                            var markerHost = new google.maps.Marker({position: hostLocation, map: map});
                            var markerMigrant = new google.maps.Marker({position: migrantLocation, map: map});
                        }
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhc-gJsL4DOC6hA4DUW-uZGLCR_vPDkSk&callback=initMap"></script>
                
           <!-- </div>
            <div class="col-md-6">
                <div class="info">
                    
                </div>
            </div>
        </div>
    </div>-->
</html>