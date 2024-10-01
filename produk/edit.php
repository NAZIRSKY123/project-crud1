<?php
include('../config.php'); 
include('../includes/header.php');
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<h2>Edit Produk</h2>
<form method="POST" action="">
 <div class="form-group mb-3">
 <label for="nama">Nama Produk</label>
 <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" required>
 </div>
 <div class="form-group mb-3">
 <label for="description">Deskripsi</label>
 <textarea name="description" class="form-control" required><?= $row['description']; ?>
</textarea>
 </div>
 <div class="form-group mb-3">
 <label for="price">Harga</label>
 <input type="number" name="price" class="form-control" 
value="<?= $row['price']; ?>" required>
 </div>
<button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button> 
</form>
 <?php include('../includes/footer.php'); ?>
<?php
if (isset($_POST['submit'])) {
 $nama = $_POST['nama'];
 $description = $_POST['description'];
 $price = $_POST['price'];
$sql = "UPDATE products SET nama='$nama', description='$description',
 price='$price' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
 header("Location: index.php");
 } else {
 echo "Error: " . $conn->error;
 }

}
?>