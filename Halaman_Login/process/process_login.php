<?php

// require_once('../function/helper.php');
// require_once('../function/koneksi.php');

// // Menangkap request
// $email = $_POST['email'];
// $password = md5($_POST['password']);

// $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");

// // Mengecek pengguna
// if (mysqli_num_rows($query) != 0) {
//     $row = mysqli_fetch_assoc($query);

//     // var_dump($row);
//     // die();
//     // Membuat session
//     session_start();
//     $_SESSION['email'] = $row['email'];
//     header("location:nazmi2\dashboard.php");
// } else {
//     header("location: ");
// }

session_start();

$email = $_POST['email'];
$password = $_POST['password'];



$koneksi = new PDO('mysql:host=localhost;dbname=web', 'root', '');

$query = $koneksi->query("select * from user where email='$email' AND password='$password'");
$data = $query->fetch();

if ($query->rowCount() > 0) {
    if ($data['role'] == "user") {
        $_SESSION['email'] = $email;
        header("Location:./../dashboard.php");
    }
} else {
    header("Location:./../index.php");
}
