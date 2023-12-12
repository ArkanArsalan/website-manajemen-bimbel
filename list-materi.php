<?php
include_once("header.php");
include("database.php");
?>

<div class="list-guru-container">
    <h1>List Materi Course</h1>

    <div class="container" style="margin-top: 20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%">
        <!-- Display Table-->
        <div class="col custyle">
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>Judul Materi</th>
                        <th>Jenis Materi</th>
                        <th>Sumber Materi</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_GET['course'])) {
                        $selectedSubjectId = $_GET['course'];

                        // Fetch and display details of learning materials for the selected subject
                        $filterSql = "SELECT id_materi, judul, jenis_materi, sumber_materi
                                      FROM materi_course
                                      WHERE id_course = '$selectedSubjectId'";

                        $filterQuery = mysqli_query($db, $filterSql);

                        while ($materi = mysqli_fetch_array($filterQuery)) {
                            echo "<tr>";
                            echo "<td>" . $materi['judul'] . "</td>";
                            echo "<td>" . $materi['jenis_materi'] . "</td>";
                            echo "<td><a href='" . $materi['sumber_materi'] . "' target='_blank'>" . $materi['sumber_materi'] . "</a></td>";
                            echo "<td class='text-center'>";
                            echo "<a class='btn btn-danger btn-xs' href='hapus-materi.php?id_course=" . $selectedSubjectId . "&id_materi=" . $materi['id_materi'] . "' onclick='return confirm(\"Are you sure you want to delete this material?\")'><span class='glyphicon glyphicon-remove'></span>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Invalid request. Please select a valid subject.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php if (isset($_GET['course'])): ?>
                <p style="font-weight: bolder">Total : <?php echo mysqli_num_rows($filterQuery) ?></p>
                <p style="text-align: right; margin:15px">
                    <a href="tambah-materi.php?id_course=<?php echo $selectedSubjectId; ?>" class="btn btn-primary btn-xs col-md-3">Tambah Baru</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include_once("footer.php")?>
