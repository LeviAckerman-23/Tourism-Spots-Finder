<?php 
session_start();
include('include/db.php');

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html");
    exit();
}

$userID = $_SESSION['user_id'];

// Fetch user data from the database
$query = "SELECT username, email, phone, city, status FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle password change
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        $updateQuery = "UPDATE users SET password = ? WHERE user_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("si", password_hash($newPassword, PASSWORD_DEFAULT), $userID);
        $updateStmt->execute();

        echo "<script>
            alert('Password changed successfully!');
            window.location.href = 'profile.php';
        </script>";
    } else {
        echo "<script>alert('Passwords do not match!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <script>
        function togglePasswordForm() {
            const passwordForm = document.getElementById('passwordForm');
            passwordForm.style.display = passwordForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <header class="profile-header">
        <img src="images/profile-icon.png" alt="Profile Icon" class="profile-icon">
        <h1><?php echo htmlspecialchars($user['username']); ?></h1>
        <p class="status"><?php echo $user['status'] == 1 ? 'Active' : 'Deactivated'; ?></p>
    </header>

    <div class="details" >
        <p><strong>Email: </strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Phone: </strong> <?php echo htmlspecialchars($user['phone']); ?></p>
        <p><strong>City: </strong> <?php echo htmlspecialchars($user['city']); ?></p>

        <button class="change-password-button" onclick="togglePasswordForm()">Change Password</button>

        <div id="passwordForm" class="password-form" style="display: none;">
            <form action="profile.php" method="POST">
                <input type="password" name="new_password" placeholder="New Password" required >
                <br>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <br>
                <button type="submit">Change</button>
            </form>
        </div>
    </div>
     <br><Br><br>
    <button class="back-link" onclick="window.location.href='mainPage.php';">Back to Main Page</button>

</body>
</html>
