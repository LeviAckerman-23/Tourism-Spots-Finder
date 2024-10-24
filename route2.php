<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Map with Directions</title>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" rel="stylesheet" />
    <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
        #info-box, #permission-box {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 2;
        }
        #permission-box { 
            display: none; 
            background-color: #f8d7da; 
            border: 1px solid red;
        }
        .mapboxgl-ctrl-top-left {
            margin-top: 80px;
        }
        #style-switcher {
            position: absolute;
            top: 10px;
            right: 50px;
            z-index: 3;
            padding: 10px;
            background: white;
            border-radius: 5px;
        }
        #use-location-btn {
            position: absolute;
            top: 98px;
            left: 200px;
            z-index: 3; 
            padding: 5px;
            background: silver;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #use-location-btn:hover {
        background-color: #0056b3;
    }
        #return-btn {
        position: absolute;
        top: 10px;
        right: 50px;
        z-index: 4; /* Ensure it's above the map controls */
        /* padding: 10px 15px; */
        background-color: white;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 25px;
    }

    #return-btn:hover {
        background-color: #f8d7da;
    }
    </style>
</head>
<body>

<div id="map"></div>
<div id="info-box">Enter a destination to find a route...</div>
<div id="permission-box">Location services are off. Please enable location for route calculation.</div>
<button id="return-btn">🔙</button>
<button id="use-location-btn">Use My Location</button>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYjBybi1zbHl0aGVyaW4iLCJhIjoiY20wbDZ3NmVuMDJkdzJtcXlubWdrMmVkMyJ9.iTnPcb-yrYGlbB7C_L45SQ';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/traffic-day-v2',
    center: [76.6844, 10.2849],
    zoom: 12
});

map.addControl(new mapboxgl.FullscreenControl(), 'top-right');
map.addControl(new mapboxgl.NavigationControl(), 'top-right');
map.addControl(new mapboxgl.ScaleControl({ maxWidth: 80, unit: 'metric' }), 'bottom-left');

const directions = new MapboxDirections({
    accessToken: mapboxgl.accessToken,
    unit: 'metric',
    profile: 'mapbox/driving',
    alternatives: false,
    controls: {
        inputs: true,
        instructions: true,
    },
    interactive: true
});
map.addControl(directions, 'top-left');

const geolocate = new mapboxgl.GeolocateControl({
    positionOptions: { enableHighAccuracy: true, timeout: 10000 },
    trackUserLocation: true,
    showUserHeading: true
});
map.addControl(geolocate, 'top-right');

let userMarker, originMarker, destinationMarker;
let usingCurrentLocation = false; // Track if the current location is being used as origin

document.getElementById('use-location-btn').addEventListener('click', function () {
    geolocate.trigger();
});

async function getPlaceName(coordinates) {
    const [lng, lat] = coordinates;
    const response = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${lng},${lat}.json?access_token=${mapboxgl.accessToken}`);
    const data = await response.json();
    return data.features[0]?.place_name || 'Unknown location';
}

geolocate.on('geolocate', function(event) {
    const userCoordinates = [event.coords.longitude, event.coords.latitude];

    if (userMarker) {
        userMarker.setLngLat(userCoordinates);
    } else {
        userMarker = new mapboxgl.Marker({ color: 'skyblue' })
            .setLngLat(userCoordinates)
            .setPopup(new mapboxgl.Popup().setText('Your Location'))
            .addTo(map);
    }

    directions.setOrigin(userCoordinates);
    usingCurrentLocation = true; // Set flag that user location is used as origin
    document.getElementById('info-box').textContent = `Enter a destination to calculate a route...`;
});

directions.on('route', async function(event) {
    const route = event.route[0];
    const originCoords = route.legs[0].steps[0].maneuver.location;
    const destinationCoords = route.legs[0].steps.slice(-1)[0].maneuver.location;

    const originPlace = await getPlaceName(originCoords);
    const destinationPlace = await getPlaceName(destinationCoords);

    // Only show origin marker if not using current location
    if (!usingCurrentLocation) {
        if (originMarker) originMarker.remove();
        originMarker = new mapboxgl.Marker({ color: 'blue' })
            .setLngLat(originCoords)
            .setPopup(new mapboxgl.Popup().setText(`Origin: ${originPlace}`))
            .addTo(map);
    }

    if (destinationMarker) destinationMarker.remove();
    destinationMarker = new mapboxgl.Marker({ color: 'red' })
        .setLngLat(destinationCoords)
        .setPopup(new mapboxgl.Popup().setText(`Destination: ${destinationPlace}`))
        .addTo(map);

    document.getElementById('info-box').textContent = `Route found! Distance: ${(route.distance / 1000).toFixed(2)} km, Duration: ${(route.duration / 60).toFixed(2)} mins to ${destinationPlace}.`;

    // Reset the flag after route is shown
    usingCurrentLocation = false;
});

directions.on('clear', function() {
    if (originMarker) originMarker.remove();
    if (destinationMarker) destinationMarker.remove();
});

geolocate.on('error', function() {
    document.getElementById('info-box').textContent = "Unable to retrieve your location. Please enable location services.";
    document.getElementById('permission-box').style.display = 'block';
});

document.getElementById('return-btn').addEventListener('click', function() {
        window.history.back(); // Redirects to the previous page
    });
</script>

</body>
</html>
