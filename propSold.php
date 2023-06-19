<?php
session_start();
if (!empty($_SESSION["name"]) && $_SESSION["userType"] == 'Admin' || $_SESSION["userType"] == 'Agencija' || $_SESSION["userType"] == 'Agent za nekretnine') {
  $name = $_SESSION["name"];
} else {
  session_unset();
  $url = "./login.php";
  header("Location: $url");
}
session_write_close() ?>
<?php
use DreamTeam\Property;

require_once __DIR__ . '/lib/Property.php';
$property = new Property();

if(isset($_POST["id"])){
  $id = $_POST["id"];
  $soldproperty = $property->propSold($id);
    echo "Nekretnina prodata.";
  }else{
   echo  "Nekretnina nije prodata.";
  }
?>
