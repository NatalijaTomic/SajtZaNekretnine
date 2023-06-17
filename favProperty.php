<?php
session_start();
if (!empty($_SESSION["name"]) && $_SESSION["userType"]== 'Kupac') {
  $username = $_SESSION["username"];
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

if(isset($_POST["id"])){
  $id = $_POST["id"];
  $username = $_SESSION["username"];
  $favproperty = $member->updateFavProp($username);
    echo "Omiljena nekretnina izmenjena.";
    echo $id;
    var_dump($_SESSION);
  }else{
   echo  "Omiljena nekretnina nije izmenjena.";
  }
?>
