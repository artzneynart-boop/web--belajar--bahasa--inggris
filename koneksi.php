<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "belajar_bahasa_inggris"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "belajar_bahasa_inggris");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
