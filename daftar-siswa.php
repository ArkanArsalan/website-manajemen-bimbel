<?php include_once("header.php")?>  
    <div class="form-container" id="daftar">
        <h1>Daftar</h1>
        <div class="container-fluid">
            <form autocomplete="off" action="proses-daftar.php" method="POST" enctype="multipart/form-data">
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
                    <label for="jenjang_sekolah">Jenjang Sekolah</label>
                    <input type="text" name="jenjang_sekolah" placeholder="Jenjang Sekolah" class="form-control" minlength="1" required>
                </div>
                <div class="form-group">
                    <label for="cabang_bimbel">Cabang Bimbel</label>
                    <input type="text" name="cabang_bimbel" placeholder="Cabang Bimbel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" placeholder="Kelas" class="form-control">
                </div>
                <button name="daftar" type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
<?php include_once("footer.php")?>  

