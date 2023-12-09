<?php include_once("header.php")?>
<?php include("database.php")?>

<div class="form-container" id="daftar">
    <h1>Daftar Guru</h1>
    <div class="container-fluid">
        <form autocomplete="off" action="app-guru.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama Lengkap Guru" class="form-control" minlength="3" maxlength="40" required>
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" name="umur" placeholder="Umur" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                <input type="radio" name="jenis_kelamin" value="L"> Laki-laki<br>
                <input type="radio" name="jenis_kelamin" value="P"> Perempuan<br>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap Guru" required></textarea>
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input type="tel" name="no_telp" placeholder="Nomor Telepon" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mata_pelajaran">Mata Pelajaran yang Diajar</label>
                <select name="mata_pelajaran[]" class="form-control" multiple>
                    <!-- Fetch and display mata pelajaran from the database -->
                    <?php
                        $mataPelajaranQuery = mysqli_query($db, "SELECT * FROM mata_pelajaran");
                        while ($mataPelajaran = mysqli_fetch_assoc($mataPelajaranQuery)) {
                            echo "<option value='" . $mataPelajaran['id_mp'] . "'>" . $mataPelajaran['nama_mp'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <button name="daftar" type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

<?php include_once("footer.php")?>


