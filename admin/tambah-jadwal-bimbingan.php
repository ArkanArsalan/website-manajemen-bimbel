<?php
    include("database.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idCourse = $_POST['id_course'];
        $tanggal = $_POST['tanggal'];
        $jamMulai = $_POST['jam_mulai'];
        $jamSelesai = $_POST['jam_selesai'];

        // Insert the new schedule into the database
        $insertSql = "INSERT INTO jadwal_bimbingan (id_course, tanggal, jam_mulai, jam_selesai) VALUES ('$idCourse', '$tanggal', '$jamMulai', '$jamSelesai')";
        
        if (mysqli_query($db, $insertSql)) {
            header('Location: jadwal-bimbingan.php');
        }
    }
?>