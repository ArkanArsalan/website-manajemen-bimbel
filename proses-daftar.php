<?php
    include("database.php");

    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $jenjang_sekolah = $_POST['jenjang_sekolah'];
        $cabang_bimbel = $_POST['cabang_bimbel'];
        $kelas = $_POST['kelas'];

        $sql = "INSERT INTO siswa (nama, umur, alamat, no_telp, email, jenjang_sekolah, jenis_kelamin, cabang_bimbel, kelas) VALUES ('$nama', '$umur' ,'$alamat', '$no_telp', '$email', '$jenjang_sekolah', '$jenis_kelamin', '$cabang_bimbel', '$kelas')";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: list-siswa.php?status=sukses');
        } else {
            header('Location: list-siswa.php?status=gagal');
        }
    } else {
        die("Akses dilarang...");
    }
?>