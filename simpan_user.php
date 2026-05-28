<?php

include 'koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO users (username, email, password)
VALUES ('$username', '$email', '$password')";

if (mysqli_query($conn, $query)) {
    echo "Register berhasil!";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>