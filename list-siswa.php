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
                    <label for="course">Course</label>
                    <select name="course" class="form-control">
                        <option value="">-- Pilih Course --</option>
                        <?php
                            $courseQuery = mysqli_query($db, "SELECT DISTINCT nama_course FROM course");
                            while ($row = mysqli_fetch_assoc($courseQuery)) {
                                echo "<option value='" . $row['nama_course'] . "'>" . $row['nama_course'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="jenjang">Jenjang Pendidikan</label>
                    <select name="jenjang" class="form-control">
                        <option value="">-- Pilih Jenjang --</option>
                        <?php
                            $jenjangQuery = mysqli_query($db, "SELECT DISTINCT jenjang_pendidikan FROM siswa");
                            while ($row = mysqli_fetch_assoc($jenjangQuery)) {
                                echo "<option value='" . $row['jenjang_pendidikan'] . "'>" . $row['jenjang_pendidikan'] . "</option>";
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
                        <th>Jenjang Pendidikan</th>
                        <th>Cabang Bimbel</th>
                        <th>Kelas</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $filterSql = "SELECT * FROM siswa JOIN course ON siswa.id_course = course.id_course";
                        
                        if (isset($_POST['cabang']) && $_POST['cabang'] !== "") {
                            $filterSql .= " AND cabang_bimbel = '" . $_POST['cabang'] . "'";
                        }
                        if (isset($_POST['course']) && $_POST['course'] !== "") {
                            $filterSql .= " AND nama_course = '" . $_POST['course'] . "'";
                        }                        
                        if (isset($_POST['jenjang']) && $_POST['jenjang'] !== "") {
                            $filterSql .= " AND jenjang_pendidikan = '" . $_POST['jenjang'] . "'";
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
                            echo "<td>" . $siswa['jenjang_pendidikan'] . "</td>";
                            echo "<td>" . $siswa['cabang_bimbel'] . "</td>";
                            echo "<td>" . $siswa['nama_course'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<a class='btn btn-info btn-xs' href='edit-siswa.php?id=" . $siswa['id_siswa'] . "' ><span class='glyphicon glyphicon-edit'></span>Edit</a> | ";
                            echo "<a class='btn btn-danger btn-xs' href='app-siswa.php?id=" . $siswa['id_siswa'] . "' ' onclick='return confirm(\"Apakah anda yakin akan menghapus ini?\")'><span class='glyphicon glyphicon-remove'></span>Hapus</a>";
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
