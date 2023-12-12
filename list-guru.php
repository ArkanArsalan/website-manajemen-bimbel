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
                        <th>Course</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $filterSql = "SELECT guru.id_guru, guru.nama, guru.umur, guru.alamat, guru.no_telp, guru.email, guru.jenis_kelamin, guru.cabang_bimbel, GROUP_CONCAT(course.nama_course SEPARATOR ', ') AS courses_taught
                                    FROM guru
                                    LEFT JOIN guru_mengajar ON guru.id_guru = guru_mengajar.id_guru
                                    LEFT JOIN course ON guru_mengajar.id_course = course.id_course
                                    WHERE 1";

                        if (isset($_POST['cabang']) && $_POST['cabang'] !== "") {
                            $filterSql .= " AND cabang_bimbel = '" . $_POST['cabang'] . "'";
                        }

                        if (isset($_POST['course']) && $_POST['course'] !== "") {
                            $filterSql .= " AND course.nama_course = '" . $_POST['course'] . "'";
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
                            echo "<td>" . $guru['courses_taught'] . "</td>";
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
