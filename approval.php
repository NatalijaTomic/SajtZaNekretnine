<?php
session_start();
if (!empty($_SESSION["name"]) && $_SESSION["userType"]== 'Admin') {
  $name = $_SESSION["name"];
} else {
  session_unset();
  $url = "./login.php";
  header("Location: $url");
}
session_write_close() ?>
<?php

use DreamTeam\Member;

require_once __DIR__ . '/lib/Member.php';
$member = new Member();
$members = $member->getMembers();
$agencies = $member->getAgency();
if (isset($_POST["register-btn"])) {
  $selectedButton = $_POST["usertype"];
  switch ($selectedButton) {
    case '1':
      $loginResult = $member->registerMember();
      break;
    case '2':
      // Perform action 2
      $loginResult = $member->registerMember();
      break;
    case '3':
      // Perform action 3
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
        <h1 class="heading" data-aos="fade-up">Autorizacija korisnika</h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="index.php">Početna strana</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
            Autorizacija korisnika
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
        <div class="row justify-content-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            
                <div class="bg-secondary rounded-start">
                  <span class="m-3"><i class="fas flaticon-381-back-2 mt-2"></i></span>
                </div>
                <div class="table-responsive">
                <table id="tbl-users" class="tbl-users table table-hover">
                  <thead>
                  <th width="20%">Korisničko ime</th>
                  <th width="20%">Tip</th>
                  <th width="20%">Deaktiviraj/Aktiviraj</th>
                  <th width="20%" class="text-right">Izmeni detalje</th>
                  <th width="20%" class="text-right">Obriši</th>
                  </thead>
                  <tbody>
                  <?php
                  if (is_array($members)) {
                    $count = count($members);
                    if ($count > 0) {
                      foreach ($members as $user) {
                        echo '<tr value="' . $user['id'] . '" class="'.$member->userTypeToClass($user['usertype']) .'">'
                        .'<td>' . $user['username'] . '</td>'
                        .'<td>' .  $member->userTypeToText($user['usertype']) . '</td>'
                        .'<td>' . $member->userStatusToCheckbox($user['status'],  $user['id']) . '</td>'
                        .'<td><button type="button" class="btn btn-primary  btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="'.$user['id'].'" data-bs-usertype="'.$user['usertype'].'" data-bs-username="'.$user['username'].'" data-bs-firstname="'.$user['name'].'" data-bs-agency_id="'.$user['agency_id'].'" data-bs-agent_licence="'.$user['agent_licence'].'">Izmeni</button></td>'
                        .'<td><button type="button" class="btn btn-secondary  btn-sm" data-bs-toggle="modal" data-bs-target="#removeModal" data-bs-id="'.$user['id'].'" data-bs-username="'.$user['username'].'">Obriši</button></td></tr>';
                      }
                    }
                  } ?>
                  </tbody>
                </table>
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
    </div>
  </div>
</div>
<!-- /.untree_co-section -->



<?php include 'components/footer.php'; ?>
<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Učitavanje...</span>
  </div>
</div>
<!-- EDIT USER Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Izmena podataka korisnika</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  id="formModalEdit" method="post" onSubmit="return false;">
      <div class="modal-body">
    
       <strong>Korisnik - <span class="modal-user"></span></strong>
        <form>
          <div class="mb-3">
            <label for="user-firstname" class="col-form-label">Ime:</label>
            <input name="user-firstname"  type="text" class="form-control" id="user-firstname">
          </div>
          <div class="mb-3">
            <label for="user-lastname" class="col-form-label">Prezime:</label>
            <input name="user-lastname" type="text" class="form-control" id="user-lastname">
          </div>
          <div class="mb-3">
            <label for="user-type" class="col-form-label">Tip:</label>
            <select  name="user-type" type="select" class="form-control" id="user-type">
              <option class="option" value="1">Korisnik</option>
              <option class="option" value="2">Agent</option>
              <option class="option" value="3">Agencija</option>
            </select>
          </div>
          <label for="agency_id" class="col-form-label">Agencija:</label>
          <select name="agency_id" type="select" class="form-control" id="agency_id" placeholder="Agencija">
                  <option selected>-</option>
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
                <div class="mb-3">
            <label for="user-agencylicence" class="col-form-label">Licenca:</label>
            <input  name="user-agencylicence"  type="text" class="form-control" id="user-agencylicence">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
        
        <input type="hidden" name="userId">
        <button type="submit" name="modal-edit" class="btn btn-primary modal-edit">Izmeni</button>
        
      </div>
      </form>
    </div>
  </div>
</div>

<!-- REMOVE USER Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="removeModalLabel">Brisanje korisnika</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <strong>Da li zaista želite da obrišete korisnika - <span class="modal-user-remove"></span>?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
        <form id="formModalRemove" method="post" onSubmit="return false;">
        <input type="hidden" name="userId">
        <button type="submit" name="modal-delete" class="btn btn-primary modal-delete">Obriši</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="application/javascript">
  var editModal = document.getElementById('editModal')
  editModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var userid = button.getAttribute('data-bs-id')
  var username = button.getAttribute('data-bs-username')
  var firstname = button.getAttribute('data-bs-firstname')
  var lastname = button.getAttribute('data-bs-lastname')
  var usertype = button.getAttribute('data-bs-usertype')
  var agency = button.getAttribute('data-bs-agency_id')
  var agency_licence = button.getAttribute('data-bs-agent_licence')
  // Update the modal's content.
  var modalUsername = editModal.querySelector('.modal-user')
  modalUsername.textContent = username
  var modalFirstNameInput = editModal.querySelector('#user-firstname')
  modalFirstNameInput.value = firstname;
  var modalLastNameInput = editModal.querySelector('#user-lastname')
  modalLastNameInput.value = lastname;
  $('#user-type').val(usertype).change();
  $('#agency_id').val(agency).change();
  var modalAgencyLicenceInput = editModal.querySelector('#user-agencylicence')
  modalAgencyLicenceInput.value = agency_licence;
  var modalFooterInput = editModal.querySelector('.modal-footer input')
  modalFooterInput.value = userid;
})

