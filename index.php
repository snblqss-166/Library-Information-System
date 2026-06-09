<!DOCTYPE html>
<html>
<head>
  <title>Sistem Perpustakaan</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background-image: url('rak_modern.png');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: 60px auto;
      background: rgba(255,255,255,0.9);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.15);
      text-align: center;
    }
    h1 {
      color: #0078D7;
      margin-bottom: 20px;
    }
    .menu {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 30px;
    }
    .menu a {
      display: inline-block;
      padding: 15px 30px;
      background-color: #0078D7;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 18px;
      transition: 0.3s;
    }
    .menu a:hover {
      background-color: #005fa3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>📚 Sistem Perpustakaan</h1>
    <p>Selamat datang di aplikasi perpustakaan sederhana. Silakan pilih menu di bawah:</p>
    <div class="menu">
      <a href="buku.php">Kelola Buku</a>
      <a href="anggota.php">Kelola Anggota</a>
    </div>
  </div>
</body>
</html>
