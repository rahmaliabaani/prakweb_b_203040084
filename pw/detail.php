<?php 
require 'functions.php';

// ambil id dari url
$id = $_GET['id_buku'];

// query mahasiswa berdasarkan id
$bk = query("SELECT * FROM buku WHERE id_buku = '$id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= , initial-scale=1.0">
	<title>Detail Buku</title>
</head>
<body>
	<h3>Detail Buku</h3>
	<ul>
		<li><img src="../img/<?php echo $bk['gambar_buku']; ?>" width="200"></li>
		<li>ID Buku : <?php echo $bk['id_buku']; ?></li>
		<li>Judul Buku : <?php echo $bk['judul_buku']; ?></li>
		<li>Pengarang Buku : <?php echo $bk['pengarang_buku']; ?></li>
		<li>Penerbit Buku : <?php echo $bk['penerbit_buku']; ?></li>
		<li><a href="ubah.php?id_buku=<?php echo $bk['id_buku']; ?>">Ubah</a> | <a href="hapus.php?id_buku=<?php echo $bk['id_buku']; ?>" onclick="return confirm('apakah anda yakin?');">Hapus</a></li>
		<li><a href="index.php">Kembali</a></li>
	</ul>
</body>
</html>