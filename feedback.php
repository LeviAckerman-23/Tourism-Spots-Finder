<?php
session_start();
include('include/db.php');

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html");
    exit();
}

$userID = $_SESSION['user_id']; // Get user ID from session

// Handle feedback form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['full_name'];
    $experience = $_POST['experience'];
    $comments = $_POST['comments'];

    // Insert feedback into the database
    $query = "INSERT INTO feedback (user_id, full_name, experience, comments) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isss", $userID, $fullName, $experience, $comments);
    $stmt->execute();

    echo "<script>
        alert('Thank you for your feedback!');
        window.location.href = 'mainPage.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>
<body>

    <h1 class="feedback-title">Feedback Form</h1>
    <p class="subtitle">Please write your feedback below:</p>

    <form action="feedback.php" method="POST">
        <div class="experience-group">
            <label>How do you rate your overall experience?</label>
            <div class="radio-buttons">
                <input type="radio" name="experience" value="Bad" required> Bad
                <input type="radio" name="experience" value="Average" required> Average
                <input type="radio" name="experience" value="Good" required> Good
            </div>
        </div>

        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
            <label for="comments">Message:</label>
            <textarea name="comments" rows="5" placeholder="Write your feedback here" required></textarea>
        </div>

        <button type="submit">Submit Feedback</button>
    </form>

</body>
</html>
