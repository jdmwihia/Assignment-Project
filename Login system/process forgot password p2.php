<?php
session_start();
include("database.php");

$veri_code_user = $_POST["veri-code"];
$veri_no = $_SESSION['veri-code'];

if ($veri_code_user != $veri_no) {
    echo '<script>alert("Verification failed, verification code does not match")</script>';
    include("Forgot password p2.html");
} else {
    echo '<script>alert("Verification success, please reset your password")</script>';
    include("Forgot password p3.html");
}
