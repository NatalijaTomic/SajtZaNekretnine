<?php
session_start();
if (!empty($_SESSION["name"])) {
  $name = $_SESSION["name"];
} else {
  session_unset();
  $url = "./login.php";
  header("Location: $url");
}
session_write_close() ?>
<?php

use DreamTeam\Property;

require_once __DIR__ . '/lib/Member.php';
require_once __DIR__ . '/lib/Property.php';
$property = new Property();
if (!empty($_POST["search-btn"])) {
  $properties = $property->propertySearch();
} else {
  $properties = $property->getProperties();
}
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
        <h1 class="heading" data-aos="fade-up">Pretraga nekretnina
        </h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
              Pretraga nekretnina
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- /.untree_co-section -->
<div class="section section-properties">
  <div class="container">
    <div class="section">
      <div class="container">
        <div class="row">
          <form method="post" action="search.php">
            <div class="row justify-content-center">
              <div class="col-lg-6 btn-group btn-group-toggle" id="slika" data-toggle="buttons">
                <label class="btn btn-secondary active">
                  <input type="radio" name="slika" id="slika" value="1" autocomplete="off"> Nekretnine sa slikom
                </label>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="input-group form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <input type="text" class="form-control" name="adresa" placeholder="Adresa">
                </div>
                <div class="input-group form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <input type="text" class="form-control" name="opis" placeholder="Opis">
                </div>
                <div class="input-group form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <input type="number" class="form-control" name="cena" required placeholder="Cena">
                </div>
                <div class="form-group mt-3">
                  <input type="submit" class="btn bg-secondary float-end text-white w-100" value="Pretraga" name="search-btn">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
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