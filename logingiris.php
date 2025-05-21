<?php
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Giriş bilgileri sabit
$dogruEmail = "ugurgokmenogr@sakarya.edu.tr";
$dogruSifre = "b241210053";

if ($email === $dogruEmail && $password === $dogruSifre) {
    $_SESSION['loggedin'] = true;
    $_SESSION['student_no'] = $password;
    header("Location: hosgeldin.php");
    exit();
} else {
    echo "<div style='text-align:center; margin-top:30px;'>
            <h3>Giriş başarısız.</h3>
            <a href='login.html'>Geri dön</a>
          </div>";
}
?>