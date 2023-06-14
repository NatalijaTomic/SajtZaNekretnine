<?php

use DreamTeam\Member;

require_once __DIR__ . '/lib/Member.php';
$member = new Member();
$agencies = $member->getAgency();
if (!empty($_POST["register-btn"])) {
  $loginResult = $member->registerMember();
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
              <input type="date" class="form-control" name="birthdate" required placeholder="Datum rodjenja">
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
                <select type="select" class="form-control" name="agency_id" required placeholder="Agencija">
                  <option selected>Odaberite...</option>

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
                <input type="text" maxlength="20" class="form-control" name="agent_licence" required placeholder="Broj licence agenta">
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit" class="btn bg-secondary float-end text-white w-100" value="Registracija" name="register-btn">
            </div>

          </div>
          <?php if (!empty($loginResult) && $loginResult["status"] == "error") { ?>
            <div class="row justify-content-center text-danger fw-bold mt-3">
              <?php echo ("Greška: " . $loginResult["message"]); ?>
            </div>
          <?php }
          if (!empty($loginResult) && $loginResult["status"] == "success") { ?>
            <div class="row justify-content-center text-success fw-bold mt-3">
              <?php echo ($loginResult["message"]); ?>
            </div>
          <?php } ?>
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

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/aos.js"></script>
<script src="js/navbar.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>

</html>