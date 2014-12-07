<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript">
        var map;
        var marker; // only one
        var city = 1; // first city id
        var cities = [];
        var type_id = 'type_id';

        function initialize() {
            var featureOpts = [
                {
                    elementType: 'labels',
                    stylers: [
                        { visibility: 'off' }
                    ]
                },
                {
                    featureType: 'road',
                    elementType: 'all',
                    stylers: [
                        { visibility: 'off' }
                    ]
                },
                {
                    featureType: "administrative.country",
                    stylers: [
                        { visibility: 'on' }
                    ]
                }

            ];
            var center = new google.maps.LatLng(53.452062, 16.198032);
            var mapOptions = {
                center: center,
                zoom: 6,
                disableDoubleClickZoom: true,
                draggable: true,
                scrollwheel: true,
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                draggableCursor: 'pointer',

                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, type_id]
                },
                mapTypeId: type_id

            };

            map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var styledMapOptions = {
                name: 'Intro style'
            };

            var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

            map.mapTypes.set(type_id, customMapType);


            google.maps.event.addListener(map, 'click', function(e){
                addMarker(e.latLng);
            });

            google.maps.event.addListener(tipOk, 'closeclick', function(e){
                marker.setMap(null);
            });
        }

        var contentTipOk = '<button onclick="addCity()">Are you sure?</button>';
        var tipOk = new google.maps.InfoWindow({
            content: contentTipOk,
            disableAutoPan: false
        });

        var image = {
            url: 'https://cdn3.iconfinder.com/data/icons/digital-marketing/512/flag_pin_goal_complete_flat_icon-512.png',
            scaledSize: new google.maps.Size(46, 46),
            anchor: new google.maps.Point(5, 44)

        }

        function addMarker(location) {

            if (typeof marker !== 'undefined') {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position: location,
                map: map,
                icon: image,
                title : 'This city'
            });
            tipOk.open(map,marker);
            console.log(cities);

        }

        function addCity() {
            cities.push([city, marker.getPosition()]);
            city++;
            tipOk.close();
            marker.setMap();
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <style type="text/css">
        #map {
            width: 100%;
            height: 800px;
        }
        button {
            background-color: #34495e;
            border: none;
            color: #fff;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:active {
            margin-top: 1px;
            padding-top: 10px;
            padding-bottom: 9px;
            outline: none;
        }
    </style>
</head>
<body>
<div id="map"></div>

</body>
</html>