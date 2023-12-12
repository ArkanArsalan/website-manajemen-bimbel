<?php
    include("database.php");

    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $course_id = isset($_POST['course_id']) ? $_POST['course_id'] : array();
        $cabang_bimbel = $_POST['cabang_bimbel']; 
    
        // Insert into guru table
        $sqlGuru = "INSERT INTO guru (nama, umur, alamat, no_telp, email, jenis_kelamin, cabang_bimbel) VALUES ('$nama', '$umur', '$alamat', '$no_telp', '$email', '$jenis_kelamin', '$cabang_bimbel')";
        $queryGuru = mysqli_query($db, $sqlGuru);
    
        if ($queryGuru) {
            $id_guru = mysqli_insert_id($db);
    
            // Insert into guru_mengajar table
            foreach ($course_id as $id_course) {
                $sqlGuruMengajar = "INSERT INTO guru_mengajar (id_guru, id_course) VALUES ('$id_guru', '$id_course')";
                $queryGuruMengajar = mysqli_query($db, $sqlGuruMengajar);
    
                if (!$queryGuruMengajar) {
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
        $courses = $_POST['courses'];
        $cabang_bimbel = $_POST['cabang_bimbel'];
    
        // Update guru details
        $sqlUpdateGuru = "UPDATE guru SET nama='$nama', umur='$umur', alamat='$alamat', no_telp='$no_telp', email='$email', jenis_kelamin='$jenis_kelamin', cabang_bimbel='$cabang_bimbel' WHERE id_guru=$id";
        $queryUpdateGuru = mysqli_query($db, $sqlUpdateGuru);
    
        // Remove existing guru assignments
        $sqlDeleteAssignments = "DELETE FROM guru_mengajar WHERE id_guru=$id";
        $queryDeleteAssignments = mysqli_query($db, $sqlDeleteAssignments);
    
        // Insert new guru assignments
        foreach ($courses as $course_id) {
            $sqlInsertAssignment = "INSERT INTO guru_mengajar (id_guru, id_course) VALUES ($id, $course_id)";
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
