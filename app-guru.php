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
    else if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $mata_pelajaran = $_POST['mata_pelajaran'];

        // Update guru details
        $sqlUpdateGuru = "UPDATE guru SET nama='$nama', umur='$umur', alamat='$alamat', no_telp='$no_telp', email='$email', jenis_kelamin='$jenis_kelamin' WHERE id_guru=$id";
        $queryUpdateGuru = mysqli_query($db, $sqlUpdateGuru);

        // Remove existing guru assignments
        $sqlDeleteAssignments = "DELETE FROM guru_mengajar WHERE id_guru=$id";
        $queryDeleteAssignments = mysqli_query($db, $sqlDeleteAssignments);

        // Insert new guru assignments
        foreach ($mata_pelajaran as $mp) {
            $sqlInsertAssignment = "INSERT INTO guru_mengajar (id_guru, id_mp) VALUES ($id, $mp)";
            $queryInsertAssignment = mysqli_query($db, $sqlInsertAssignment);
        }

        if ($queryUpdateGuru && $queryDeleteAssignments) {
            header('Location: list-guru.php?status=success');
        } else {
            header('Location: list-guru.php?status=failure');
        }
    }
    else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $deleteGuruMengajar = mysqli_query($db, "DELETE FROM guru_mengajar WHERE id_guru=$id");
        $sql = "DELETE FROM guru WHERE id_guru=$id";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: list-guru.php');
        } else {
            die("Gagal menghapus...");
        }
    } 
    else {
        die("Akses Dilarang...");
    }
?>
