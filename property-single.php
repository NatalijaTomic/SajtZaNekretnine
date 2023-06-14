<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php
$id = $_GET["id"];

use DreamTeam\Agency;
use DreamTeam\Property;

require_once __DIR__ . '/lib/Property.php';
require_once __DIR__ . '/lib/Agency.php';
$property = new Property();
$agencies = new Agency();
$property_single = $property->getProperty($id);
$adresa = $property_single[0]["adresa"];
$agency_id = $property_single[0]["agency_id"];
$opis = $property_single[0]["opis"];
$cena = $property_single[0]["cena"];
$slika = $property_single[0]["slika"];
$agency = $agencies->getAgency($agency_id);
$adresa_ag = $agency[0]["adresa"];
$ime_ag = $agency[0]["agency"];
$opis_ag = $agency[0]["opis"];
$slika_ag = $agency[0]["slika"];
?>
<?php include 'components/layout.php'; ?>
<?php include 'components/site-nav.php'; ?>

<div class="hero page-inner overlay" style="background-image: url('images/hero_bg_3.jpg')">
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
                <img src='images/" . $slika . ".jpg' alt='Image' class='img-fluid' />
                <img src='images/" . $slika . ".jpg' alt='Image' class='img-fluid' />
                <img src='images/" . $slika . ".jpg' alt='Image' class='img-fluid' />
              </div>
            </div>
          </div>
          <div class='col-lg-4'>
            <h2 class='heading text-primary'>$adresa</h2>
            <p class='meta'>Beograd</p>
            <p class='text-black-50'>
            € ".number_format((int)$cena)."
            </p>
            <p class='text-black-50'>
              $opis
            </p>

            <div class='d-block agent-box p-5'>
              <div class='img mb-4'>
                <img
                  src='images/" . $slika_ag . ".jpg'
                  alt='Image'
                  class='img-fluid'
                />
              </div>
              <div class='text'>
                <h3 class='mb-0'> $ime_ag </h3>
                <div class='meta mb-3'>Nekretnine</div>
                <p>
                $opis_ag
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

  <?php include 'components/footer.php'; ?>
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