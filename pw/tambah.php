<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
	if (tambah($_POST) > 0) {
		echo "<script>
		alert('Data berhasil ditambahkan!');
		document.location.href = 'index.php';
		</script>";
	} else {
		echo "<script>
		alert('Data gagal ditambahkan!');
		document.location.href = 'index.php';
		</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Buku</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-success p-2 fixed-top text-dark bg-opacity-50">
		<div class="container-md">
			<a class="navbar-brand fst-italic fs-3">Novelku Cinta Islam</a>
		</div>
	</nav>
	
	<div class="shadow p-5 mb-5 bg-body rounded ">
		<h3 class="pt-5">Form Tambah Data Buku</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-4">
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default" for="id_buku">ID Buku</span>
						<input type="text" class="form-control" autocomplete="off" aria-label="Sizing example input" name="id_buku" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default" for="judul_buku">Judul Buku</span>
						<input type="text" class="form-control" autocomplete="off" aria-label="Sizing example input" name="judul_buku" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-3">
						<input type="file" class="form-control" autocomplete="off" id="inputGroupFile02" name="gambar_buku">
						<label class="input-group-text" for="gambar_buku">Gambar Buku</label>
					</div>
				</div>

				<div class="col-md-4">
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default" for="pengarang_buku">Pengarang Buku</span>
						<input type="text" class="form-control" autocomplete="off" aria-label="Sizing example input" name="pengarang_buku" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default" for="penerbit_buku">Penerbit Buku</span>
						<input type="text" class="form-control" autocomplete="off" aria-label="Sizing example input" name="penerbit_buku" aria-describedby="inputGroup-sizing-default">
					</div>
					<button type="submit" name="tambah" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-danger">Batal</button>
				</div>
			</div>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>