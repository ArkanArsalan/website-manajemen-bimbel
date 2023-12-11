<?php
    include("database.php");

    if (isset($_POST['tambah'])) {
        // Collect form data
        $namaMataPelajaran = $_POST['nama_mata_pelajaran'];

        // Insert data into the database
        $sql = "INSERT INTO mata_pelajaran (nama_mp) VALUES ('$namaMataPelajaran')";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: list-mata-pelajaran.php?status=sukses');
        } else {
            header('Location: list-mata-pelajaran.php?status=gagal');
        }
    }
?>
