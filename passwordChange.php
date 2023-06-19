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
    $loginResult = $member->updateMemberPassword($_POST['username']);
    // if (!empty($loginResult && $loginResult["status"] == "success"))
    //   echo ($loginResult["message"]);
    //   if (!empty($loginResult && $loginResult["status"] == "error"))
    //   echo ($loginResult["message"]);

    echo json_encode( unserialize(serialize($loginResult)));

  }else{
      array(
        "status" => "error",
        "message" => "Greška: Nepoznata!"
    );
  }
?>
