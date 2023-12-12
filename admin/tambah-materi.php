<?php
    include_once("header.php");
    include("database.php");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_course = $_POST['id_course'];
        $judul = $_POST['judul'];
        $jenis_materi = $_POST['jenis_materi'];
        $sumber_materi = $_POST['sumber_materi'];

        // Insert new material into the database
        $insertSql = "INSERT INTO materi_course (id_course, judul, jenis_materi, sumber_materi) 
                    VALUES ('$id_course', '$judul', '$jenis_materi', '$sumber_materi')";

        if (mysqli_query($db, $insertSql)) {
            echo "<div class='alert alert-success'>New material added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding material: " . mysqli_error($db) . "</div>";
        }
    }

    $id_course = isset($_GET['id_course']) ? $_GET['id_course'] : null;

?>

<div class="tambah-materi-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="list-materi.php?course=<?php echo $id_course; ?>" class="btn btn-secondary">
            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back
        </a>        
        <h1>Tambah Materi</h1>
    </div>

    <form action="" method="post">
        <input type="hidden" name="id_course" value="<?php echo $id_course; ?>">

        <div class="form-group">
            <label for="judul">Judul Materi:</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jenis_materi">Jenis Materi:</label>
            <input type="text" name="jenis_materi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sumber_materi">Sumber Materi (URL):</label>
            <input type="url" name="sumber_materi" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Materi</button>
    </form>
</div>

<?php include_once("footer.php") ?>
