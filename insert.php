<?php
session_start();
if (! empty($_SESSION["name"])) {
    $name = $_SESSION["name"];
} else {
    session_unset();
    $url = "./login.php";
    header("Location: $url");
}
session_write_close()?>
<?php
use DreamTeam\Property;
require_once __DIR__ . '/lib/Property.php';
$property = new Property();
if (!empty($_POST["insert-btn"])) {
  $insertResult = $property->propertyInsert();
};
?>
<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>
      Sajt za nekretnine - Dream Team
    </title>
  </head>

  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <?php include 'components/site-nav.php'; ?>

            <a href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Unos nekretnina
            </h1>

            <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">
                  Unos nekretnine
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <form method="post" action="insert.php">
            <div class="row justify-content-center">
              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="input-grup form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <input type="text" class="form-control" name="adresa" required placeholder="Adresa">
                </div>
                <div class="input-grup form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <input type="text" class="form-control" name="cena" required placeholder="Cena u evrima">
                </div>
                
                <div class="input-grup form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <input type="text" class="form-control" name="opis" required placeholder="Opis nekretnine">
                </div>
                <div class="input-group form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <input type="text" class="form-control" name="slika" required placeholder="Slika">
                </div>
                <div class="form-group mt-3">
                  <input type="submit" class="btn bg-secondary float-end text-white w-100" value="Unos nekretnine"
                    name="insert-btn">
                </div>

              </div>
              <?php if (!empty($insertResult) && $insertResult["status"]=="error" ) { ?>
                <div class="row justify-content-center text-danger fw-bold mt-3">
                  <?php echo ("Greška: " . $insertResult["message"]); ?>
                </div>
              <?php }
              if (!empty($insertResult) && $insertResult["status"]=="success" ) { ?>
                <div class="row justify-content-center text-success fw-bold mt-3">
                  <?php echo ($insertResult["message"]); ?>
                </div>
              <?php } ?>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.untree_co-section -->

    

    <?php include 'components/footer.php';?>
    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>

</html>