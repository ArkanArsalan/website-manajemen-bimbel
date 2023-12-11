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
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card'>";
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

        <?php
        if (isset($_GET['subject'])) {
            $selectedSubjectId = $_GET['subject'];

            $filterSql = "SELECT materi_pelajaran.id_materi, mata_pelajaran.nama_mp, materi_pelajaran.judul, materi_pelajaran.jenis_materi, materi_pelajaran.sumber_belajar
                          FROM materi_pelajaran
                          INNER JOIN mata_pelajaran ON materi_pelajaran.id_mp = mata_pelajaran.id_mp
                          WHERE mata_pelajaran.id_mp = '$selectedSubjectId'";

            $filterQuery = mysqli_query($db, $filterSql);
            ?>
            <div class="col custyle mt-5">
                <h2>Materials for Selected Subject</h2>
                <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>ID Materi</th>
                            <th>Mata Pelajaran</th>
                            <th>Judul Materi</th>
                            <th>Jenis Materi</th>
                            <th>Sumber Belajar</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($materi = mysqli_fetch_array($filterQuery)) {
                            echo "<tr>";
                            echo "<td>" . $materi['id_materi'] . "</td>";
                            echo "<td>" . $materi['nama_mp'] . "</td>";
                            echo "<td>" . $materi['judul'] . "</td>";
                            echo "<td>" . $materi['jenis_materi'] . "</td>";
                            echo "<td>" . $materi['sumber_belajar'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<a class='btn btn-info btn-xs' href='edit-materi.php?id=" . $materi['id_materi'] . "' ><span class='glyphicon glyphicon-edit'></span>Edit</a> | ";
                            echo "<a class='btn btn-danger btn-xs' href='app-materi.php?id=" . $materi['id_materi'] . "'><span class='glyphicon glyphicon-remove'></span>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <p style="font-weight: bolder">Total : <?php echo mysqli_num_rows($filterQuery) ?></p>
                <p style="text-align: right; margin:15px">
                    <a href="tambah-materi.php" class="btn btn-primary btn-xs col-md-3">Tambah Baru</a>
                </p>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php include_once("footer.php") ?>