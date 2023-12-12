<?php
include("database.php");
$id_siswa = $_GET['id'];
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
        <div class="jadwal-bimbingan-container">
            <!-- Display Schedules -->
            <?php
            $id_siswa = mysqli_real_escape_string($db, $id_siswa);

            $query = mysqli_query($db, "SELECT id_course FROM siswa WHERE id_siswa = '$id_siswa'");
            $result = mysqli_fetch_assoc($query);
            $id_course = $result['id_course'];
            
            $scheduleQuery = mysqli_query($db, "SELECT j.id_jb, j.tanggal, j.jam_mulai, j.jam_selesai, c.nama_course
                                                FROM jadwal_bimbingan j
                                                JOIN course c ON j.id_course = c.id_course
                                                JOIN siswa s ON c.id_course = s.id_course
                                                WHERE j.id_course = '$id_course' AND s.id_siswa = '$id_siswa'");

            $schedules = mysqli_fetch_all($scheduleQuery, MYSQLI_ASSOC);

            if ($schedules) {
                echo "<div class='list-siswa-container'>";
                echo "<h2>Jadwal Bimbingan " . $schedules[0]['nama_course'] . "</h2>";
                echo "<div class='container' style='margin-top: 20px; margin-bottom: 40px; margin-right: 0; margin-left: 0; width: 100%'>";
                echo "<div class='col custyle'>";
                echo "<table class='table table-striped custab'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Tanggal</th>";
                echo "<th>Jam mulai</th>";
                echo "<th>Jam selesai</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
            
                foreach ($schedules as $schedule) {
                    echo "<tr>";
                    echo "<td>" . $schedule['id_jb'] . "</td>";
                    echo "<td>" . $schedule['tanggal'] . "</td>";
                    echo "<td>" . $schedule['jam_mulai'] . "</td>";
                    echo "<td>" . $schedule['jam_selesai'] . "</td>";
                    echo "<td>";
                    echo "</td>";
                    echo "</tr>";
                }
            
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<p>No schedules found.</p><br>";
            }
            ?>
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

