<?php

require 'functions.php';
$buku = query("SELECT * FROM buku");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success p-2 fixed-top text-dark bg-opacity-50">
        <div class="container-md">
            <a class="navbar-brand fst-italic fs-3">Novelku Cinta Islam</a>
            <a class="text-end fst-italic btn btn-outline-success" type="button" style="text-decoration: none;" href="tambah.php">Tambah Novel</a>
        </div>
    </nav>
    
    <div class="row mt-5 mx-4 justify-content-evenly">
        <?php foreach ($buku as $b) { ?>

            <div class="card mx-2 mt-5" style="width: 14rem;">
                <img width="70px" height="250px" src="../img/<?php echo $b['gambar_buku']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $b['judul_buku']; ?></h5>
                    <p class="card-text fw-lighter">
                        Pengarang : <?php echo $b['pengarang_buku']; ?>
                        <br>
                        Penerbit : <?php echo $b['penerbit_buku']; ?>
                    </p>
                    <a href="detail.php?id_buku=<?php echo $b['id_buku']; ?>" type="button" class="btn btn-outline-success fst-italic">Lihat Detail</a>
                </div>
            </div>

        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>