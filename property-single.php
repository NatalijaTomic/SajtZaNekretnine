<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php
$id= $_GET["id"];
use DreamTeam\Property;

require_once __DIR__ . '/lib/Property.php';
$property = new Property();
$property_single = $property->getProperty($id);
$adresa= $property_single[0]["adresa"];
$opis= $property_single[0]["opis"];
$cena= $property_single[0]["cena"];
$slika= $property_single[0]["slika"];
?>
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
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>
      Property &mdash; Free Bootstrap 5 Website Template by Untree.co
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
          <?php include 'components/site-nav.php';?>
            
            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_3.jpg')"
    >
    <?php
    echo "
      <div class='container'>
        <div class='row justify-content-center align-items-center'>
          <div class='col-lg-9 text-center mt-5'>
            <h1 class='heading' data-aos='fade-up'>
            $adresa
            </h1>

            <nav
              aria-label='breadcrumb'
              data-aos='fade-up'
              data-aos-delay='200'
            >
              <ol class='breadcrumb text-center justify-content-center'>
                <li class='breadcrumb-item'><a href='index.php'>Početna strana</a></li>
                <li class='breadcrumb-item'>
                  <a href='properties.html'>Nekretnine</a>
                </li>
                <li
                  class='breadcrumb-item active text-white-50'
                  aria-current='page'
                >
                $adresa
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class='section'>
      <div class='container'>
        <div class='row justify-content-between'>
          <div class='col-lg-7'>
            <div class='img-property-slide-wrap'>
              <div class='img-property-slide'>
                <img src='images/".$slika.".jpg' alt='Image' class='img-fluid' />
                <img src='images/".$slika.".jpg' alt='Image' class='img-fluid' />
                <img src='images/".$slika.".jpg' alt='Image' class='img-fluid' />
              </div>
            </div>
          </div>
          <div class='col-lg-4'>
            <h2 class='heading text-primary'>$adresa</h2>
            <p class='meta'>Beograd</p>
            <p class='text-black-50'>
            € $cena
            </p>
            <p class='text-black-50'>
              $opis
            </p>

            <div class='d-block agent-box p-5'>
              <div class='img mb-4'>
                <img
                  src='images/HousePortal.jpg'
                  alt='Image'
                  class='img-fluid'
                />
              </div>
              <div class='text'>
                <h3 class='mb-0'>Dream Team agencija</h3>
                <div class='meta mb-3'>Nekretnine</div>
                <p>
                Kompanija Dream Team d.o.o. počinje sa radom 1999. i od tada doživljava konstantan rast. Uspešnim i kvalitetnim poslovanjem, posvećenošću kupcu i stalnim inovacijama postala je lider na tržištu Srbije u oblasti prodaje nekretnina.
                </p>
                <ul class='list-unstyled social dark-hover d-flex'>
                  <li class='me-1'>
                    <a href='#'><span class='icon-instagram'></span></a>
                  </li>
                  <li class='me-1'>
                    <a href='#'><span class='icon-twitter'></span></a>
                  </li>
                  <li class='me-1'>
                    <a href='#'><span class='icon-facebook'></span></a>
                  </li>
                  <li class='me-1'>
                    <a href='#'><span class='icon-linkedin'></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>"
    ?>

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
