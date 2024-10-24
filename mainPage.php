<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage Vista</title>
    <link rel="stylesheet" href="st2.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <style>
        /* Basic styling for the toggle button */
        #toggleButton {
            position: absolute;
            bottom: 10px;
            right: 10px;
            border: none;
            background: none;
            font-size: 25px;
            cursor: pointer;
            color: white;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        #toggleButton:hover {
            transform: scale(1.2); /* Slight zoom effect on hover */
        }
        
    </style>
</head>
<body>
<?php
    session_start();
    include 'include/header.html'; ?>
    <section class="slideshow-container">
        <div class="slideshow fade">
            <img src="images/destination/manali3.jpg" alt="Slide 1">
            <div class="overlay-text">
                <h2>TO TRAVEL IS TO LIVE</h2>
                <p>You don't need magic to disappear. All you need is a destination.</p>
                <div class="quick-actions">
                <a href="route2.php" class="btn-map">Show on the Map</a>
                <!-- <button class="btn-info" onclick="toggleMoreInfo()">More Info</button> -->
                </div>
            </div>
        </div>
        <div class="slideshow fade">
            <img src="images/destination/manali4.jpg" alt="Slide 2">
            <div class="overlay-text">
                <h2>EXPLORE NEW HORIZONS</h2>
                <p>Discover exciting places you’ve never been before.</p>
                <div class="quick-actions">
                <a href="route2.php" class="btn-map">Show on the Map</a>
                <!-- <button class="btn-info" onclick="toggleMoreInfo()">More Info</button> -->
                </div>
            </div>
        </div>
        <div class="slideshow fade">
            <img src="images/destination/ladakh1.jpg" alt="Slide 3">
            <div class="overlay-text">
                <h2>ADVENTURE AWAITS</h2>
                <p>Join us on thrilling adventures across the globe.</p>
                <div class="quick-actions">
                <a href="route2.php" class="btn-map">Show on the Map</a>
                <!-- <button class="btn-info" onclick="toggleMoreInfo()">More Info</button> -->
                </div>
            </div>
        </div>
        <div class="slideshow fade">
            <img src="images/new1.jpg" alt="Slide 3">
            <div class="overlay-text">
            <h2>TO TRAVEL IS TO LIVE</h2>
            <p>You don't need magic to disappear. All you need is a destination.</p>
                <div class="quick-actions">
                <a href="route2.php" class="btn-map">Show on the Map</a>
                <!-- <button class="btn-info" onclick="toggleMoreInfo()">More Info</button> -->
                </div>
            </div>
        </div>
        <div class="slideshow fade">
            <img src="images/new2.jpg" alt="Slide 3">
            <div class="overlay-text">
            <h2>EXPLORE NEW HORIZONS</h2>
            <p>Discover exciting places you’ve never been before.</p>
                <div class="quick-actions">
                <a href="route2.php" class="btn-map">Show on the Map</a>
                <!-- <button class="btn-info" onclick="toggleMoreInfo()">More Info</button> -->
                </div>
            </div>
        </div>
        <div class="slideshow fade">
            <img src="images/new3.jpg" alt="Slide 3">
            <div class="overlay-text">
                <h2>ADVENTURE AWAITS</h2>
                <p>Join us on thrilling adventures across the globe.</p>
                <div class="quick-actions">
                <a href="route2.php" class="btn-map">Show on the Map</a>
                <!-- <button class="btn-info" onclick="toggleMoreInfo()">More Info</button> -->
                </div>
            </div>
        </div>
        <button id="toggleButton">⏸️</button>
    </section>

    <!-- <section class="search-container">
        <div class="search-box">
            <h2 style="font-size: 50px;">Find Your Trip</h2>
             <BR><BR>
            <form method="post" action="placeUpdated.php" name="form1" novalidate>
                <label for="destination"></label>
                <input type="text" id="destination" name="search" placeholder="Search your destination.." size="80">

                 <label for="filter">Select Filter:</label>
                <select id="filter" name="filter">
                    <option value="beach">Beach</option>
                    <option value="adventure">Adventure</option>
                    <option value="culture">Culture</option>
                </select> 

                <input type="image" name="submit" src="search_icon.png" alt="Search image" style="width:60px; height:60px; vertical-align: middle; position: relative; top: 2px;  border: none; outline: none;">
            </form>
        </div>
    </section> -->

    <section class="search-container">
    <div class="search-content">
        <div class="search-info">
            <h2>Map Your Trip</h2>
            <p>Search your favorite spots and get the best routes to your destination with just a click!</p>
        </div>

        <div class="search-box">
            <form method="post" action="placeUpdated.php" name="form1" novalidate>
                <input type="text" id="destination" name="search" 
                       placeholder="Where do you want to go today?" size="80" >
                
                <input type="image" name="submit" src="images/search_icon.png" 
                       alt="Search" style="width:40px; height:40px;  vertical-align: middle; position: relative; top: 1px;  border: none; outline: none; left: 10px;">
            </form>
            <div class="quick-actions">
                <!-- <a class="btn-route" href="#">Find Route</a> -->
                <!-- <a class="btn-nearby" href="map2.php">Explore Nearby</a> -->
            </div>
        </div>
    </div>


        <div class="contain">
            <div class="heading">
                <h2>Popular Destination in India</h2>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="images/destination/tajmahal1.jpg" alt="Taj Mahal Image" style="width: auto;height: 270px;">
                </div>
                <div class="name-text left1">
                    <h2>Taj Mahal</h2>
                    <a href="destination.php" class="btn">Visit</a>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="images/destination/ladakh1.jpg" alt="Ladakh Image" style="width: auto;height: 270px;">
                </div>
                <div class="name-text left2">
                    <h2>Ladakh</h2>
                    <a href="destination.php" class="btn">Visit</a>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="images/destination/kerala1.jpg" alt="Kerala Image" style="width: auto;height: 270px;">
                </div>
                <div class="name-text left3">
                    <h2>Kerala</h2>
                    <a href="destination.php" class="btn">Visit</a>
                </div>
            </div>
            <div class="box">
                <div class="imgBox">
                    <img src="images/destination/goa1.jpg" alt="Goa Image" style="width: auto;height: 270px;">
                </div>
                <div class="name-text left4">
                    <h2>Goa</h2>
                    <a href="destination.php" class="btn">Visit</a>
                </div>
            </div>
            <div class="destination-btn">
                <br>
                <a href="destination.php">View all</a>
            </div>
        </div>
    </section>
    <script>
        let slideIndex = 0;
        let slideshowInterval;
        let isPlaying = true;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("slideshow");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            slides[slideIndex-1].style.display = "block";  
            // setTimeout(showSlides, 3000); 
        }
        function startSlideshow() {
        slideshowInterval = setInterval(showSlides, 3000);
    }

    // Stop the slideshow
    function stopSlideshow() {
        clearInterval(slideshowInterval);
    }

    document.getElementById('toggleButton').addEventListener('click', function () {
        if (isPlaying) {
            stopSlideshow();
            this.textContent = '⏺️'; // Change to play icon
        } else {
            startSlideshow();
            this.textContent = '⏸️'; // Change to pause icon
        }
        isPlaying = !isPlaying; // Toggle play state
    });

    // Start slideshow when page loads
    startSlideshow();


    </script>
     <?php include 'include/footer.html';    
     ?>
     
</body>
</html>
