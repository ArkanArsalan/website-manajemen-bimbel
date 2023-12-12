<?php
    include("database.php");

    if (isset($_POST['tambah'])) {
        // Collect form data
        $nama_course = $_POST['nama_course'];

        // Insert data into the database
        $sql = "INSERT INTO course (nama_course) VALUES ('$nama_course')";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: list-course.php?status=sukses');
        } else {
            header('Location: list-course.php?status=gagal');
        }
    }
    else if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $deleteGuruMengajar = mysqli_query($db, "DELETE FROM materi_course WHERE id_course=$id");
        $query = mysqli_query($db, "DELETE FROM course WHERE id_course=$id");

        if ($query) {
            header('Location: list-course.php');
        } else {
            die("Gagal menghapus...");
        }
    } 
    else {
        die("Akses Dilarang...");
    }

?>
