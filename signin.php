<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>

<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'tourism');

// Check for form submission
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db, $_POST["user"]);
    $password = mysqli_real_escape_string($db, $_POST["pass"]);
    $d = date("Y-m-d h:i:sa");

    // Admin login check
    if ($username == 'admin' && $password == 'ad123') {
        $_SESSION['user_type'] = 'admin'; // Save admin type in session
        header('location:admin.php');
        exit();
    }

    // Fetch user from database
    $sql = "SELECT user_id, username, password, email, status FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result2 = $stmt->get_result();

    if ($result2->num_rows > 0) {
        $row = $result2->fetch_assoc();

        // Verify password
        if ($row['password'] == $password) {
            if ($row['status'] == 1) {
                // Store user data in session
                $_SESSION['user_id'] = $row['user_id'];  
                $_SESSION['username'] = $row['username']; 
                $_SESSION['email'] = $row['email'];

                header("location:mainPage.php");
                exit();
            } else {
                echo "<script>
                    alert('Your account is deactivated. Please contact the admin.');
                    window.location.href = 'signin.html';
                    </script>";
                exit();
            }
        } else {
            echo "<script>
                alert('Invalid username or password.');
                window.location.href = 'signin.html';
                </script>";
            exit();
        }
    } else {
        echo "<script>
            alert('Invalid username or password.');
            window.location.href = 'signin.html';
            </script>";
        exit();
    }
}
?>

</body>
</html>
