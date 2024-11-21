<?php
// Inclure la connexion à la base de données
include 'db.php';

// Récupérer tous les projets de la base de données
$sql = "SELECT id, title, cover_image, category FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <section id="portfolio" class="portfolio section-bg">
        <div class="container">
            <div class="section-title">
                <h2 class="text-uppercase">Projets</h2>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Tous</li>
                        <li data-filter=".filter-first">Application web</li>
                        <li data-filter=".filter-second">Application mobile</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $filterClass = $row['category'] === "Application web" ? "filter-first" : "filter-second";
                        echo "<div class='col-lg-4 col-md-6 portfolio-item $filterClass'>";
                        echo "  <h5 style='text-align: center'>{$row['title']}</h5><br>";
                        echo "  <div class='portfolio-wrap'>";
                        echo "      <img src='assets/img/projects/{$row['cover_image']}' class='img-fluid' alt='{$row['title']}' />";
                        echo "      <div class='portfolio-links'>";
                        echo "          <a href='assets/img/projects/{$row['cover_image']}' data-gallery='portfolioGallery' class='portfolio-lightbox' title='{$row['title']}'><i class='bx bx-plus'></i></a>";
                        echo "          <a href='projects/project_detail.php?id={$row['id']}' title='Plus de détails'><i class='bx bx-link'></i></a>";
                        echo "      </div>";
                        echo "  </div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucun projet trouvé.</p>";
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>