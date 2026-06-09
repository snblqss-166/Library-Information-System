<!DOCTYPE html>
<html>
<head>
  <title>CRUD Anggota</title>
  <style>
    body {font-family:"Segoe UI",Arial,sans-serif;background-image:url('rak_modern.png');background-size:cover;background-attachment:fixed;background-position:center;margin:0;padding:0;}
    .container {width:80%;margin:40px auto;background:rgba(255,255,255,0.9);padding:20px;border-radius:10px;box-shadow:0 0 15px rgba(0,0,0,0.1);}
    h2,h3{text-align:center;color:#222;}
    input,button{margin:5px 0;padding:8px;width:100%;border:1px solid #ccc;border-radius:4px;}
    button{background-color:#0078D7;color:white;border:none;cursor:pointer;}
    button:hover{background-color:#005fa3;}
    table{border-collapse:collapse;width:100%;margin-top:10px;}
    th,td{border:1px solid #ddd;padding:8px;text-align:center;}
    th{background-color:#0078D7;color:white;}
    a.edit{color:#0078D7;font-weight:bold;}
    a.hapus{color:#d9534f;font-weight:bold;}
    a:hover{text-decoration:underline;}
  </style>
</head>
<body>
<div class="container">
<?php
include 'koneksi.php';

// CREATE
if(isset($_POST['simpan'])){
    if(!empty($_POST['nama']) && !empty($_POST['alamat']) && !empty($_POST['email']) && !empty($_POST['no_hp'])){
        $nama=$_POST['nama'];$alamat=$_POST['alamat'];$email=$_POST['email'];$no_hp=$_POST['no_hp'];
        $sql="INSERT INTO anggota (nama,alamat,email,no_hp) VALUES ('$nama','$alamat','$email','$no_hp')";
        mysqli_query($conn,$sql);
        echo "<p>✅ Data anggota berhasil ditambahkan!</p>";
    } else {echo "<p style='color:red;'>⚠️ Semua field wajib diisi!</p>";}
}

// UPDATE
if(isset($_POST['update'])){
    $id=$_POST['id_anggota'];$nama=$_POST['nama'];$alamat=$_POST['alamat'];$email=$_POST['email'];$no_hp=$_POST['no_hp'];
    $sql="UPDATE anggota SET nama='$nama',alamat='$alamat',email='$email',no_hp='$no_hp' WHERE id_anggota='$id'";
    mysqli_query($conn,$sql);
    echo "<p>🖋️ Data anggota berhasil diupdate!</p>";
}

// DELETE
if(isset($_GET['hapus'])){
    $id=$_GET['hapus'];
    $sql="DELETE FROM anggota WHERE id_anggota='$id'";
    mysqli_query($conn,$sql);
    echo "<p>🗑️ Data anggota berhasil dihapus!</p>";
}
?>

<h3>Tambah Anggota</h3>
<form method="POST">
    Nama:<input type="text" name="nama" required><br>
    Alamat:<input type="text" name="alamat" required><br>
    Email:<input type="email" name="email" required><br>
    No HP:<input type="text" name="no_hp" required><br>
    <button type="submit" name="simpan">Simpan</button>
</form>
<hr>
<?php
// READ
$sql="SELECT * FROM anggota";$result=mysqli_query($conn,$sql);
echo "<h3>Daftar Anggota</h3><table><tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Email</th><th>No HP</th><th>Aksi</th></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row['id_anggota']."</td><td>".$row['nama']."</td><td>".$row['alamat']."</td><td>".$row['email']."</td><td>".$row['no_hp']."</td>
    <td><a class='edit' href='anggota.php?edit=".$row['id_anggota']."'>Edit</a> | <a class='hapus' href='anggota.php?hapus=".$row['id_anggota']."'>Hapus</a></td></tr>";
}
echo "</table>";

// Form edit
if(isset($_GET['edit'])){
    $id=$_GET['edit'];$sql="SELECT * FROM anggota WHERE id_anggota='$id'";$result=mysqli_query($conn,$sql);$row=mysqli_fetch_assoc($result);
    ?>
    <h3>Edit Anggota</h3>
    <form method="POST">
        <input type="hidden" name="id_anggota" value="<?php echo $row['id_anggota']; ?>">
        Nama:<input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
        Alamat:<input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
        Email:<input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
        No HP:<input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>"><br>
        <button type="submit" name="update">Update</button>
    </form>
    <?php
}
?>
</div>
</body>
</html>
