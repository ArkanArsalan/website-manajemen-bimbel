<?php include_once("header.php")?>
<?php include("database.php")?>

<div class="list-guru-container">
    <h1>List Daftar Guru</h1>

    <div class="container" style="margin-top:20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%">
        <!-- Filter -->
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cabang">Cabang Bimbel</label>
                    <select name="cabang" class="form-control">
                        <option value="">-- Pilih Cabang --</option>
                        <?php
                            $cabangQuery = mysqli_query($db, "SELECT DISTINCT cabang_bimbel FROM guru");
                            while ($row = mysqli_fetch_assoc($cabangQuery)) {
                                echo "<option value='" . $row['cabang_bimbel'] . "'>" . $row['cabang_bimbel'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <select name="mata_pelajaran" class="form-control">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        <?php
                            $mataPelajaranQuery = mysqli_query($db, "SELECT DISTINCT mata_pelajaran.nama_mp FROM guru
                                                                    LEFT JOIN guru_mengajar ON guru.id_guru = guru_mengajar.id_guru
                                                                    LEFT JOIN mata_pelajaran ON guru_mengajar.id_mp = mata_pelajaran.id_mp");
                            while ($row = mysqli_fetch_assoc($mataPelajaranQuery)) {
                                echo "<option value='" . $row['nama_mp'] . "'>" . $row['nama_mp'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Filter</button>
                </div>
            </div>
        </form>

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
                        <th>Cabang Bimbel</th>
                        <th>Mata Pelajaran</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        // Fetch and display details of teachers and the subjects they teach
                        $filterSql = "SELECT guru.id_guru, guru.nama, guru.umur, guru.alamat, guru.no_telp, guru.email, guru.jenis_kelamin, guru.cabang_bimbel, GROUP_CONCAT(mata_pelajaran.nama_mp SEPARATOR ', ') AS mata_pelajaran
                                      FROM guru
                                      LEFT JOIN guru_mengajar ON guru.id_guru = guru_mengajar.id_guru
                                      LEFT JOIN mata_pelajaran ON guru_mengajar.id_mp = mata_pelajaran.id_mp
                                      WHERE 1";

                        if (isset($_POST['cabang']) && $_POST['cabang'] !== "") {
                            $filterSql .= " AND cabang_bimbel = '" . $_POST['cabang'] . "'";
                        }

                        if (isset($_POST['mata_pelajaran']) && $_POST['mata_pelajaran'] !== "") {
                            $filterSql .= " AND mata_pelajaran.nama_mp = '" . $_POST['mata_pelajaran'] . "'";
                        }

                        $filterSql .= " GROUP BY guru.id_guru";

                        $guruQuery = mysqli_query($db, $filterSql);

                        while ($guru = mysqli_fetch_array($guruQuery)) {
                            echo "<tr>";
                            echo "<td>" . $guru['id_guru'] . "</td>";
                            echo "<td>" . $guru['nama'] . "</td>";
                            echo "<td>" . $guru['umur'] . "</td>";
                            echo "<td>" . $guru['alamat'] . "</td>";
                            echo "<td>" . $guru['no_telp'] . "</td>";
                            echo "<td>" . $guru['email'] . "</td>";
                            echo "<td>" . $guru['jenis_kelamin'] . "</td>";
                            echo "<td>" . $guru['cabang_bimbel'] . "</td>";
                            echo "<td>" . $guru['mata_pelajaran'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<a class='btn btn-info btn-xs' href='edit-guru.php?id=" . $guru['id_guru'] . "' ><span class='glyphicon glyphicon-edit'></span>Edit</a> | ";
                            echo "<a class='btn btn-danger btn-xs' href='app-guru.php?id=" . $guru['id_guru'] . "'><span class='glyphicon glyphicon-remove'></span>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <p style="font-weight: bolder">Total : <?php echo mysqli_num_rows($guruQuery) ?></p>
            <p style="text-align: right; margin:15px">
                <a href="tambah-guru.php" class="btn btn-primary btn-xs col-md-3">Tambah Baru</a>
            </p>
        </div>
    </div>
</div>

<?php include_once("footer.php")?>
