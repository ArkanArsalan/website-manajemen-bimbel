<?php
include_once("header.php");
include("database.php");

$coursesQuery = mysqli_query($db, "SELECT * FROM course");
$courses = mysqli_fetch_all($coursesQuery, MYSQLI_ASSOC);
?>

<div class="calendar-container">
    <h1>Calendar</h1>

    <!-- Filter Form -->
    <form method="post" action="">
        <label for="course">Select Course:</label>
        <select name="course" id="course">
            <option value="">All Courses</option>
            <?php
            foreach ($courses as $course) {
                echo "<option value='" . $course['id_course'] . "' >" . $course['nama_course'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="filter">Filter</button>
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
        echo "<h2>Jadwal Bimbingan " . $schedules[0]['nama_course']. "</h2>";
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
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<p>No schedules found.</p>";
    }
    ?>
</div>

<?php include_once("footer.php"); ?>
