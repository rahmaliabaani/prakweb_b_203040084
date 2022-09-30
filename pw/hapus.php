<?php 
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id_buku'])) {
	header("Location: index.php");
	exit;
}

// mengambil id dari url
$id = $_GET['id_buku'];

if (hapus($id) > 0) {
		echo "<script>
		alert('Data berhasil dihapus!');
		document.location.href = 'index.php';
		</script>";
	} else {
		echo "<script>
		alert('Data gagal dihapus!');
		document.location.href = 'index.php';
		</script>";
	}
