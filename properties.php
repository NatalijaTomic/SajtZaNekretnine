<?php
session_start();
if (!empty($_SESSION["name"])) {
  $name = $_SESSION["name"];
} else {
  session_unset();
}
session_write_close() ?>
<?php

use DreamTeam\Property;

require_once __DIR__ . '/lib/Property.php';
$property = new Property();
$properties = $property->getProperties();
?>
<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php include 'components/layout.php'; ?>
<?php include 'components/site-nav.php'; ?>

<div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <h1 class="heading" data-aos="fade-up">Nekretnine</h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
              Nekretnine
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-lg-6 text-center mx-auto">
        <h2 class="font-weight-bold text-primary heading">
          Nekretnine u ponudi
        </h2>
      </div>
    </div>
    <?php include 'components/properties-slider.php'; ?>
  </div>
</div>
<div class="section section-properties">
  <div class="container">
    <?php include 'components/properties-show.php'; ?>
    <div class="row align-items-center py-5">
      <div class="col-lg-3">Strana (1 od 5)</div>
      <div class="col-lg-6 text-center">
        <div class="custom-pagination">
          <a href="#">1</a>
          <a href="#" class="active">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
        </div>
      </div>
    </div>
    <?php include 'components/footer.php'; ?>
    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Učitavanje...</span>
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