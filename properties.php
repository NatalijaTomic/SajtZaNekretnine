<?php
session_start();


if (!empty($_SESSION["name"]) && $_SESSION["userType"]== 'Admin'|| $_SESSION["userType"] == 'Kupac' || $_SESSION["userType"] == 'Agencija' || $_SESSION["userType"] == 'Agent za nekretnine') {

  $name = $_SESSION["name"];
} else {
  session_unset();
  $url = "./login.php";
  header("Location: $url");
}
session_write_close() ?>
<?php

use DreamTeam\Property;

require_once __DIR__ . '/lib/Property.php';
$property = new Property();
if($_SESSION["userType"] == 'Admin' || $_SESSION["userType"] == 'Agencija' || $_SESSION["userType"] == 'Agent za nekretnine'){
  $properties = $property->getPropertiesAgency();
}else{$properties = $property->getProperties();}

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
      <div id="paggingDiv" class="col-lg-3">Strana (1 od 3)</div>
      <div class="col-lg-6 text-center">
        <div class="custom-pagination">
          <button class="btn btn-primary py-2 px-3" id="page1">1</button>
          <button class="btn btn-primary py-2 px-3" id="page2">2</button>
          <button class="btn btn-primary py-2 px-3" id="page3">3</button>
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
    <script type="application/javascript">
      function showItems(pageNumber) {
  var items = document.getElementsByClassName('property-item mb-30');
  var startIndex = (pageNumber - 1) * 3;
  var endIndex = startIndex + 3;

  for (var i = 0; i < items.length; i++) {
    if (i >= startIndex && i < endIndex) {
      items[i].style.display = 'block';
    } else {
      items[i].style.display = 'none';
    }
  }
}

// Example usage
var currentPage = 1; // Initial page number
showItems(currentPage); // Show the first five items

// Event handlers for pagination buttons
document.getElementById('page1').addEventListener('click', function() {
  currentPage = 1;
  $('#paggingDiv').text("Strana (1 od 3)");
  showItems(currentPage);
});

document.getElementById('page2').addEventListener('click', function() {
  currentPage = 2;
  $('#paggingDiv').text("Strana (2 od 3)");
  showItems(currentPage);
});

document.getElementById('page3').addEventListener('click', function() {
  currentPage = 3;
  $('#paggingDiv').text("Strana (3 od 3)");
  showItems(currentPage);
});
if (document.getElementById('page4')){
  document.getElementById('page4').addEventListener('click', function() {
    currentPage = 4;
    showItems(currentPage);
  });
}

    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    </body>

    </html>