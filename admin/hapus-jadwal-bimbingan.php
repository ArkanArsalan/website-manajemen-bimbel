<?php
    include_once("database.php");

    // Check if the ID parameter is present in the URL
    if (isset($_GET['id_jb'])) {
        $id_jb = $_GET['id_jb'];

        // Delete the schedule from the database
        $deleteSql = "DELETE FROM jadwal_bimbingan WHERE id_jb = '$id_jb'";

        if (mysqli_query($db, $deleteSql)) {
            echo "<div class='alert alert-success'>Jadwal deleted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting jadwal: " . mysqli_error($db) . "</div>";
        }

        header('Location: jadwal-bimbingan.php');
    }
?>