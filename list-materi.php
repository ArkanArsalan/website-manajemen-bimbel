<?php
include_once("header.php");
include("database.php");
?>

<div class="list-guru-container">
    <h1>List Materi Pelajaran</h1>

    <div class="container" style="margin-top: 20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%">
        <!-- Display Table-->
        <div class="col custyle">
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>ID Materi</th>
                        <th>Judul Materi</th>
                        <th>Jenis Materi</th>
                        <th>Sumber Belajar</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_GET['subject'])) {
                        $selectedSubjectId = $_GET['subject'];

                        // Fetch and display details of learning materials for the selected subject
                        $filterSql = "SELECT id_materi, judul, jenis_materi, sumber_belajar
                                      FROM materi_pelajaran
                                      WHERE id_mp = '$selectedSubjectId'";

                        $filterQuery = mysqli_query($db, $filterSql);

                        while ($materi = mysqli_fetch_array($filterQuery)) {
                            echo "<tr>";
                            echo "<td>" . $materi['id_materi'] . "</td>";
                            echo "<td>" . $materi['judul'] . "</td>";
                            echo "<td>" . $materi['jenis_materi'] . "</td>";
                            echo "<td>" . $materi['sumber_belajar'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<a class='btn btn-info btn-xs' href='edit-materi.php?id=" . $materi['id_materi'] . "' ><span class='glyphicon glyphicon-edit'></span>Edit</a> | ";
                            echo "<a class='btn btn-danger btn-xs' href='app-materi.php?id=" . $materi['id_materi'] . "'><span class='glyphicon glyphicon-remove'></span>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Invalid request. Please select a valid subject.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php if (isset($_GET['subject'])): ?>
                <p style="font-weight: bolder">Total : <?php echo mysqli_num_rows($filterQuery) ?></p>
                <p style="text-align: right; margin:15px">
                    <a href="tambah-materi.php" class="btn btn-primary btn-xs col-md-3">Tambah Baru</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include_once("footer.php")?>
