<?php
include('../config.php');
include('../includes/header.php');
?>

<h2>Daftar Karyawan</h2>
<a href="add.php" class="btn btn-success mb-3">Tambah Data</a>
<table class="table table-bordered">
 <thead>
 <tr>
 <th>ID KARYAWAN</th>
 <th>NAMA</th>
 <th>JABATAN</th>
<th>GAJI</th> 
<th>ALAMAT</th> 
<th>AKSI</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $sql = "SELECT * FROM karyawan ORDER BY nama";
 $result = $conn->query($sql);
 if ($result->num_rows > 0):
 $no = 1; 
while ($row = $result->fetch_assoc()):
 ?>
 <tr>
 <td><?= $no++; ?></td>
 <td><?= $row['nama']; ?></td>
 <td><?= $row['jabatan']; ?></td>
 <td>Rp. <?= number_format($row['gaji']); ?></td>
 <td><?= $row['alamat']; ?></td>
 <td>
 <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
 <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" 
 onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
 </td>
 </tr>
<?php 
endwhile; 
else: 
?>
 <tr>
 <td colspan="5">Tidak ada data karyawan</td>
 </tr> 
<?php 
endif; 
?>
 </tbody>
</table>
<?php include('../includes/footer.php'); ?>