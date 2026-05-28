<?php

$conn = mysqli_connect("localhost", "root", "", "belajar_bahasa_inggris");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>