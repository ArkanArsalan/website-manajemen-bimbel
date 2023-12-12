<?php
include_once("header.php");
include("database.php");

if (isset($_GET['id_course']) && isset($_GET['id_materi'])) {
    $id_course = $_GET['id_course'];
    $id_materi = $_GET['id_materi'];

    $deleteSql = "DELETE FROM materi_course WHERE id_materi = '$id_materi'";

    if (mysqli_query($db, $deleteSql)) {
        echo "<div class='alert alert-success'>Material deleted successfully!</div>";

        header("refresh:1;url=list-materi.php?course=$id_course");
    } else {
        echo "<div class='alert alert-danger'>Error deleting material: " . mysqli_error($db) . "</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request. Please provide valid course and material IDs.</div>";
}

include_once("footer.php");
?>