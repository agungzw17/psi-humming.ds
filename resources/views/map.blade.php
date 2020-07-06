
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
            height: 40%;
            width: 100%;
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
<script>
    // This example displays a map with the language set to Arabic and the
    // regions set to Egypt. These settings are specified in the HTML script
    // element when loading the Google Maps JavaScript API.
    // Setting the language shows the map in the language of your choice.
    // Setting the region biases the geocoding results to that region.
    // In addition, the page's html element sets the text direction to
    // right-to-left.
    function initMap() {
        var cairo = {lat: -7.6853155, lng: 110.4207218};

        var map = new google.maps.Map(document.getElementById('map'), {
            scaleControl: true,
            center: cairo,
            zoom: 15
        });

        var infowindow = new google.maps.InfoWindow;
        infowindow.setContent('<b>Yogyakarta</b>');

        var marker = new google.maps.Marker({map: map, position: cairo});
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
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
