<?php  
	function koneksi() {
		return mysqli_connect('localhost', 'root', '', 'prakweb_2022_b_203040084');
	}

	function query($query) {
		$conn = koneksi();
	
		$result = mysqli_query($conn, $query);
	
		// jika hasilnya hanya 1 data
		if (mysqli_num_rows($result) == 1) {
			return mysqli_fetch_assoc($result);
		}
	
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
	
		return $rows;
	}

	// Upload Gambar
	function upload() {
		$nama_file = $_FILES['gambar_buku']['name'];
		$tipe_file = $_FILES['gambar_buku']['type'];
		$ukuran_file = $_FILES['gambar_buku']['size'];
		$error = $_FILES['gambar_buku']['error'];
		$tmp_file = $_FILES['gambar_buku']['tmp_name'];

		// ketika tidak ada gambar yang terpilih
		if ($error == 4) {
			// echo "<script>
			// 	alert('pilih gambar terlebih dahulu!');
			// 	</script>";
			return '../img/nofoto.jpg';
		}

		// cek ekstensi file
		$daftar_gambar = ['jpg', 'jpeg', 'png'];
		$ekstensi_file = explode('.', $nama_file);
		$ekstensi_file = strtolower(end($ekstensi_file));
		if (!in_array($ekstensi_file, $daftar_gambar)) {
			echo "<script>
				alert('yang anda pilih bukan gambar!');
				</script>";
			return false;
		}

		// cek tipe file
		if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/jpg') {
			echo "<script>
				alert('yang anda pilih bukan gambar!');
				</script>";
			return false;
		}

		// cek ukuran file
		// maksimal 5mb == 5000000b
		if ($ukuran_file > 5000000) {
			echo "<script>
				alert('ukuran file terlalu besar!');
				</script>";
			return false;
		}

		// lolos pengecekan
		// siap upload file
		// generate nama file baru
		$nama_file_baru = uniqid();
		$nama_file_baru .= '.';
		$nama_file_baru .= $ekstensi_file;
		move_uploaded_file($tmp_file, '../img/' . $nama_file_baru);

		return $nama_file_baru;
	}

	// Tambah Buku
	function tambah($data) {
		$conn = koneksi();

		$id = htmlspecialchars($data['id_buku']);
		$judul = htmlspecialchars($data['judul_buku']);
		$pengarang = htmlspecialchars($data['pengarang_buku']);
		$penerbit = htmlspecialchars($data['penerbit_buku']);

		// upload gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		}

		$query = "INSERT INTO buku VALUES('$id', '$judul', '$pengarang', '$penerbit', '$gambar')";
		mysqli_query($conn, $query) or die(mysqli_error($conn));
		return mysqli_affected_rows($conn);
	}

	// Hapus Buku
	function hapus($id) {
		$conn = koneksi();
	
		// menghapus gambar di folder img
		$bk = query("SELECT * FROM buku WHERE id_buku = '$id'");
		if ($bk['gambar_buku'] != 'nofoto.jpg') {
			unlink('../img/' . $bk['gambar_buku']);
		}
	
		mysqli_query($conn, "DELETE FROM buku WHERE id_buku = '$id'") or die(mysqli_error($conn));
		return mysqli_affected_rows($conn);
	}

	// Ubah Buku
	function ubah($data) {
		$conn = koneksi();
	
		$id = htmlspecialchars($data['id_buku']);
		$judul = htmlspecialchars($data['judul_buku']);
		$pengarang = htmlspecialchars($data['pengarang_buku']);
		$penerbit = htmlspecialchars($data['penerbit_buku']);
		$gambar_lama = htmlspecialchars($data['gambar_lama']);
	
		$gambar = upload();
		if (!$gambar) {
			return false;
		}
	
		if ($gambar == 'nofoto.jpg') {
			$gambar = $gambar_lama;
		}
	
		$query = "UPDATE buku SET judul_buku = '$judul', pengarang_buku = '$pengarang', penerbit_buku = '$penerbit', gambar_buku = '$gambar' WHERE id_buku = '$id'";
		mysqli_query($conn, $query) or die(mysqli_error($conn));
		return mysqli_affected_rows($conn);
	}
?>