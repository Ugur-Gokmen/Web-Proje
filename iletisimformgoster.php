<?php
session_start();
$data = $_SESSION['form_data'] ?? null;

if (!$data) {
  echo "Veri bulunamadı. Lütfen formu doldurup tekrar deneyin.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Form Bilgileri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title text-success">Form Bilgileri Başarıyla Gönderildi 🎉</h3>
            <ul class="list-group list-group-flush mt-4">
              <li class="list-group-item"><strong>Ad Soyad:</strong> <?= htmlspecialchars($data['name']) ?></li>
              <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></li>
              <li class="list-group-item"><strong>Telefon:</strong> <?= htmlspecialchars($data['phone']) ?></li>
              <li class="list-group-item"><strong>Cinsiyet:</strong> <?= htmlspecialchars($data['gender']) ?></li>
              <li class="list-group-item"><strong>Hobiler:</strong> <?= htmlspecialchars(implode(', ', $data['hobbies'])) ?></li>
              <li class="list-group-item"><strong>Şehir:</strong> <?= htmlspecialchars($data['city']) ?></li>
              <li class="list-group-item"><strong>Mesaj:</strong> <?= nl2br(htmlspecialchars($data['message'])) ?></li>
            </ul>
            <a href="index.html" class="btn btn-primary mt-4">Yeni Form Gönder</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>