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

if(isset($_POST['userId'])){
    $member->updateMember($_POST['userId']);
    echo "Korisnik izmenjen.";
  }else{
   echo  "Korisnik nije izmenjen.";
  }
?>