var removeModal = document.getElementById('removeModal')
removeModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var userid = button.getAttribute('data-bs-id')
  var username = button.getAttribute('data-bs-username')

  // Update the modal's content.
  var modalUsername = removeModal.querySelector('.modal-user-remove')
  modalUsername.textContent = username;
  var modalFooterInput = removeModal.querySelector('.modal-footer input')
  modalFooterInput.value = userid;
})

$(document).ready(function() {
  $(".form-check.form-switch input").on("click", function(event) {
      var id = $(this).val();
      $.ajax({
      type: 'POST',
      url: 'userActivate.php',
      data: {userId : id},
      success: function(data) {
        if (data=="ok") 
         {  
          var text = $('#tbl-users tr[value="' +id + '"] td:eq(2) label').text();  
          if (text == "Aktivan") 
            text = "Neaktivan";
           else text = "Aktivan";    
          $('#tbl-users tr[value="' +id + '"] td:eq(2) label').text(text);
          }
        return false;
      }
    });
  })

  $("#formModalEdit").on("submit", function(event) {
    var id = $( this ).serialize();    
    $.ajax({
      type: 'POST',
      url: 'userEdit.php',
      data: $( this ).serialize(),
      success: function(data) {
        if (data=="ok") 
         {
          rowId = id.split('=')[1];
          $('#tbl-users tr[value="' +rowId + '"]').remove();
          $('#removeModal').modal('toggle');
        }
        return false;
      }
    });
  });

  
  $("#formModalRemove").on("submit", function(event) {
    var id = $( this ).serialize();    
    $.ajax({
      type: 'POST',
      url: 'userRemove.php',
      data: $( this ).serialize(),
      success: function(data) {
        if (data=="ok") 
         {
          rowId = id.split('=')[1];
          $('#tbl-users tr[value="' +rowId + '"]').remove();
          $('#removeModal').modal('toggle');
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