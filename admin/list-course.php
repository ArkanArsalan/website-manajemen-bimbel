<?php
include_once("header.php");
include("database.php");
?>

<div class="list-mata-pelajaran">
    <h1>Course</h1>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <?php
            $courseQuery = mysqli_query($db, "SELECT * FROM course");
            while ($course = mysqli_fetch_assoc($courseQuery)) {
                echo "<div class='col-md-3 mb-4'>";
                echo "<div class='card text-center'>";
                echo "<div class='card-body'>";
                echo "<h4>" . $course['nama_course'] . "</h4>";
                echo "<a href='list-materi.php?course=" . $course['id_course'] . "' class='btn btn-primary'>View Materials</a>";
                echo "<div class='mt-2'>";
                echo "<br>";
                echo "<a class='btn btn-danger btn-xs' href='app-course.php?id=" . $course['id_course'] . "'><span class='glyphicon glyphicon-remove'></span>Hapus</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <p style="font-weight: bolder">Total : <?php echo mysqli_num_rows($courseQuery) ?></p>
    <p style="text-align: right; margin: 15px">
        <a href="tambah-course.php" class="btn btn-primary btn-xs col-md-2">Tambah Course</a>
    </p>
</div>

<?php include_once("footer.php") ?>
