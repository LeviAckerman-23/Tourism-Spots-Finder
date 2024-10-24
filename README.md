Tourism Spots Finder
Project Overview
The Tourism Spots Finder is a web-based platform designed to help users explore tourist destinations, primarily focusing on Kerala and India. It offers a user-friendly experience with a search bar for finding places, detailed information on each location, interactive maps, personalized route guidance, and user-generated feedback. The platform is built with scalability in mind, allowing the integration of new destinations and supporting users with useful travel insights through reviews and popular spot recommendations.

Features
Search Bar: Allows users to search for tourist spots and view detailed information.
Popular Destinations: Highlights trending spots and top-rated places.
Interactive Map: Displays routes from the user’s location to the selected destination.
Detailed Information Pages: Provides descriptions, images, and highlights of each place.
Route Guidance: Offers personalized routes to destinations using real-time maps.
Feedback System: Collects reviews and ratings from users to help future travelers.
Admin Dashboard: Enables admins to manage tourist spots, user feedback, and reviews.
Installation Guide
Prerequisites:

A web server (e.g., XAMPP, WAMP, or Node.js)
MySQL Database
Basic knowledge of HTML, CSS, JavaScript, and PHP
Steps to Install:

Clone the repository:
bash
Copy code
git clone <repository_url>
Set up the database:
Import the provided SQL file (tourism.sql) into your MySQL database.
Update configuration:
In the backend code, update the database credentials (host, username, password).
Launch the web server and open the project folder in your browser.
Database Overview
Users Table: Stores user details, including role (admin/user).
Tourism Spots Table: Holds data about destinations, such as name, address, and coordinates.
Information Table: Provides detailed descriptions and images for each destination.
Feedback Table: Records user reviews, ratings, and comments.
Usage Instructions
User Registration:
Users can sign up to create an account and access personalized features like feedback submission.
Searching for Destinations:
Use the search bar on the home page to find a tourist spot and view its details.
Viewing Routes:
Select a spot to view its location on the map and get route directions from your current location.
Submitting Feedback:
After visiting a place, users can leave reviews and rate their experience.
Admin Controls
Add, update, or delete tourism spots.
Monitor and manage user feedback.
Update popular destination lists based on visitor trends.
Technologies Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL
Mapping API: Mapbox (for interactive maps and route guidance)

