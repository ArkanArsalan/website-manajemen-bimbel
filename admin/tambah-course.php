<?php
include_once("header.php");
include("database.php");
?>

<div class="container mt-5">
    <h1>Tambah course</h1>
    <form method="post" action="app-course.php">
        <div class="form-group">
            <input type="text" class="form-control" id="nama_course" name="nama_course" placeholder="Nama course" required>
        </div>
        <button name="tambah" type="submit" class="btn btn-primary">Tambah course</button>
    </form>
</div>

<?php include_once("footer.php"); ?>