<?php
// Inclure la connexion à la base de données
include 'db.php';

// Récupérer l'ID du projet depuis l'URL
$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Vérifier si l'ID est valide
if ($project_id === 0) {
    die("Projet introuvable ou ID non spécifié.");
}

// Requête pour récupérer les informations du projet
$sql = "SELECT * FROM projects WHERE id = $project_id";
$result = $conn->query($sql);

// Vérifier si le projet existe
if ($result->num_rows > 0) {
    $project = $result->fetch_assoc();
} else {
    die("Projet introuvable.");
}

// Requête pour récupérer les images associées au projet
$sql_images = "SELECT * FROM project_images WHERE project_id = $project_id";
$result_images = $conn->query($sql_images);
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title><?php echo $project['title']; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header">
      <div class="d-flex flex-column">
        <div class="profile">
          <img
            src="assets/img/profil5.jpg"
            alt=""
            class="img-fluid rounded-circle"
          />
          <h1 class="text-light"><a href="index.html">Carole Hafizou</a></h1>
        </div>

        <nav id="navbar" class="nav-menu navbar">
          <ul>
            <li>
              <a href="index.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Accueil</span></a>
            </li>
            <li>
              <a href="projects.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Projets</span></a>
            </li>
          </ul>
        </nav>
        <!-- .nav-menu -->
      </div>
    </header>
    <!-- End Header -->

    <main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Détails du Projet</h2>
            <ol>
              <li><a href="projects.php">Retour</a></li>
              <li><?php echo $project['title']; ?></li>
            </ol>
          </div>
        </div>
      </section>
      <!-- End Breadcrumbs -->

      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-8">
              <center><h3><?php echo $project['title']; ?></h3></center>
              <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                  <div class="swiper-slide">
                    <img src="<?php echo $project['cover_image']; ?>" alt="" />
                    <center>
                      <div class="text mt-4">Image de couverture</div>
                    </center>
                  </div>
                  <?php while ($image = $result_images->fetch_assoc()) { ?>
                    <div class="swiper-slide">
                      <img src="<?php echo $image['image_path']; ?>" alt="" />
                      <center>
                        <div class="text mt-4"><?php echo $image['description']; ?></div>
                      </center>
                    </div>
                  <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Informations du Projet</h3>
                <ul>
                  <li><strong>Catégorie</strong>: <?php echo $project['category']; ?></li>
                  <li><strong>Langages</strong>: <?php echo $project['languages']; ?></li>
                  <li><strong>Outils</strong>: <?php echo $project['tools']; ?></li>
                  <li><strong>Date de réalisation</strong>: <?php echo $project['date_realization']; ?></li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>Contexte du Projet</h2>
                <p>
                  <?php echo $project['description']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Portfolio Details Section -->
    </main>
    <!-- End #main -->

    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Carole Hafizou</span></strong>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  </body>
</html>
