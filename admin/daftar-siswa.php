<?php 
include_once("header.php");
include("database.php");
?>  
    <div class="form-container" id="daftar">
        <h1>Daftar</h1>
        <div class="container-fluid">
            <form autocomplete="off" action="proses-registrasi.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Siswa" class="form-control" minlength="3" maxlength="40" required>
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
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap Siswa" required></textarea>
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
                    <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                    <input type="text" name="jenjang_pendidikan" placeholder="Jenjang Pendidikan" class="form-control" minlength="1" required>
                </div>
                <div class="form-group">
                    <label>Cabang Bimbel</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cabang_bimbel" id="cabangA" value="Cabang A" required>
                        <label class="form-check-label" for="cabangA" style="font-weight: normal; margin-left: 5px;">Cabang A</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cabang_bimbel" id="cabangB" value="Cabang B" required>
                        <label class="form-check-label" for="cabangB" style="font-weight: normal; margin-left: 5px;">Cabang B</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="course">Course</label><br>
                    <?php
                        $courseQuery = mysqli_query($db, "SELECT * FROM course");
                        while ($course = mysqli_fetch_assoc($courseQuery)) {
                            echo "<input type='radio' name='id_course' value='" . $course['id_course'] . "'> " . $course['nama_course'] . "<br>";
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" placeholder="password" class="form-control" minlength="1" required>
                </div>
                <button name="daftar" type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
<?php include_once("footer.php")?>  

