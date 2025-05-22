<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Statik profil bilgileri örneği
$profile = [
    'email' => 'ugurgokmenogr@sakarya.edu.tr',
    'student_no' => $_SESSION['student_no'],
    'faculty' => 'Bilgisayar ve Bilişim Bilimleri Fakültesi',
    'department' => 'Bilgisayar Mühendisliği'
];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hoşgeldiniz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
  <h2>Hoşgeldiniz!</h2>
  <div class="card p-4">
    <p><strong>Email:</strong> <?php echo htmlspecialchars($profile['email']); ?></p>
    <p><strong>Öğrenci No:</strong> <?php echo htmlspecialchars($profile['student_no']); ?></p>
    <p><strong>Fakülte:</strong> <?php echo htmlspecialchars($profile['faculty']); ?></p>
    <p><strong>Bölüm:</strong> <?php echo htmlspecialchars($profile['department']); ?></p>
    <a href="byebye.php" class="btn btn-danger mt-3">Çıkış Yap</a>
  </div>
</div>
</body>
</html>
