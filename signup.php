<?php

$con = mysqli_connect('localhost', 'root', '', 'tourism');

$firstname = $_POST['fname'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];
$city = $_POST['city'];
$phone = $_POST['phone'];

if ($password !== $confirm_password) {
    echo "<script>alert('Passwords do not match. Please try again.'); window.location.href='signup.html';</script>";
    exit();
}

$sql = "INSERT INTO `users`(`user_id`, `username`, `password`, `email`, `city`, `phone`) 
        VALUES (0, '$firstname', '$password', '$email', '$city', '$phone')";

$result = mysqli_query($con, $sql);

if ($result) {
    if ($firstname == "admin" && $password == "ad123") {
        header("location:ad3.php");
    } else {
        header("location:signin.html");
    }
} else {
    $que = "SELECT `username` FROM `users` WHERE username='$firstname'";
    $result = mysqli_query($con, $que);
    if ($result) {
        echo "<script>alert('Username already taken'); window.location.href='signup.html';</script>";
    }
}
if ($result) {
    echo "<script>alert('Sign-up successful!'); window.location.href='signin.html';</script>";
  } else {
    echo "<script>alert('Error occurred. Try again.');</script>";
  }
  

?>







