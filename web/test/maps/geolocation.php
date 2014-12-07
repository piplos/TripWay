<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        console.log(navigator);
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geocoder = new google.maps.Geocoder();
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var latlng = new google.maps.LatLng(lat, lng);

                geocoder.geocode({'latLng': latlng}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            console.log(results);
                            $('body').html('<h1>' + results[0].formatted_address + '</h1>');
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
                });

            }, function() {

            });
        } else {
            console.log(false);
        }
    </script>
</head>
<body>

</body>
</html>