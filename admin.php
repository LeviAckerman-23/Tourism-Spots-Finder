<?php

$conn = new mysqli('localhost', 'root', '', 'tourism');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $role = 'user'; 
        $status = 1; 
        $joined = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone, city, role, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssis", $username, $email, $password, $phone, $city, $role, $status, $joined);
        $stmt->execute();
        $stmt->close();
    }

    elseif (isset($_POST['delete_user'])) {
        $id = $_POST['user_id'];
        $stmt = $conn->prepare("UPDATE users SET status = 0 WHERE user_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    elseif (isset($_POST['update_user'])) {
        $id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];

        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, phone = ?, city = ? WHERE user_id = ?");
        $stmt->bind_param("ssssi", $username, $email, $phone, $city, $id);
        $stmt->execute();
        $stmt->close();
    }

    elseif (isset($_POST['add_destination'])) {
        $name = $_POST['name'];
        $description = $_POST['description'] ?? NULL;
        $address = $_POST['address'] ?? NULL;
        $latitude = !empty($_POST['latitude']) ? $_POST['latitude'] : NULL;
        $longitude = !empty($_POST['longitude']) ? $_POST['longitude'] : NULL;
        $google_place_id = $_POST['google_place_id'] ?? NULL;
        $category = $_POST['category'] ?? 'nature';  // Default category

        $stmt = $conn->prepare("INSERT INTO tourism_spots (pname, description, address, latitude, longitude, google_place_id, category) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $description, $address, $latitude, $longitude, $google_place_id, $category);
        $stmt->execute();
        $stmt->close();
    }

    elseif (isset($_POST['delete_destination'])) {
        $id = $_POST['spot_id'];
        $stmt = $conn->prepare("DELETE FROM tourism_spots WHERE spot_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    elseif (isset($_POST['update_destination'])) {
        $id = $_POST['spot_id'];
        $name = $_POST['name'];
        $description = $_POST['description'] ?? NULL;
        $address = $_POST['address'] ?? NULL;
        $latitude = !empty($_POST['latitude']) ? $_POST['latitude'] : NULL;
        $longitude = !empty($_POST['longitude']) ? $_POST['longitude'] : NULL;
        $google_place_id = $_POST['google_place_id'] ?? NULL;
        $category = $_POST['category'] ?? 'nature';

        $stmt = $conn->prepare("UPDATE tourism_spots SET pname = ?, description = ?, address = ?, latitude = ?, longitude = ?, google_place_id = ?, category = ? WHERE spot_id = ?");
        $stmt->bind_param("sssssssi", $name, $description, $address, $latitude, $longitude, $google_place_id, $category, $id);
        $stmt->execute();
        $stmt->close();
    }
}
$feedbacks = $conn->query("SELECT f.feedback_id, f.full_name, f.experience, f.comments, f.submitted_at, u.username 
                           FROM feedback f 
                           LEFT JOIN users u ON f.user_id = u.user_id 
                           ORDER BY f.submitted_at DESC");

$users = $conn->query("SELECT * FROM users WHERE status = 1");
$inactive_users = $conn->query("SELECT * FROM users WHERE status = 0");
$spots = $conn->query("SELECT * FROM tourism_spots");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>

<div class="sidebar">
    <h2>VOYAGEVISTA</h2>
    <a href="?page=dashboard">Dashboard</a>
    <a href="?page=tourists">Tourists</a>
    <a href="?page=destinations">Destinations</a>
    <a href="?page=feedback">Feedback</a>
    <div class="logout">
        <a href="signin.html">Logout</a>
    </div>
</div>

<div class="main">
    <?php
    if (!isset($_GET['page']) || $_GET['page'] == 'dashboard') {
        echo "<h1>Welcome Admin</h1><br><br><p>Here is your dashboard overview.</p>";
    } elseif ($_GET['page'] == 'tourists') {
        echo "<h1>User Management</h1><h2>Active Users</h2>";
        echo "<table><tr><th>ID</th><th>Username</th><th>Email</th><th>Phone</th><th>City</th><th>Joined</th><th>Actions</th></tr>";
        while ($row = $users->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <form method='post' style='display:inline;'>
                            <input type='hidden' name='user_id' value='{$row['user_id']}'>
                            <button name='delete_user'>Deactivate</button>
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    } elseif ($_GET['page'] == 'destinations') {
        echo "<h1>Tourism Spot Management</h1>";
        echo "<button onclick='showAddDestinationForm()'>Add New Destination</button>";
        echo "<table><tr><th>ID</th><th>Name</th><th>Latitude</th><th>Longitude</th><th>Category</th><th>Actions</th></tr>";
        while ($row = $spots->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['spot_id']}</td>
                    <td>{$row['pname']}</td>
                    <td>{$row['latitude']}</td>
                    <td>{$row['longitude']}</td>
                    <td>{$row['category']}</td>
                    <td>
                        <form method='post' style='display:inline;'>
                            <input type='hidden' name='spot_id' value='{$row['spot_id']}'>
                            <button name='delete_destination'>Delete</button>
                        </form>
                        <button onclick=\"showEditDestinationForm(
                            '{$row['spot_id']}', 
                            '{$row['pname']}', 
                            '{$row['address']}', 
                            '{$row['latitude']}', 
                            '{$row['longitude']}', 
                            '{$row['google_place_id']}', 
                            '{$row['category']}'
                        )\">Edit</button>
                    </td>
                </tr>";        
        }
        echo "</table>";
    }
    elseif ($_GET['page'] == 'feedback') {
        echo "<h1>User Feedback</h1>";
        echo "<table>
                <tr>
                    <th>Feedback ID</th>
                    <th>User</th>
                    <th>Full Name</th>
                    <th>Experience</th>
                    <th>Comments</th>
                    <th>Submitted At</th>
                </tr>";
        while ($row = $feedbacks->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['feedback_id']}</td>
                    <td>" . ($row['username'] ?? 'Anonymous') . "</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['experience']}</td>
                    <td>" . (!empty($row['comments']) ? $row['comments'] : 'No comments') . "</td>
                    <td>{$row['submitted_at']}</td>
                  </tr>";
        }
        echo "</table>";
    }
    
    
    ?>
