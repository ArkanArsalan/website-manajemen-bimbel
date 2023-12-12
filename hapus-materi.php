<?php
    include("database.php");

    if (isset($_GET['id_course']) && isset($_GET['id_materi'])) {
        $id_course = $_GET['id_course'];
        $id_materi = $_GET['id_materi'];

        $deleteSql = "DELETE FROM materi_course WHERE id_materi = '$id_materi'";

        if (mysqli_query($db, $deleteSql)) {
            header("Location: list-materi.php?course=$id_course");
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid request. Please provide valid course and material IDs.</div>";
    }

?>