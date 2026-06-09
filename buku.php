<!DOCTYPE html>
<html>
<head>
  <title>CRUD Buku</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background-image: url('images/rak_modern.png'); /* pastikan nama file sesuai */
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: 40px auto;
      background: rgba(255,255,255,0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h2, h3 {
      text-align: center;
      color: #222;
    }
    form {
      margin-bottom: 20px;
    }
    input, select, button {
      margin: 5px 0;
      padding: 8px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      background-color: #0078D7;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #005fa3;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 10px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #0078D7;
      color: white;
    }
    a.edit {
      color: #0078D7;
      font-weight: bold;
    }
    a.hapus {
      color: #d9534f;
      font-weight: bold;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
<div class="container">
<?php
include 'koneksi.php';

// CREATE
if(isset($_POST['simpan'])){
    if(!empty($_POST['judul']) && !empty($_POST['pengarang']) && !empty($_POST['kategori'])){
        $judul     = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $kategori  = $_POST['kategori'];
        $status    = $_POST['status'];

        $sql = "INSERT INTO buku (judul, pengarang, kategori, status) 
                VALUES ('$judul','$pengarang','$kategori','$status')";
        mysqli_query($conn, $sql);
        echo "<p>✅ Data buku berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color:red;'>⚠️ Semua field wajib diisi!</p>";
    }
}

// UPDATE
if(isset($_POST['update'])){
    $id        = $_POST['id_buku'];
    $judul     = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $kategori  = $_POST['kategori'];
    $status    = $_POST['status'];

    $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', 
            kategori='$kategori', status='$status' WHERE id_buku='$id'";
    mysqli_query($conn, $sql);
    echo "<p>🖋️ Data buku berhasil diupdate!</p>";
}

// DELETE
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $sql = "DELETE FROM buku WHERE id_buku='$id'";
    mysqli_query($conn, $sql);
    echo "<p>🗑️ Data buku berhasil dihapus!</p>";
}
?>

<h3>Tambah Buku</h3>
<form method="POST">
    Judul: <input type="text" name="judul" required><br>
    Pengarang: <input type="text" name="pengarang" required><br>
    Kategori: <input type="text" name="kategori" required><br>
    Status: 
    <select name="status">
        <option value="tersedia">Tersedia</option>
        <option value="dipinjam">Dipinjam</option>
    </select><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<hr>

<?php
// READ
$sql = "SELECT * FROM buku";
$result = mysqli_query($conn, $sql);

echo "<h3>Daftar Buku</h3>";
echo "<table>
<tr><th>ID</th><th>Judul</th><th>Pengarang</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>";

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>".$row['id_buku']."</td>
            <td>".$row['judul']."</td>
            <td>".$row['pengarang']."</td>
            <td>".$row['kategori']."</td>
            <td>".$row['status']."</td>
            <td>
                <a class='edit' href='buku.php?edit=".$row['id_buku']."'>Edit</a> | 
                <a class='hapus' href='buku.php?hapus=".$row['id_buku']."'>Hapus</a>
            </td>
          </tr>";
}
echo "</table>";