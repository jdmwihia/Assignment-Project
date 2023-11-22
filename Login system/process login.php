<?php
include("database.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT username,password_hash FROM users WHERE username = '$username' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "User dose not exist, please create an account";
} else {
    $row = mysqli_fetch_assoc($result);
    $username_db = $row["username"];
    $password_hash_db = $row["password_hash"];
    if (password_verify($password, $password_hash_db)) {
        echo '<script>alert("Login success,welcome")</script>';
    } else {
        echo '<script>alert("Login failed, incorrect password")</script>';
        include("Login page.html");
    }
}

mysqli_close($conn);
