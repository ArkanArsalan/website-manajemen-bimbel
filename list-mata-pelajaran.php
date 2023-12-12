<?php
include_once("header.php");
include("database.php");
?>

<div class="list-mata-pelajaran">
    <h1>Mata Pelajaran</h1>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <?php
            $mataPelajaranQuery = mysqli_query($db, "SELECT * FROM mata_pelajaran");
            while ($subject = mysqli_fetch_assoc($mataPelajaranQuery)) {
                echo "<div class='col-md-3 mb-4'>";
                echo "<div class='card text-center'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $subject['nama_mp'] . "</h5>";
                echo "<p class='card-text'>Click to view materials</p>";
                echo "<a href='list-materi.php?subject=" . $subject['id_mp'] . "' class='btn btn-primary'>View Materials</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <p style="font-weight : bolder">Total : <?php echo mysqli_num_rows($mataPelajaranQuery) ?></p>
    <p style="text-align: right; margin:15px">
        <a href="tambah-mata-pelajaran.php" class="btn btn-primary btn-xs col-md-2">Tambah Mata Pelajaran</a>
    </p>
</div>

<?php include_once("footer.php") ?>