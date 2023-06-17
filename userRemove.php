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

  if(isset($_POST['userId'])){
    $member->removeMember($_POST['userId']);
    echo "Korisnik uklonjen.";
  }else{
   echo  "Korisnik nije uklonjen.";
  }
?>
