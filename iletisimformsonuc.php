<?php
function temizle($veri) {
    return htmlspecialchars(trim($veri));
}

$adsoyad = isset($_POST['adsoyad']) ? temizle($_POST['adsoyad']) : '';
$email = isset($_POST['email']) ? temizle($_POST['email']) : '';
$telefon = isset($_POST['telefon']) ? temizle($_POST['telefon']) : '';
$konu = isset($_POST['konu']) ? temizle($_POST['konu']) : '';
$mesaj = isset($_POST['mesaj']) ? temizle($_POST['mesaj']) : '';
$cinsiyet = isset($_POST['cinsiyet']) ? temizle($_POST['cinsiyet']) : 'Belirtilmedi';
$izin = isset($_POST['izin']) && $_POST['izin'] === 'true' ? 'Evet' : 'Hayır';

$hatalar = [];

// Validasyon
if (empty($adsoyad)) $hatalar[] = "Ad Soyad boş olamaz.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $hatalar[] = "Geçerli bir e-mail adresi girin.";
if (!preg_match('/^\d+$/', $telefon)) $hatalar[] = "Telefon sadece rakamlardan oluşmalıdır.";
if (empty($konu)) $hatalar[] = "Konu seçilmelidir.";
if (empty($mesaj)) $hatalar[] = "Mesaj boş olamaz.";

// Dosya yükleme
$dosyaYolu = '';
$dosyaYuklendi = false;
if (isset($_FILES['dosya']) && $_FILES['dosya']['error'] === UPLOAD_ERR_OK) {
    $hedefKlasor = 'yuklenen_dosyalar/';
    if (!file_exists($hedefKlasor)) {
        mkdir($hedefKlasor, 0777, true);
    }

    $dosyaAdi = basename($_FILES['dosya']['name']);
    $hedefYol = $hedefKlasor . uniqid() . '_' . $dosyaAdi;

    if (move_uploaded_file($_FILES['dosya']['tmp_name'], $hedefYol)) {
        $dosyaYolu = $hedefYol;
        $dosyaYuklendi = true;
    } else {
        $hatalar[] = "Dosya yüklenirken bir hata oluştu.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Form Sonucu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h2 class="mb-4">Form Sonucu</h2>

  <?php if (!empty($hatalar)) : ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($hatalar as $hata) : ?>
          <li><?= $hata ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php else: ?>
    <div class="alert alert-success">Form başarıyla gönderildi!</div>
    <ul class="list-group">
      <li class="list-group-item"><strong>Ad Soyad:</strong> <?= $adsoyad ?></li>
      <li class="list-group-item"><strong>Email:</strong> <?= $email ?></li>
      <li class="list-group-item"><strong>Telefon:</strong> <?= $telefon ?></li>
      <li class="list-group-item"><strong>Konu:</strong> <?= $konu ?></li>
      <li class="list-group-item"><strong>Mesaj:</strong> <?= $mesaj ?></li>
      <li class="list-group-item"><strong>Cinsiyet:</strong> <?= $cinsiyet ?></li>
      <li class="list-group-item"><strong>İzin Verdi mi?:</strong> <?= $izin ?></li>
      <li class="list-group-item"><strong>Yüklenen Dosya:</strong> 
        <?php if ($dosyaYuklendi): ?>
          <a href="<?= $dosyaYolu ?>" target="_blank"><?= basename($dosyaYolu) ?></a>
        <?php else: ?>
          Dosya yüklenmedi.
        <?php endif; ?>
      </li>
    </ul>
  <?php endif; ?>
</body>
</html>
