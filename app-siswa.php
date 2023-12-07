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
    } 
    else if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $jenjang_sekolah = $_POST['jenjang_sekolah'];
        $cabang_bimbel = $_POST['cabang_bimbel'];
        $kelas = $_POST['kelas'];

        $sql = "UPDATE siswa SET nama='$nama', umur=$umur, alamat='$alamat', no_telp='$no_telp', email='$email', jenis_kelamin='$jenis_kelamin', jenjang_sekolah='$jenjang_sekolah', cabang_bimbel='$cabang_bimbel', kelas='$kelas' WHERE id_siswa=$id";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: list-siswa.php?status=sukses');
        } else {
            header('Location: list-siswa.php?status=gagal');
        }
    } 
    else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM siswa WHERE id_siswa=$id";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: list-siswa.php');
        } else {
            die("Gagal menghapus...");
        }
    } 
    else {
        die("Akses Dilarang...");
    }
?>