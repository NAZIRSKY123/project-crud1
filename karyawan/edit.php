<?php
include('../config.php'); 
include('../includes/header.php');
$id = $_GET['id'];
$sql = "SELECT * FROM karyawan WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<h2>Edit Karyawan</h2>
<form method="POST" action="">
 <div class="form-group mb-3">
 <label for="name">Nama Karyawan</label>
 <input type="text" name="name" class="form-control" value="<?= $row['nama']; ?>" required>
 </div>
 <div class="form-group mb-3">
 <label for="gaji">Gaji</label>
 <textarea name="gaji" class="form-control" required><?= $row['gaji']; ?>
</textarea>
 </div>
 <div class="form-group mb-3">
 <label for="tanggal_bergabung">Tangagl Bergabung</label>
 <input type="number" name="price" class="form-control" 
value="<?= $row['tanggal_bergabung']; ?>" required>
 </div>
<button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button> 
</form>
 <?php include('../includes/footer.php'); ?>
<?php
if (isset($_POST['submit'])) {
 $name = $_POST['name'];
 $description = $_POST['description'];
 $price = $_POST['price'];
$sql = "UPDATE karyawan SET name='$name', description='$description',
 price='$price' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
 header("Location: index.php");
 } else {
 echo "Error: " . $conn->error;
 }
}
?>