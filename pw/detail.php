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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<title>Detail Buku</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-success p-2 fixed-top text-dark bg-opacity-50">
		<div class="container-md">
			<a class="navbar-brand fst-italic fs-3">Novelku Cinta Islam</a>
		</div>
	</nav>

	<div class="shadow p-5 mb-5 bg-body rounded ">
		<div class="row">
			<div class="col-md-3">
				<img class="pt-5 mx-5" src="../img/<?php echo $bk['gambar_buku']; ?>" width="200">
			</div>
			<div class="col-md-4 pt-5">
				<div class="card" style="width: 27rem;">
					<div class="card-header">
						Detail Buku
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">ID Buku : <?php echo $bk['id_buku']; ?></li>
						<li class="list-group-item">Judul Buku : <?php echo $bk['judul_buku']; ?></li>
						<li class="list-group-item">Pengarang Buku : <?php echo $bk['pengarang_buku']; ?></li>
						<li class="list-group-item">Penerbit Buku : <?php echo $bk['penerbit_buku']; ?></li>
						<li class="list-group-item"><a href="ubah.php?id_buku=<?php echo $bk['id_buku']; ?>">Ubah</a> | <a href="hapus.php?id_buku=<?php echo $bk['id_buku']; ?>" onclick="return confirm('apakah anda yakin?');">Hapus</a></li>
						<li class="list-group-item"><a href="index.php">Kembali</a></li>
					</ul>
				</div>
			</div>
		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>