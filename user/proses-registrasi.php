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
            header('Location: index.php?status=sukses');
        } else {
            header('Location: index.php?status=gagal');
        }
    } 
?>