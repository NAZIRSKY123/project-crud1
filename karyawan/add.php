<?php
include('../config.php');
include('../includes/header.php');
?>
<h2>Tambah Karyawan</h2>
<form method="POST" action="">
 <div class="form-group mb-3">
 <label for="nama">Nama Karyawan</label> 
<input type="text" name="nama" class="form-control" required>
</div>
<div class="form-group mb-3">
 <label for="gaji">Gaji</label>
 <input type="text" name="gaji" class="form-control" required>
 </div>
 <div class="form-group mb-3">
 <label for="jabatan">Jabatan</label>
 <input type="text" name="jabatan" class="form-control" required>
 </div>
 <div class="form-group mb-3">
 <label for="alamat">Alamat</label>
 <input type="text" name="alamat" class="form-control" required>
 </div>
<button type="submit" name="submit" class="btn btn-success">Simpan</button>
</form>
 <?php include('../includes/footer.php'); ?>
<?php
if (isset($_POST['submit'])) { 
 $nama = $_POST['nama'];
 $gaji = $_POST['gaji'];
 $jabatan = $_POST['jabatan'];
 $alamat = $_POST['alamat'];
 $sql = "INSERT INTO karyawan (nama, gaji, jabatan, alamat) 
 VALUES ('$nama', '$gaji', '$jabatan', '$alamat')";
if ($conn->query($sql) === TRUE) {
 header("Location: index.php");
 } else {
 echo "Error: " . $conn->error;
 }
}
?>