<?php
    include("database.php");

    if (!isset($_GET['id'])) {
        header('Location: list-siswa.php');
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM siswa JOIN course ON siswa.id_course = course.id_course WHERE id_siswa=$id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan...");
    }
?>

<?php include_once("header.php")?>  
    <div class="form-container" id="daftar">
        <h1>Edit Data Siswa</h1>
        <div class="container-fluid">
            <form autocomplete="off" action="app-siswa.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $siswa['id_siswa'] ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Siswa" class="form-control" minlength="3" maxlength="40" value="<?php echo $siswa['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" placeholder="Umur" class="form-control" min="1" value="<?php echo $siswa['umur'] ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <?php $jk = $siswa['jenis_kelamin'] ?>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo ($jk == 'L') ? "checked" : "" ?>> Laki-laki<br>
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo ($jk == 'P') ? "checked" : "" ?>> Perempuan<br>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap Siswa"><?php echo $siswa['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="tel" name="no_telp" placeholder="Nomor Telepon" class="form-control" value="<?php echo $siswa['no_telp'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $siswa['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                    <input type="text" name="jenjang_pendidikan" placeholder="Jenjang Pendidikan" class="form-control" minlength="1" value="<?php echo $siswa['jenjang_pendidikan'] ?>">
                </div>
                <button name="edit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php include_once("footer.php")?>  