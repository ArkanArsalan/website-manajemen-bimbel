<?php include_once("header.php")?>  
<?php include("database.php")?>

<div class="list-siswa-container">
    <h1>List Daftar Siswa</h1>

    <div class="container" style="margin-top:20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%">
        <!-- Filter -->
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cabang">Cabang Bimbel</label>
                    <select name="cabang" class="form-control">
                        <option value="">-- Pilih Cabang --</option>
                        <?php
                            $cabangQuery = mysqli_query($db, "SELECT DISTINCT cabang_bimbel FROM siswa");
                            while ($row = mysqli_fetch_assoc($cabangQuery)) {
                                echo "<option value='" . $row['cabang_bimbel'] . "'>" . $row['cabang_bimbel'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" class="form-control">
                        <option value="">-- Pilih Kelas --</option>
                        <?php
                            $kelasQuery = mysqli_query($db, "SELECT DISTINCT kelas FROM siswa");
                            while ($row = mysqli_fetch_assoc($kelasQuery)) {
                                echo "<option value='" . $row['kelas'] . "'>" . $row['kelas'] . "</option>";
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
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No telp</th>
                        <th>Email</th>
                        <th>Jenjang Sekolah</th>
                        <th>Cabang Bimbel</th>
                        <th>Kelas</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        // Filter logic based on form submission
                        $filterSql = "SELECT * FROM siswa";
                        if (isset($_POST['cabang']) && $_POST['cabang'] !== "") {
                            $filterSql .= " WHERE cabang_bimbel = '" . $_POST['cabang'] . "'";
                        }
                        if (isset($_POST['kelas']) && $_POST['kelas'] !== "") {
                            $filterSql .= (strpos($filterSql, 'WHERE') !== false) ? " AND kelas = '" . $_POST['kelas'] . "'" : " WHERE kelas = '" . $_POST['kelas'] . "'";
                        }

                        $filterQuery = mysqli_query($db, $filterSql);

                        while ($siswa = mysqli_fetch_array($filterQuery)) {
                            echo "<tr>";
                            echo "<td>" . $siswa['id_siswa'] . "</td>";
                            echo "<td>" . $siswa['nama'] . "</td>";
                            echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                            echo "<td>" . $siswa['alamat'] . "</td>";
                            echo "<td>" . $siswa['no_telp'] . "</td>";
                            echo "<td>" . $siswa['email'] . "</td>";
                            echo "<td>" . $siswa['jenjang_sekolah'] . "</td>";
                            echo "<td>" . $siswa['cabang_bimbel'] . "</td>";
                            echo "<td>" . $siswa['kelas'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<a class='btn btn-info btn-xs' href='edit-siswa.php?id=" . $siswa['id_siswa'] . "' ><span class='glyphicon glyphicon-edit'></span>Edit</a> | ";
                            echo "<a class='btn btn-danger btn-xs' href='app-siswa.php?id=" . $siswa['id_siswa'] . "'><span class='glyphicon glyphicon-remove'></span>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <p style="font-weight : bolder">Total : <?php echo mysqli_num_rows($filterQuery) ?></p>
            <p style="text-align: right; margin:15px">
                <a href="daftar-siswa.php" class="btn btn-primary btn-xs col-md-3">Tambah Baru</a>
            </p>
            <p style="font-weight : bolder"></p>
        </div>
    </div>
</div>

<?php include_once("footer.php")?>
