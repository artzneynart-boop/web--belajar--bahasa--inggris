<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE username='$username'"
    );

    $data = mysqli_fetch_assoc($query);

    if($data){

        if(password_verify($password, $data['password'])){

            $_SESSION['username'] = $data['username'];

            header("Location: index.php");
            exit;

        } else {
            echo "Password salah!";
        }

    } else {
        echo "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <form method="POST">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required
        >

        <br><br>

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <br><br>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</body>
</html>