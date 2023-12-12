<?php
include_once("header.php");
include("database.php");

$coursesQuery = mysqli_query($db, "SELECT * FROM course");
$courses = mysqli_fetch_all($coursesQuery, MYSQLI_ASSOC);
?>

<div class="jadwal-bimbingan-container">
    <!-- Filter Form -->
    <form method="post" action="" class="form-inline">
        <h2 class="mb-4">Cari jadwal bimbingan</h2>
        <div class="form-group mr-2">
            <label for="course" class="mr-2">Pilih course:</label>
            <select name="course" id="course" class="form-control">
                <option value="">All Courses</option>
                <?php
                foreach ($courses as $course) {
                    echo "<option value='" . $course['id_course'] . "'>" . $course['nama_course'] . "</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" name="filter" class="btn btn-primary">Filter</button>
    </form>

    <!-- Display Schedules -->
    <?php
    $filterCourse = isset($_POST['course']) ? $_POST['course'] : null;

    $scheduleQuery = mysqli_query($db, "SELECT j.id_jb, j.tanggal, j.jam_mulai, j.jam_selesai, c.nama_course
                                        FROM jadwal_bimbingan j
                                        LEFT JOIN course c ON j.id_course = c.id_course
                                        WHERE ('$filterCourse' IS NULL OR j.id_course = '$filterCourse')");

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
        echo "<th>Tindakan</th>";
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
            echo "<a href='hapus-jadwal-bimbingan.php?id_jb=" . $schedule['id_jb'] . "' class='btn btn-danger btn-xs' onclick='return confirm(\"Apakah anda yakin akan menghapus jadwal ini?\")'><span class='glyphicon glyphicon-remove'></span>Delete</a>";
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

    <!-- Form to add a jadwal bimbingan -->
    <div class="tambah-jadwal-container">
    <h2 class="mb-4">Tambah Jadwal Bimbingan</h2>
    <form method="post" action="tambah-jadwal-bimbingan.php">
        <div class="form-group">
            <label for="id_course">Select Course:</label>
            <select class="form-control" name="id_course" id="id_course">
                <?php
                foreach ($courses as $course) {
                    echo "<option value='" . $course['id_course'] . "'>" . $course['nama_course'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>

        <div class="form-group">
            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" class="form-control" name="jam_mulai" required>
        </div>

        <div class="form-group">
            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" class="form-control" name="jam_selesai" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
    </form>
</div>


</div>

<?php include_once("footer.php"); ?>
