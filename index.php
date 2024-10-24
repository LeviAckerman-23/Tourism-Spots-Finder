<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Spot Finder</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background:linear-gradient(to bottom right, lightslategrey, #e0f7fa); 
            scroll-behavior: smooth;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        /* Hero Section */
        .hero {
            height: 80vh;
            background: url('images/bg1.webp') no-repeat center/cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 500;
            color: white;
            text-shadow: 1px 1px 8px rgba(0, 0, 0, 0.6);
        }
        .hero h2 {
            font-weight: 700;
            color: white;
            text-shadow: 1px 1px 8px rgba(0, 0, 0, 0.6);
        }

         .hero p {
            color: #fff;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .hero .explore-btn {
            margin-top: 15px;
            padding: 12px 30px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hero .explore-btn:hover {
            background-color: rgba(0, 0, 0, 0.9);
        } 

        /* Two-Column Layout */
        .two-column {
            display: flex;
            justify-content: space-between;
            margin: 40px 0px;
                margin-right: 10px;
                margin-left: 140px;
        }

        .column-left {
            flex: 1;
            padding-right: 20px;
        }

        .column-left h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .column-left p {
            font-size: 1.2rem;
            margin-bottom: 10px;
            line-height: 1.6;
            text-align: justify;
        }

        .column-right {
            display:grid;
             grid-template-columns: 1fr 1fr; 
            gap: 10px;
            flex: 1;
        }

        .column-right img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-left: 100px;
            border: #333;
            border-style:ridge;

        }

        /* Quote Section */
        .quote-section {
            background-color: #e0f7fa;
            padding: 30px;
            margin: 50px 0;
            text-align: center;
            border-radius: 10px;
        }

        .quote-section blockquote {
            font-size: 1.5rem;
            font-style: italic;
            margin-bottom: 15px;
        }

        .quote-section p {
            font-size: 1rem;
            font-weight: 500;
        }

        /* Features Section */
        .features {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .feature-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }

        .feature-card h3 {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .feature-card p {
            font-size: 1rem;
            line-height: 1.5;
        }
        .descr {
            text-align: center;
            padding: 2rem;
            background: #e0f7fa; 
            border-radius: 10px;
            margin-bottom: 2rem;
            margin-top: 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            background:transparent;
        }

        .descr p {
            text-align:center;
            color: black;
            font-size: 1.4rem;
            font-weight: 500;
            margin-top: 10px;
            margin-bottom: 1.5rem;
        }
        .descr .explore-btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            color: #fff;
            background: #333;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background 0.4s ease;
        }

        .descr .explore-btn:hover {
            background-color: #555;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
     
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Map Your Trip</h1>
            <h2>Welcome to the Tourism Spots Finder</h2>
        </div>
    </section>
    
    <section class="descr">
     <p>Explore top destinations and hidden treasures across India, with a focus on Kerala's natural beauty.</p>
     <a class="explore-btn" href="signup.html">Explore</a>
     </section>

    <!-- Two-Column Section -->
    <section class="two-column container">
        <div class="column-left">
            <h2>Tourism Spot Finder: Your Travel Guide</h2>
            <p>
                Plan your perfect trip across India. Our platform helps you explore popular as well as lesser-known 
                spots—whether it’s Kerala’s serene backwaters or bustling hill stations.
            </p>
            <p>
                Use our interactive maps to search places, find nearby attractions, and view routes to your destinations. 
                Get insights through user reviews and access detailed information for each destination page.
            </p>
        </div>
        
        <div class="column-right">
            <img src="images/index1.jpeg" alt="Munnar Hills">
            <img src="images/index2.jpg" alt="Alleppey Backwaters">
            <img src="images/index3.jpg" alt="Western Ghats">
            <img src="images/nature.jpg" alt="Kovalam Beach"> 
        </div>
    </section>

    <!-- Quote Section -->
    <section class="quote-section">
        <blockquote>
            "Travel not to escape life, but for life not to escape us."
        </blockquote>
        <p>Explore the beauty of the unknown and find peace in every destination.</p>
    </section>

    <!-- Features Section -->
    <section class="features container">
        <div class="feature-card">
            <h3>01. Explore Destinations</h3>
            <p>Find and explore tourist spots across India, focusing on Kerala’s best and hidden attractions.</p>
        </div>
        <div class="feature-card">
            <h3>02. Interactive Maps</h3>
            <p>Search for places, find nearby destinations, and get routes to your desired locations.</p>
        </div>
        <div class="feature-card">
            <h3>03. Reviews & Insights</h3>
            <p>Access reviews and ratings from fellow travelers to plan your perfect trip.</p>
        </div>
    </section>

</body>

</html>
