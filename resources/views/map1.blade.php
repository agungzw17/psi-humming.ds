<!DOCTYPE html>
<html>
<head>
    <title>Google Simple Map API Hacking</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */

        #map {
            height: 300px;
            width: 600px;
        }
    /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<header>
    <button class="start-hack">Hack it now !</button>
    <button class="stop-hack">Disable hack</button>
</header>
<div id="map"></div>

<div id="map"></div>
<div id="latclicked" style="text-align: center"></div>
<div id="longclicked" style="text-align: center"></div>

<div id="latmoved"></div>
<div id="longmoved"></div>

<div style="padding:10px">
    <div id="map"></div>
</div>

<script type="text/javascript">
    var map;

    function initMap() {
        var latitude = -7.7955798; // YOUR LATITUDE VALUE
        var longitude = 110.3694896; // YOUR LONGITUDE VALUE

        var myLatLng = {lat: latitude, lng: longitude};

        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 14,
            disableDoubleClickZoom: true, // disable the default map zoom on double click
        });

        // Update lat/long value of div when anywhere in the map is clicked
        google.maps.event.addListener(map,'click',function(event) {
            document.getElementById('latclicked').innerHTML = event.latLng.lat();
            document.getElementById('longclicked').innerHTML =  event.latLng.lng();
        });


        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            //title: 'Hello World'

            // setting latitude & longitude as title of the marker
            // title is shown when you hover over the marker
            title: latitude + ', ' + longitude
        });

        // Update lat/long value of div when the marker is clicked
        marker.addListener('click', function(event) {
            document.getElementById('latclicked').innerHTML = event.latLng.lat();
            document.getElementById('longclicked').innerHTML =  event.latLng.lng();
        });

        // Create new marker on double click event on the map
        google.maps.event.addListener(map,'dblclick',function(event) {
            var marker = new google.maps.Marker({
                position: event.latLng,
                map: map,
                title: event.latLng.lat()+', '+event.latLng.lng()
            });

            // Update lat/long value of div when the marker is clicked
            marker.addListener('click', function() {
                document.getElementById('latclicked').innerHTML = event.latLng.lat();
                document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            });
        });

        // Create new marker on single click event on the map
        /*google.maps.event.addListener(map,'click',function(event) {
            var marker = new google.maps.Marker({
              position: event.latLng,
              map: map,
              title: event.latLng.lat()+', '+event.latLng.lng()
            });
        });*/
    }
</script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIJ9XX2ZvRKCJcFRrl-lRanEtFUow4piM&callback=initMap"
        async defer></script>
<script>
    (() => {
        "use strict";

        const hackSetter = (value) => () => {
            window.name = value;
            history.go(0)
        };

        const startBtn = document.querySelector('.start-hack');
        const stopBtn = document.querySelector('.stop-hack');

        startBtn.addEventListener('click', hackSetter(), false);
        stopBtn.addEventListener('click', hackSetter('nothacked'), false);

        if (name === 'nothacked') {
            stopBtn.disabled = true;
            return;
        }

        startBtn.disabled = true;

        // Store old reference
        const appendChild = Element.prototype.appendChild;

        // All services to catch
        const urlCatchers = [
            "/AuthenticationService.Authenticate?",
            "/QuotaService.RecordEvent?"
        ];

        // Google Map is using JSONP.
        // So we only need to detect the services removing access and disabling them by not
        // inserting them inside the DOM
        Element.prototype.appendChild = function (element) {
            const isGMapScript = element.tagName === 'SCRIPT' && /maps\.googleapis\.com/i.test(element.src);
            const isGMapAccessScript = isGMapScript && urlCatchers.some(url => element.src.includes(url));

            if (!isGMapAccessScript) {
                return appendChild.call(this, element);
            }

            // Extract the callback to call it with success data
            // (actually this part is not needed at all but maybe in the future ?)
            //const callback = element.src.split(/.*callback=([^\&]+)/, 2).pop();
            //const [a, b] = callback.split('.');
            //window[a][b]([1, null, 0, null, null, [1]]);

            // Returns the element to be compliant with the appendChild API
            return element;
        };
    })();
</script>
</body>
</html>
