<?php
include("database.php");


if (strlen($_POST["password"]) < 4) {
    include("Signup page.html");
    die('<script>alert("Password must be at least 4 characters")</script>');
}
if ($_POST["password"] != $_POST["password-confirmation"]) {
    include("Signup page.html");
    die('<script>alert("Password does not match")</script>');
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$username = $_POST["username"];
$email = $_POST["email"];


$sql = "INSERT INTO users (username, email, password_hash)
        VALUES ('$username','$email','$password_hash')  ";

try {
    mysqli_query($conn, $sql);
    die('<script>alert("Your account has been registered,welcome")</script>');
} catch (mysqli_sql_exception) {
    include("Signup page.html");
    die('<script>alert("Either username or email account is already in use")</script>');
}

mysqli_close($conn);
