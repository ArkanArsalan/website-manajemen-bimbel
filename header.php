<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <style>
  <?php include 'styles.css'; ?>
  </style>

  <title>Website Bimbel</title>
</head>

<body>
  <div class="main">
    <div class="sidebar">
      <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="list-siswa.php">List Siswa</a></li>
        <li><a href="list-guru.php">List Guru</a></li>
        <li><a href="list-mata-pelajaran.php">Materi Pelajaran</a></li>
      </ul>
      <button class="logout-btn">Logout</button>
    </div>
    <div class="content">