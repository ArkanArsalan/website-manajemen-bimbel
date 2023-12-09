<?php include_once("header.php")?>
<?php include("database.php")?>

<div class="list-guru-container">
    <h1>List Daftar Guru</h1>

    <div class="container" style="margin-top:20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%">
        <!-- Display Table-->
        <div class="col custyle">
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>ID Guru</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Mata Pelajaran Mengajar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        // Fetch and display details of teachers and the subjects they teach
                        $guruQuery = mysqli_query($db, "SELECT guru.id_guru, guru.nama, guru.umur, guru.alamat, guru.no_telp, guru.email, guru.jenis_kelamin, GROUP_CONCAT(CONCAT(mata_pelajaran.nama_mp, ' ', mata_pelajaran.jenjang_sekolah) SEPARATOR ', ') AS mata_pelajaran
                                                        FROM guru
                                                        LEFT JOIN guru_mengajar ON guru.id_guru = guru_mengajar.id_guru
                                                        LEFT JOIN mata_pelajaran ON guru_mengajar.id_mp = mata_pelajaran.id_mp
                                                        GROUP BY guru.id_guru");

                        while ($guru = mysqli_fetch_array($guruQuery)) {
                            echo "<tr>";
                            echo "<td>" . $guru['id_guru'] . "</td>";
                            echo "<td>" . $guru['nama'] . "</td>";
                            echo "<td>" . $guru['umur'] . "</td>";
                            echo "<td>" . $guru['alamat'] . "</td>";
                            echo "<td>" . $guru['no_telp'] . "</td>";
                            echo "<td>" . $guru['email'] . "</td>";
                            echo "<td>" . $guru['jenis_kelamin'] . "</td>";
                            echo "<td>" . $guru['mata_pelajaran'] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <p style="font-weight: bolder">Total : <?php echo mysqli_num_rows($guruQuery) ?></p>
        </div>
    </div>
</div>

<?php include_once("footer.php")?>