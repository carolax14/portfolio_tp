<?php
// Inclure le fichier des fonctions
include '../functions.php';

// Récupérer l'ID du projet depuis l'URL
$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Vérifier si l'ID est valide
if ($project_id === 0) {
    die("Projet introuvable ou ID non spécifié.");
}

// Utiliser les fonctions pour récupérer les données
$project = getProjectDetails($project_id);
if (!$project) {
    die("Projet introuvable.");
}

$project_images = getProjectImages($project_id);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?php echo $project['title']; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">
            <div class="profile">
                <img src="../assets/img/IMG_20210606_122251_432.jpg" alt="" class="img-fluid rounded-circle" />
                <h1 class="text-light"><a href="index.html">Carole Hafizou</a></h1>
                <div class="social-links mt-3 text-center">
                    <a
                        href="https://www.facebook.com/carole.hafizou"
                        class="facebook"
                        target="_blank"><i class="bx bxl-facebook"></i></a>
                    <a
                        href="https://www.instagram.com/carolehafizou/?hl=fr"
                        class="instagram"
                        target="_blank"><i class="bx bxl-instagram"></i></a>
                    <a
                        href="https://re.linkedin.com/in/carole-hafizou-788401213"
                        class="linkedin"
                        target="_blank"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="../index.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Accueil</span></a></li>
                    <li><a href="../sections/projects.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Projets</span></a></li>
                    <li><a href="../sections/resume.html" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Parcours</span></a></li>
                    <li><a href="../sections/contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Détails de projet</h2>
                    <ol>
                        <li><a href="../index.php">Retour</a></li>
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
                        <center>
                            <h3><?php echo $project['title']; ?></h3>
                        </center>
                        <div class="portfolio-details-slider swiper-container">
                            <div class="swiper-wrapper align-items-center">
                                <?php foreach ($project_images as $image): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo htmlspecialchars($image['image_path']); ?>" alt="<?php echo htmlspecialchars($image['description']); ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>


                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Information du projet</h3>
                            <ul>
                                <li><strong>Catégorie</strong>: <?php echo $project['category']; ?></li>
                                <li><strong>Langages</strong>: <?php echo $project['languages']; ?></li>
                                <li><strong>Outils</strong>: <?php echo $project['tools']; ?></li>
                                <li><strong>Date de réalisation</strong>: <?php echo $project['date_realization']; ?></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Contexte du projet</h2>
                            <p><?php echo $project['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Portfolio Details Section -->
    </main>

    <!-- ======= Footer ======= -->
    <?php include '../includes/footer.html'; ?>
    <!-- End  Footer -->

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/typed.js/typed.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>

</html>