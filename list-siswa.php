<?php include_once("header.php")?>  
<?php include("database.php")?>
<div class="list-siswa-container">
    <h1>List Daftar Siswa</h1>

    <div class="container" style="margin-top:20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%">
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
                            $sql = "SELECT * FROM siswa";
                            $query = mysqli_query($db, $sql);

                            while ($siswa = mysqli_fetch_array($query)) {
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
                <p style="font-weight : bolder">Total : <?php echo mysqli_num_rows($query) ?></p>
            </table>
            <p style="text-align: right; margin:15px">
                <a href="daftar-siswa.php" class="btn btn-primary btn-xs col-md-3">Tambah Baru</a>
            </p>
            <p style="font-weight : bolder"></p>
        </div>

    </div>
</div>
<?php include_once("footer.php")?>  