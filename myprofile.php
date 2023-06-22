<?php
session_start();
if (!empty($_SESSION["name"])) {
  $name = $_SESSION["name"];
  $userType = $_SESSION["userType"];
} else {
  session_unset();
  $url = "./login.php";
  header("Location: $url");
}
session_write_close() ?>
<?php

use DreamTeam\Member;
//var_dump($_POST);
require_once __DIR__ . '/lib/Member.php';
$member = new Member();
$agencies = $member->getAgency();
if (isset($_POST["memberchange-btn"])) {
  $loginResult = $member->updateMemberFullProfile($_SESSION["username"]); 
}

$user = $member->getMember($_SESSION["username"]);  
$userid = $user[0]["id"];
$username = $user[0]["username"];
$email = $user[0]["email"];
$firstname = $user[0]["name"];
$lastname = $user[0]["lastname"];
$birthday = $user[0]["birthdate"];
$password = $user[0]["password"];
$city = $user[0]["city"];
$phone = $user[0]["phone"];
$agency_id = $user[0]["agency_id"];
$agent_licence = $user[0]["agent_licence"];
$userType = $member->userTypeToText($user[0]["usertype"]);


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
        <h1 class="heading" data-aos="fade-up">Moj profil</h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
              Moj profil
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
      <form method="post" action="myprofile.php" oninput='passwordcheck.setCustomValidity(passwordcheck.value != password.value ? "Lozinke se ne poklapaju." : "")'>
        <div class="row justify-content-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <label for="name" class="col-form-label">Ime:</label>
              <input type="text" id="name" class="form-control" value="<?php echo $firstname ?>" name="name" required placeholder="Ime">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <label for="lastname" class="col-form-label">Prezime:</label>
              <input type="text" id="lastname" class="form-control" value="<?php echo $lastname ?>" name="lastname" required placeholder="Prezime">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <label for="email" class="col-form-label">E-mail:</label>
              <input type="email" id="email" class="form-control" value="<?php echo $email ?>" name="email" required placeholder="E-mail">
            </div>
          <div class="d-block" id="passwordChangeLink">
              <div class="input-grup form-group mt-3">
                      <div class="bg-secondary rounded-start">
                        <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                      </div><br/>
                <button type="button" class="btn btn-secondary  btn-sm" data-bs-toggle="modal" data-bs-target="#passwordModal">Promeni šifru</button>
                <div id="passwordChanged" class="text-success"></div>
              </div>
          </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <label for="birthdate" class="col-form-label">Datum rodjenja:</label>
              <input type="date" class="form-control"  id="birthdate" value="<?php echo $birthday ?>" name="birthdate" required placeholder="Datum rodjenja">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <label for="city" class="col-form-label">Grad:</label>
              <input type="text" id="city" class="form-control"  value="<?php echo $city ?>" name="city" required placeholder="Grad">
            </div>
            <div class="input-grup form-group mt-3">
              <div class="bg-secondary rounded-start">
                <span class="m-3"><i class="fas fa-key mt-2"></i></span>
              </div>
              <label for="phone" class="col-form-label">Broj telefona:</label>
              <input type="tel" id="phone"  class="form-control" value="<?php echo $phone ?>" name="phone" required placeholder="Broj telefona">
            </div>
            <div id="agencyField" class="d-none">
              <div class="input-group form-group mt-3">
                <div class="bg-secondary rounded-start">
                  <span class="m-3"><i class="fas flaticon-381-back-2 mt-2"></i></span>
                </div>
                <label for="agency_id" class="col-form-label">Agencija:</label>
                <select type="select" class="form-control" id="agency_id" name="agency_id" placeholder="Agencija">
                  <option selected>Odaberite...</option>

                  <?php
                  if (is_array($agencies)) {
                    $count = count($agencies);
                    if ($count > 0) {
                      foreach ($agencies as $agency) {
                        if ($agency_id==$agency['id'])  
                        $selected = " selected";
                        echo '<option value="' . $agency['id'] . '" class="option"' . $selected . ' >' . $agency['agency'] . '</option>';
                      }
                    }
                  } ?>

                </select>
              </div>
              <div class="input-group form-group mt-3">
                <div class="bg-secondary rounded-start">
                  <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                </div>
                <label for="agency_id" class="col-form-label">Broj licence agenta:</label>
                <input type="text" id= "agent_licence" maxlength="20" value="<?php echo $agent_licence ?>" class="form-control" name="agent_licence" placeholder="Broj licence agenta">
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit" class="btn bg-secondary float-end text-white w-100" value="Izmeni podatke" name="memberchange-btn">
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
            
<!-- CHANGE PASSWORD Modal -->
<div class="modal passwordModal" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordModalLabel">Izmena šifre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  id="formModalPassword" method="post" oninput='passwordcheck.setCustomValidity(passwordcheck.value != password.value ? "Lozinke se ne poklapaju." : "")' onSubmit="return false;">
        <div class="modal-body">
        <div class="input-grup form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <label for="password" class="col-form-label">Lozinka:</label>
                  <input type="password" id="password" class="form-control" name="password" required placeholder="Lozinka">
                </div>
                <div class="input-grup form-group mt-3">
                  <div class="bg-secondary rounded-start">
                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                  </div>
                  <label for="agency_id" class="col-form-label">Ponovite lozinku:</label>
                  <input type="password" id="passwordcheck"  class="form-control" name="passwordcheck" required placeholder="Ponovite lozinku">
                </div>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
        <button type="submit" name="modal-password-change" class="btn btn-primary modal-password-change">Promeni šifru</button>
        <input type="hidden" name="username" value="<?php echo $username ?>">
        <div id="modalError" class="row justify-content-center text-danger fw-bold mt-3">
             
            </div>
      </div>
      </form>
    </div>
  </div>
</div>


<script type="application/javascript">
  var passwordModal = document.getElementById('passwordModal')
  passwordModal.addEventListener('show.bs.modal', function (event) {
    $('#modalError').text("");
    $('#passwordChanged').text("");
  });
$(document).ready(function() {
  $("#formModalPassword").on("submit", function(event) {
    $('#passwordChanged').text('');
    var id = $( this ).serialize();    
    $.ajax({
      type: 'POST',
      url: 'passwordChange.php',
      data: $( this ).serialize(),
      success: function(data) {
        data = JSON.parse(data);
        if (data.status=="success") 
         {
          $('#passwordChanged').text(data.message);
          $('#modalError').text("");
          $('#passwordModal').modal('toggle');
        }else{
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
<script src="js/custom.js?v2"></script>
</body>

</html>