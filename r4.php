<?php
// Check if required parameters are available
if (isset($_GET['lat']) && isset($_GET['lng']) && isset($_GET['name'])) {
    $destinationLat = $_GET['lat'];
    $destinationLng = $_GET['lng'];
    $destinationName = urldecode($_GET['name']);
} else {
    echo "<script>alert('Invalid location data!'); window.history.back();</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route to Destination</title>
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
            margin-top: 80px;  /* Move the "From" and "To" box down */
        }
        .mapboxgl-ctrl-top-right {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 4px;
        }

        /* Move zoom control and others to right */
        .mapboxgl-ctrl-top-right .mapboxgl-ctrl-group {
            right: 10px;
            left: auto;
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
<div id="info-box">Finding the route...</div>
<button id="return-btn">🔙</button>
<div id="permission-box">Location services are off. Please enable location for route calculation.</div>

<script>
// Set Mapbox access token
mapboxgl.accessToken = 'pk.eyJ1IjoiYjBybi1zbHl0aGVyaW4iLCJhIjoiY20wbDZ3NmVuMDJkdzJtcXlubWdrMmVkMyJ9.iTnPcb-yrYGlbB7C_L45SQ';


const destinationLat = <?php echo $destinationLat; ?>;
const destinationLng = <?php echo $destinationLng; ?>;
const destinationName = "<?php echo $destinationName; ?>";

// Initialize the map
const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/traffic-day-v2',
    center: [destinationLng, destinationLat],
    zoom: 12
});

// Add controls
map.addControl(new mapboxgl.FullscreenControl(), 'top-right');
map.addControl(new mapboxgl.NavigationControl(), 'top-right');
map.addControl(new mapboxgl.ScaleControl({ maxWidth: 80, unit: 'metric' }), 'bottom-left');

// Add Directions control without inputs
const directions = new MapboxDirections({
    accessToken: mapboxgl.accessToken,
    unit: 'metric',
    profile: 'mapbox/driving',
    alternatives: false,
    controls: { inputs: false, instructions: true },
});
map.addControl(directions, 'top-left');

// Geolocate control to track user's location
const geolocate = new mapboxgl.GeolocateControl({
    positionOptions: { enableHighAccuracy: true, timeout: 10000 },
    trackUserLocation: true,
    showUserHeading: true
});
map.addControl(geolocate, 'top-right');

// Destination marker (red)
const destinationMarker = new mapboxgl.Marker({ color: 'red' })
    .setLngLat([destinationLng, destinationLat])
    .setPopup(new mapboxgl.Popup().setText(destinationName))
    .addTo(map);

// Handle user location and route calculation
let userMarker;

function checkLocationPermission() {
    if (!navigator.geolocation) {
        document.getElementById('info-box').textContent = "Geolocation is not supported by your browser.";
    } else {
        navigator.permissions.query({ name: 'geolocation' }).then(function(result) {
            if (result.state === 'granted') {
                geolocate.trigger();
            } else if (result.state === 'prompt') {
                document.getElementById('info-box').textContent = "Awaiting location permission...";
            } else if (result.state === 'denied') {
                document.getElementById('permission-box').style.display = 'block';
                document.getElementById('info-box').textContent = "Location permission denied.";
            }
        });
    }
}

geolocate.on('geolocate', function(event) {
    const userCoordinates = [event.coords.longitude, event.coords.latitude];

    // Add or update user marker (blue)
    if (userMarker) {
        userMarker.setLngLat(userCoordinates);
    } else {
        userMarker = new mapboxgl.Marker({ color: 'blue' })
            .setLngLat(userCoordinates)
            .setPopup(new mapboxgl.Popup().setText('Your Location'))
            .addTo(map);
    }

    directions.setOrigin(userCoordinates);
    directions.setDestination([destinationLng, destinationLat]);

    document.getElementById('info-box').textContent = `Calculating route from your location to ${destinationName}...`;
});

// Handle route event
directions.on('route', function(event) {
    const route = event.route[0];
    const distance = (route.distance / 1000).toFixed(2);
    const duration = (route.duration / 60).toFixed(2);

    document.getElementById('info-box').textContent = `Route found! Distance: ${distance} km, Duration: ${duration} mins to ${destinationName}.`;
});

// Handle geolocation errors
geolocate.on('error', function() {
    document.getElementById('info-box').textContent = "Unable to retrieve your location. Please enable location services.";
    document.getElementById('permission-box').style.display = 'block';
});
checkLocationPermission();

document.getElementById('return-btn').addEventListener('click', function() {
        window.history.back(); // Redirects to the previous page
    });
</script>

</body>
</html>
