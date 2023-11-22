<?php
session_start();
include("database.php");

$email = $_SESSION['email'] = $_POST["email"];

$sql = "SELECT email FROM users where email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo '<script>alert("This email is not registered to any account, please sign up")</script>';
    include("Signup page.html");
} else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['veri-code'] = $veri_code = rand(100000, 999999);
    $msg = 'Your verification code is ' . $veri_code;
    $subj = "Email verification";
    $sender = "from:jeremwihia@gmail.com";

    if (mail($email, $subj, $msg, $sender)) {
        echo '<script>alert("The verification code has been sent to your email")</script>';
        include('Forgot password p2.html');
    } else {
        echo '<script>alert("Sorry, the verification code was not sent to your email, please try again")</script>';
        include("Forgot password.html");
    }
}

mysqli_close($conn);
