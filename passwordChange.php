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
use DreamTeam\Member;

require_once __DIR__ . '/lib/Member.php';
$member = new Member();

  if(isset($_POST['username'])){
    $passwordChangeResult = $member->updateMemberPassword($_POST['username']);

    echo json_encode( unserialize(serialize($passwordChangeResult)));

  }else{
      array(
        "status" => "error",
        "message" => "Greška: Nepoznata!"
    );
  }
?>
