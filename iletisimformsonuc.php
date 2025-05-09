<?php
session_start();

function sanitize($data) {
  return htmlspecialchars(strip_tags(trim($data)));
}

function isValidEmail($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isOnlyDigits($str) {
  return preg_match('/^\d+$/', $str);
}

function isAllowedCity($city) {
  $allowed = ["İstanbul", "Ankara", "İzmir"];
  return in_array($city, $allowed);
}

function hasValidPhoneFormat($phone) {
  return preg_match('/^5\d{9}$/', $phone);
}


$name = sanitize($_POST['name'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$phone = sanitize($_POST['phone'] ?? '');
$gender = $_POST['gender'] ?? '';
$hobbies = $_POST['hobby'] ?? [];
$city = $_POST['city'] ?? '';
$message = sanitize($_POST['message'] ?? '');

$errors = [];

if (empty($name)) $errors[] = "Ad Soyad boş olamaz.";
elseif (mb_strlen($name) < 3) $errors[] = "Ad Soyad en az 3 karakter olmalıdır.";

if (!isValidEmail($email)) $errors[] = "Geçerli bir email giriniz.";

if (!isOnlyDigits($phone)) $errors[] = "Telefon sadece rakam içermeli.";
elseif (!hasValidPhoneFormat($phone)) $errors[] = "Telefon 5xxxxxxxxx formatında olmalı.";

if (empty($gender) || !in_array($gender, ["Erkek", "Kadın"])) $errors[] = "Geçerli cinsiyet seçiniz.";

if (!is_array($hobbies) || count($hobbies) == 0) $errors[] = "En az bir hobi seçiniz.";

if (!isAllowedCity($city)) $errors[] = "Geçerli bir şehir seçiniz.";

if (mb_strlen($message) < 10) $errors[] = "Mesaj en az 10 karakter olmalı.";

if (!empty($errors)) {
  $_SESSION['form_errors'] = $errors;
  header("Location: iletisimbilgileri.html"); 
  exit;
}


$_SESSION['form_data'] = [
  'name' => $name,
  'email' => $email,
  'phone' => $phone,
  'gender' => $gender,
  'hobbies' => $hobbies,
  'city' => $city,
  'message' => $message
];


header("Location: iletisimformgoster.php");
exit;
?>