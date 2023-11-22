<?php
session_start();
include("database.php");

$email = $_SESSION['email'];
$new_password = $_POST['password'];
$con_pass = $_POST['con-pass'];

$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

if ($new_password == $con_pass) {
    $sql = "UPDATE users SET password_hash ='$new_password_hash' WHERE email = '$email' ";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Password has been reset successfully")</script>';
        include("login page.html");
    }
} else {
    echo '<script>alert("New password does not match")</script>';
    include("Forgot password p3.html");
}
mysqli_close($conn);
