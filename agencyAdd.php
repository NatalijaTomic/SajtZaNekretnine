<?php
session_start();
if (!empty($_SESSION["name"]) && $_SESSION["userType"]== 'Agencija') {
  $name = $_SESSION["name"];
} else {
  session_unset();
  $url = "./login.php";
  header("Location: $url");
}
session_write_close() ?>
<?php
use DreamTeam\Agency;

require_once __DIR__ . '/lib/Agency.php';
$agency = new Agency();

if(isset($_POST['userId'])){
    $agency = $_POST['name'];
    $adresa = $_POST['adresa'];
    $opis = $_POST['opis'];
    $slika = $_POST['slika'];
    $newagency = $agency->agencyInsert();
    echo "Agencija dodata.";
  }else{
   echo  "Agencija nije dodata.";
  }
?>