</div>
<div id="destinationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeDestinationModal()">&times;</span>
        <form method="post">
            <h2 id="destinationModalTitle">Add Destination</h2>

            <input type="hidden" name="spot_id" id="spotId">

            <label for="pname">Name:</label>
            <input type="text" name="name" id="pname" required>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address">

            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" id="latitude">

            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" id="longitude">

            <label for="google_place_id">Google Place ID:</label>
            <input type="text" name="google_place_id" id="google_place_id">

            <label for="category">Category:</label>
            <select name="category" id="category">
                <option value="nature">Nature</option>
                <option value="historical">Historical</option>
                <option value="cultural">Cultural</option>
                <option value="adventure">Adventure</option>
            </select>

            <button type="submit" id="submitDestinationButton" name="add_destination">Add Destination</button>
            <button type="button" onclick="closeDestinationModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    function showAddDestinationForm() {
        document.getElementById('destinationModal').style.display = 'block';
        function showEditDestinationForm(spotId, pname, address, latitude, longitude, googlePlaceId, category) {
    // Set modal title to "Edit"
    document.getElementById('destinationModalTitle').innerText = 'Edit Destination';

    // Change the submit button to "Update"
    document.getElementById('submitDestinationButton').name = 'update_destination';

    // Populate the form with the selected destination's details
    document.getElementById('spotId').value = spotId;
    document.getElementById('pname').value = pname;
    document.getElementById('address').value = address;
    document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;
    document.getElementById('google_place_id').value = googlePlaceId;
    document.getElementById('category').value = category;

    // Display the modal
    document.getElementById('destinationModal').style.display = 'block';
}

function closeDestinationModal() {
    document.getElementById('destinationModal').style.display = 'none';
}

    }
</script>

</body>
</html>
