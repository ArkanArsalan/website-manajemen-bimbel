<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

    <title>Aktual Cendekia Course</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">ACC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#about">About</a>
            <a class="nav-item nav-link" href="#course">Course</a>
            <a class="nav-item nav-link" href="register-siswa.php">Registrasi</a>
            <a class="nav-item nav-link btn btn-primary text-white tombol" href="login.php">LOGIN</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Aktual Cendekia Course</h1>
            <p>Temukan dan kembangkan potensimu bersama kami. Aktual Cendekia Course menyediakan kursus-kursus menarik
                untuk memperluas pengetahuan dan keterampilanmu.</p>
        </div>
    </div>

    <div class="container" id="Keunggulan">
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-sm">
              <img src="img/employee.png" alt="Employee" class="img-fluid float-left">
              <h4>Guru Terbaik</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg">
              <img src="img/hires.png" alt="HiRes" class="img-fluid float-left">
              <h4>Materi Lengkap</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg">
              <img src="img/security.png" alt="Security" class="img-fluid float-left">
              <h4>Komunikasi Mudah</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row workingspace" id="about">
        <div class="col-lg-6">
            <img src="img/ACC.jpg" alt="Working Space" class="img-fluid">
        </div>
        <div class="col-lg-5">
            <h2>Ayo <span>Bergabung</span> Bersama <span>ACC</span></h2>
            <p>Menyambut Anda di Aktual Cendekia Course, tempat terbaik untuk mengembangkan diri dan meraih potensi terbaik Anda. Kami membuka pintu peluang bagi semua yang ingin mengejar keahlian dan pengetahuan baru.</p>
            <p>Belajar di lingkungan yang inspiratif dan dinamis, Aktual Cendekia Course hadir dengan kurikulum berkualitas dan fasilitas terbaik. Dengan instruktur ahli di bidangnya, kami berkomitmen untuk memberikan pengalaman belajar yang menyenangkan dan bermakna.</p>
        </div>
    </div>

      <br><br>
      <h2 id="course">Course</h2>
      <section class="course mt-5" >
        <div class="container">
            <div class="row justify-content-center">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <img src="img/c.png" class="card-img-top" alt="Card Image 1" height="200px" width="75px">
                        <div class="card-body">
                            <h5 class="card-title">C programming course</h5>
                            <a href="https://www.w3schools.com/c/c_intro.php" class="btn btn-primary">What is C?</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <img src="img/java.png" class="card-img-top" alt="Card Image 2" height="200px" width="75px">
                        <div class="card-body">
                            <h5 class="card-title">Java programming course</h5>
                            <a href="https://www.w3schools.com/java/java_intro.asp" class="btn btn-primary">What is java?</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    </div>

  </body>
</html>