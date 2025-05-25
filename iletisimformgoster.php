<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Form Sonuçları</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="stiller.css">
</head>
<body class="container py-5">
  <h2 class="mb-4">Form Bilgileri</h2>
  <ul class="list-group">
    <li class="list-group-item"><strong>Ad Soyad:</strong> <span id="adsoyad"></span></li>
    <li class="list-group-item"><strong>Email:</strong> <span id="email"></span></li>
    <li class="list-group-item"><strong>Telefon:</strong> <span id="telefon"></span></li>
    <li class="list-group-item"><strong>Konu:</strong> <span id="konu"></span></li>
    <li class="list-group-item"><strong>Mesaj:</strong> <span id="mesaj"></span></li>
    <li class="list-group-item"><strong>Cinsiyet:</strong> <span id="cinsiyet"></span></li>
    <li class="list-group-item"><strong>İzin Verdi mi:</strong> <span id="izin"></span></li>
    <li class="list-group-item"><strong>Dosya:</strong> <a id="dosya" href="#" target="_blank">Yüklü dosya</a></li>
  </ul>

  
   <div class="text-center mt-5">
      <a href="index2.html" class="btn btn-outline-primary">Ana Sayfaya Dön</a>
   </div>

  <script>
    const params = new URLSearchParams(window.location.search);
    document.getElementById('adsoyad').textContent = params.get('adsoyad') || '';
    document.getElementById('email').textContent = params.get('email') || '';
    document.getElementById('telefon').textContent = params.get('telefon') || '';
    document.getElementById('konu').textContent = params.get('konu') || '';
    document.getElementById('mesaj').textContent = params.get('mesaj') || '';
    document.getElementById('cinsiyet').textContent = params.get('cinsiyet') || '';
    document.getElementById('izin').textContent = params.get('izin') === 'true' ? 'Evet' : 'Hayır';
    const dosyaYolu = params.get('dosyayolu');
    const dosyaLink = document.getElementById('dosya');
    if (dosyaYolu) {
      dosyaLink.href = dosyaYolu;
      dosyaLink.textContent = dosyaYolu.split('/').pop();
    } else {
      dosyaLink.textContent = 'Dosya yüklenmedi';
      dosyaLink.removeAttribute('href');
    }
  </script>
</body>
</html>
