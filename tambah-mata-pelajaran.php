<?php
include_once("header.php");
include("database.php");
?>

<div class="container mt-5">
    <h1>Tambah Mata Pelajaran</h1>
    <form method="post" action="app-mata-pelajaran.php">
        <div class="form-group">
            <input type="text" class="form-control" id="nama_mata_pelajaran" name="nama_mata_pelajaran" placeholder="Nama Mata Pelajaran" required>
        </div>
        <button name="tambah" type="submit" class="btn btn-primary">Tambah Mata Pelajaran</button>
    </form>
</div>

<?php include_once("footer.php"); ?>