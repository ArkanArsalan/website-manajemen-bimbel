<?php
include("database.php");

$id_siswa = $_GET['id'];
$query = mysqli_query($db, "SELECT id_course FROM siswa WHERE id_siswa = '$id_siswa'");
$result = mysqli_fetch_assoc($query);
$id_course = $result['id_course'];

$courseNameQuery = mysqli_query($db, "SELECT nama_course FROM course WHERE id_course = '$id_course'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <style>
  <?php include 'style.css'; ?>
  </style>

  <title>Website Bimbel</title>
</head>

<body>
  <div class="main">
    <div class="sidebar">
      <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
      <ul class="nav-list">
        <li><a href="<?php echo 'list-materi.php?id=' . $id_siswa; ?>">Materi Pelajaran</a></li>
        <li><a href="<?php echo 'jadwal-bimbingan.php?id=' . $id_siswa; ?>">Jadwal Bimbingan</a></li>
      </ul>
      <a class="logout-btn" href="index.php">Logout</a>
    </div>
    <div class="content">
        <div class="list-guru-container">
            <div class="container" style="margin-top: 20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%">
                <h2>List materi</h2>
                <!-- Display Table-->
                <div class="col custyle">
                    <table class="table table-striped custab">
                        <thead>
                            <tr>
                                <th>Judul Materi</th>
                                <th>Jenis Materi</th>
                                <th>Sumber Materi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                // Fetch and display details of learning materials for the selected subject
                                $filterSql = "SELECT id_materi, judul, jenis_materi, sumber_materi
                                            FROM materi_course
                                            WHERE id_course = '$id_course'";

                                $filterQuery = mysqli_query($db, $filterSql);

                                while ($materi = mysqli_fetch_array($filterQuery)) {
                                    echo "<tr>";
                                    echo "<td>" . $materi['judul'] . "</td>";
                                    echo "<td>" . $materi['jenis_materi'] . "</td>";
                                    echo "<td><a href='" . $materi['sumber_materi'] . "' target='_blank'>" . $materi['sumber_materi'] . "</a></td>";
                                    echo "<td class='text-center'>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php if (isset($_GET['course'])): ?>
                        <p style="font-weight: bolder">Total : <?php echo mysqli_num_rows($filterQuery) ?></p>
                        <p style="text-align: right; margin:15px">
                            <a href="tambah-materi.php?id_course=<?php echo $selectedSubjectId; ?>" class="btn btn-primary btn-xs col-md-3">Tambah Baru</a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
    <div class="content">
</div>
<script>
    function toggleSidebar() {
        const navbar = document.querySelector('.sidebar');
        navbar.classList.toggle('sidebar-expanded');
    }
</script>
</body>

</html>

</div>