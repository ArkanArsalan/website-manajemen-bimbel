<?php
    include("database.php");

    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $mata_pelajaran = isset($_POST['mata_pelajaran']) ? $_POST['mata_pelajaran'] : array();

        // Insert into guru table
        $sqlGuru = "INSERT INTO guru (nama, umur, alamat, no_telp, email, jenis_kelamin) VALUES ('$nama', '$umur', '$alamat', '$no_telp', '$email', '$jenis_kelamin')";
        $queryGuru = mysqli_query($db, $sqlGuru);

        if ($queryGuru) {
            $id_guru = mysqli_insert_id($db);

            // Insert into guru_mengajar table
            foreach ($mata_pelajaran as $id_mp) {
                $sqlGuruMengajar = "INSERT INTO guru_mengajar (id_guru, id_mp) VALUES ('$id_guru', '$id_mp')";
                $queryGuruMengajar = mysqli_query($db, $sqlGuruMengajar);

                if (!$queryGuruMengajar) {
                    // Handle error, you may choose to rollback the guru insertion
                    header('Location: list-guru.php?status=gagal');
                    exit();
                }
            }

            header('Location: list-guru.php?status=sukses');
        } else {
            header('Location: list-guru.php?status=gagal');
        }
    } 
?>
