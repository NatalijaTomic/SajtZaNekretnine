<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php
session_start();
if (!empty($_SESSION["name"])) {
  $name = $_SESSION["name"];
  $userType = $_SESSION["userType"];
} else {
  session_unset();
}
session_write_close() ?>
<?php
$propertyId = $_GET["id"];

use DreamTeam\Agency;
use DreamTeam\Property;

require_once __DIR__ . '/lib/Property.php';
require_once __DIR__ . '/lib/Agency.php';
$property = new Property();
$agencies = new Agency();
$property_single = $property->getProperty($propertyId);
$adresa = $property_single[0]["adresa"];
if (isset($property_single[0]["agency_id"]))
  $agency_id = $property_single[0]["agency_id"];
$opis = $property_single[0]["opis"];
$cena = $property_single[0]["cena"];
$slika = $property_single[0]["slika"];
$adresa_ag = '';
$ime_ag = '';
$opis_ag = '';
$slika_ag = '';
if (isset($agency_id) &&  $agency_id != null) {
  $agency = $agencies->getAgency($agency_id);
  $adresa_ag = $agency[0]["adresa"];
  $ime_ag = $agency[0]["agency"];
  $opis_ag = $agency[0]["opis"];
  $slika_ag = $agency[0]["slika"];
}
?>
<?php include 'components/layout.php'; ?>
<?php include 'components/site-nav.php'; ?>

<div class="hero page-inner overlay" style="background-image: url('images/hero_bg_3.jpg')">
  <div class='container'>
    <div class='row justify-content-center align-items-center'>
      <div class='col-lg-9 text-center mt-5'>
        <h1 class='heading' data-aos='fade-up'>
          <?php echo $adresa ?>
        </h1>

        <nav aria-label='breadcrumb' data-aos='fade-up' data-aos-delay='200'>
          <ol class='breadcrumb text-center justify-content-center'>
            <li class='breadcrumb-item'><a href='index.php'>Početna strana</a></li>
            <li class='breadcrumb-item'>
              <a href='properties.php'>Nekretnine</a>
            </li>
            <li class='breadcrumb-item active text-white-50' aria-current='page'>
              <?php echo $adresa ?>
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
            <?php echo "<img src='images/" . $slika . ".jpg' alt='Image' class='img-fluid' />
                <img src='images/" . $slika . ".jpg' alt='Image' class='img-fluid' />
                <img src='images/" . $slika . ".jpg' alt='Image' class='img-fluid' />"; ?>
          </div>
        </div>
      </div>
      <div class='col-lg-4'>
        <h2 class='heading text-primary'><?php echo $adresa ?></h2>
        <p class='meta'>Beograd</p>
        <p class='text-black-50'>
          € <?php echo number_format((int)$cena) ?>
        </p>
        <p class='text-black-50'>
          <?php echo $opis ?>
        </p>
        <?php if (!empty($name) && (in_array($userType, ['Agencija', 'Agent za nekretnine', 'Admin']))) { ?> <form method='GET' action='property-update.php'>
            <input type='hidden' name='id' value=<?php echo $propertyId?>>
            <input type='submit' value='Izmenite' class='btn btn-primary py-2 px-3'>
          </form><?php } else { ?><button id="favoriteButton" class="btn btn-primary py-2 px-3" data-property-id=<?php echo $propertyId?>>Omiljena nekretnina</button><?php } ?>
        <div class='d-block agent-box p-5'>
          <div class='img mb-4'>
            <div id="bingmap"></div>
          </div>
        </div> 
        <div class='d-block agent-box p-5'>
          <div class='img mb-4'>
            <?php echo "<img
                  src='images/" . $slika_ag . ".jpg'
                  alt='Image'
                  class='img-fluid'
                />"; ?>
          </div>
          <div class='text'>
            <h3 class='mb-0'> <?php echo $ime_ag ?> </h3>
            <div class='meta mb-3'>Nekretnine</div>
            <p>
              <?php echo $opis_ag ?>
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
    <?php include 'components/footer.php'; ?>
  </div>
</div>

<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
<script type="application/javascript">
  $(document).ready(function() {
    $.ajax({
      type: 'GET',
      url: 'bing-map.php',
      data: {
        address: '<?php echo $adresa ?>'
      },
      success: function(data) {
        if (data != "") {
          $('#bingmap').html(data);
        }
        return false;
      }
    })
  });
  $('#favoriteButton').click(function() {
    $(this).toggleClass('clicked');
    var propertyId = $(this).data('property-id');
    $.ajax({
      url: 'favProperty.php',
      type: 'POST',
      data: { id: propertyId },
      success: function(response) {
        console.log(response); // Response from the PHP script
        // Perform any additional actions or update UI accordingly
      },
      error: function(xhr, status, error) {
        console.log(error); // Log any error messages
      }
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/aos.js"></script>
<script src="js/navbar.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>

</html>