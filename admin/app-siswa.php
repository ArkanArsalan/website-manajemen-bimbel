<?php
    include("database.php");

    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
        $cabang_bimbel = $_POST['cabang_bimbel'];
        $id_course = $_POST['id_course'];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO siswa (nama, umur, alamat, no_telp, email, jenjang_pendidikan, jenis_kelamin, cabang_bimbel, id_course, password) VALUES ('$nama', '$umur' ,'$alamat', '$no_telp', '$email', '$jenjang_pendidikan', '$jenis_kelamin', '$cabang_bimbel', '$id_course', '$password')";        
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
        $jenjang_pendidikan = $_POST['jenjang_pendidikan'];

        $sql = "UPDATE siswa SET nama='$nama', umur=$umur, alamat='$alamat', no_telp='$no_telp', email='$email', jenis_kelamin='$jenis_kelamin', jenjang_pendidikan='$jenjang_pendidikan' WHERE id_siswa=$id";
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