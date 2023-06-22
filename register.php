<?php

use DreamTeam\Member;
//var_dump($_POST);
require_once __DIR__ . '/lib/Member.php';
$member = new Member();
$agencies = $member->getAgency();
if (isset($_POST["register-btn"])) {
  $selectedButton = $_POST["usertype"];
  switch ($selectedButton) {
      case '1':
      case '2':
      case '3':
      $loginResult = $member->registerMember();
      break;
    default:
      echo "Niste odabrali vrstu korisnika";
      break;
  }
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
        <h1 class="heading" data-aos="fade-up">Registracija</h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
              Registracija
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
      <form method="post" action="register.php" oninput='passwordcheck.setCustomValidity(passwordcheck.value != password.value ? "Lozinke se ne poklapaju." : "")'>
        <div class="row justify-content-center">
          <div class="col-lg-9 btn-group btn-group-toggle" id="userType" data-toggle="buttons">
            <label class="btn btn-secondary active">
              <input type="radio" name="usertype" id="customer" value="1" autocomplete="off" checked> Kupac
            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="usertype" id="propm-sole" value="2" autocomplete="off"> Agent za nekretnine

            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="usertype" id="propm-agency" value="3" autocomplete="off"> Agencija za nekretnine
            </label>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="text" class="form-control" name="name" required placeholder="Ime">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="text" class="form-control" name="lastname" required placeholder="Prezime">
            </div>

            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="text" class="form-control" name="username" required placeholder="Korisničko ime">
            </div>
            <div class="input-group form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="email" class="form-control" name="email" required placeholder="E-mail">
            </div>
            <div class="input-group form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="password" class="form-control" name="password" required placeholder="Lozinka">
            </div>
            <div class="input-group form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="password" class="form-control" name="passwordcheck" required placeholder="Ponovite lozinku">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="date" class="form-control" name="birthdate" required placeholder="Datum rođenja">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="text" class="form-control" name="city" required placeholder="Grad">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <input type="tel" class="form-control" name="phone" required placeholder="Broj telefona">
            </div>
            <div id="agencyField" class="d-none">
              <div class="input-group form-group mt-3">
                <div class="bg-secondary rounded-start">
                  <span class="m-3"><i class="fas flaticon-381-back-2 mt-2"></i></span>
                </div>
                <select type="select" class="form-control" name="agency_id" id="select_agency_id" placeholder="Agencija">
                  <option selected>Odaberite agenciju...</option>

                  <?php
                  if (is_array($agencies)) {
                    $count = count($agencies);
                    if ($count > 0) {
                      foreach ($agencies as $agency) {
                        echo '<option value="' . $agency['id'] . '" class="option">' . $agency['agency'] . '</option>';
                      }
                    }
                  } ?>

                </select>
              </div>
              <div class="input-group form-group mt-3">
                <div class="bg-secondary rounded-start">
                  <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                </div>
                <input type="text" maxlength="20" class="form-control" name="agent_licence" placeholder="Broj licence agenta">
              </div>
              <div class="d-block" id="addAgencyLink">
              <div class="input-grup form-group mt-3">
                      <div class="bg-secondary rounded-start">
                        <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                      </div><br/>
                <button type="button" class="btn btn-secondary  btn-sm" data-bs-toggle="modal" data-bs-target="#newagencyModal">Dodaj novu agenciju</button>
                <div id="newAgencyAdded" class="text-success"></div>
              </div>
          </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit" class="btn bg-secondary float-end text-white w-100" value="Registracija" name="register-btn">
            </div>
            <div id="modalError" class="row justify-content-center text-danger fw-bold mt-3">
          </div>    
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.untree_co-section -->



<?php include 'components/footer.php'; ?>
<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
<!-- ADD AGENCY Modal -->
<div class="modal newagencyModal" id="newagencyModal" tabindex="-1" aria-labelledby="newagencyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newagencyModalLabel">Dodajte novu agenciju</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formModalnewagency" method="post" onSubmit="return false;">
        <div class="modal-body">
          <div class="mb-3">
            <label for="agency-name" class="col-form-label">Ime agencije:</label>
            <input name="agency-name" type="text" class="form-control" id="agency-name" required>
          </div>
          <div class="mb-3">
            <label for="agency-adresa" class="col-form-label">Adresa agencije:</label>
            <input name="agency-adresa" type="text" class="form-control" id="agency-adresa" required>
          </div>
          <div class="mb-3">
            <label for="agency-opis" class="col-form-label">Opis agencije:</label>
            <input name="agency-opis" type="text" class="form-control" id="agency-opis" required>
          </div>
          <div class="mb-3">
            <label for="agency-slika" class="col-form-label">Slika:</label>
            <input name="agency-slika" type="text" class="form-control" id="agency-slika">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
          <button type="submit" name="modal-new-agency" class="btn btn-primary modal-new-agency">Dodaj novu agenciju</button>
          <div id="modalError" class="row justify-content-center text-danger fw-bold mt-3">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="application/javascript">
  var newagencyModal = document.getElementById('newagencyModal')
  newagencyModal.addEventListener('show.bs.modal', function(event) {
    $('#modalError').text("");
    $('#newAgencyAdded').text("");
  });
  $(document).ready(function() {
    $("#formModalnewagency").on("submit", function(event) {
      $('#newAgencyAdded').text('');
      $.ajax({
        type: 'POST',
        url: 'agencyAdd.php',
        data: $(this).serialize(),
        success: function(data) {
          data = JSON.parse(data);
          if (data.status == "success") {
            $('#newAgencyAdded').text(data.message);
            $('#modalError').text("");
            $("select#select_agency_id").append('<option class="option" value=' + data.id + '>' + $("#agency-name").val() + '</option>');
            $('#newagencyModal').modal('toggle');
          } else {
            $('#modalError').text(data.message);
          }
          return false;
        }
      });
    });



  });
</script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/aos.js"></script>
<script src="js/navbar.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>

</html>