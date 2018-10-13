<?php

    $hostLatitude = 38.562579;
    $hostLongitude = -84.401139; //union ky
    $migrantLatitude = 39.14300;
    $migrantLongitude = -84.203060;//montgomery
    $centerLatitude = 0;
    $centerLongitude = 0;

    if($hostLatitude > $migrantLatitude)
    {
        $centerLatitude = $hostLatitude - ($hostLatitude - $migrantLatitude);
    }
    else
    {
        $centerLatitude = $migrantLatitude + ($hostLatitude - $migrantLatitude);
    }

    if($hostLongitude > $migrantLongitude)
    {
        $centerLongitude = $hostLongitude - ($hostLongitude - $migrantLongitude);
    }
    else
    {
        $centerLongitude = $migrantLongitude + ($hostLongitude- $migrantLongitude);
    }

?>
<html>
    <head>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        
   
    </head>
    <div class = "map-container">
        <div class="row">
            <div class = "col-md-6">
                <div class="google-map">
                    <script>
                        function initMap()
                        {
                            var hostLocation = {lat: "<?php echo $hostLatitude; ?>",lng: "<?php echo $hostLongitude; ?>"};
                            var migrantLocation =  {lat: "<?php echo $migrantLatitude; ?>",lng: "<?php echo $migrantLongitude; ?>"};
                            var centerLocation = {lat: "<?php echo $centerLatitude; ?>",lng: "<?php echo $centerLongitude; ?>"};
                            var map = new gooogle.maps.Map(document.getElementsByClassName("google-map"), {zoom: 4, center: centerLocation});
                            var markerCenter = new google.maps.Marker({position: centerLocation, map: map});
                            var markerHost = new google.maps.Marker({position: centerLocation, map: map});
                            var markerMigrant = new google.maps.Marker({position: migrantLocation, map: map});
                        }
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AlzaSyAhc-gJsL4DOC6hA5DUW-uZGLCR_vPDkSk&call"></script>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info">
                    
                </div>
            </div>
        </div>
    </div>
</html>