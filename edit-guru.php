<?php
    include("database.php");

    // Check if ID is provided in the URL
    if (!isset($_GET['id'])) {
        header('Location: list-guru.php');
    }

    $id = $_GET['id'];

    // Retrieve guru details based on the provided ID
    $sql = "SELECT * FROM guru WHERE id_guru=$id";
    $query = mysqli_query($db, $sql);
    $guru = mysqli_fetch_assoc($query);

    // Redirect if guru not found
    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan...");
    }
?>

<?php include_once("header.php")?>  
    <div class="form-container" id="daftar">
        <h1>Edit Guru</h1>
        <div class="container-fluid">
            <form autocomplete="off" action="app-guru.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $guru['id_guru'] ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Guru" class="form-control" minlength="3" maxlength="40" value="<?php echo $guru['nama'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" placeholder="Umur" class="form-control" min="1" value="<?php echo $guru['umur'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <?php $jk = $guru['jenis_kelamin'] ?>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo ($jk == 'L') ? "checked" : "" ?>> Laki-laki<br>
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo ($jk == 'P') ? "checked" : "" ?>> Perempuan<br>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap Guru" required><?php echo $guru['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="tel" name="no_telp" placeholder="Nomor Telepon" class="form-control" value="<?php echo $guru['no_telp'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $guru['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran yang Diajar</label>
                    <?php
                        $mataPelajaranQuery = mysqli_query($db, "SELECT * FROM mata_pelajaran");
                        while ($mataPelajaran = mysqli_fetch_assoc($mataPelajaranQuery)) {
                            // Check if the mata_pelajaran is assigned to the guru
                            $isAssigned = false;
                            $checkAssignmentQuery = mysqli_query($db, "SELECT * FROM guru_mengajar WHERE id_guru = {$guru['id_guru']} AND id_mp = {$mataPelajaran['id_mp']}");
                            if (mysqli_num_rows($checkAssignmentQuery) > 0) {
                                $isAssigned = true;
                            }

                            // Use $isAssigned to determine if the checkbox should be checked
                            $checked = $isAssigned ? 'checked' : '';

                            echo "<div class='form-check'>";
                            echo "<input type='checkbox' class='form-check-input' name='mata_pelajaran[]' value='" . $mataPelajaran['id_mp'] . "' $checked>";
                            echo "<label class='form-check-label'>" . $mataPelajaran['nama_mp'] . "</label>";
                            echo "</div>";
                        }
                    ?>
                </div>


                <button name="edit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php include_once("footer.php")?>  
