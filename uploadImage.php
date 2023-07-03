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

$image = $_FILES['product_image']['name'];  //the original name of the image

$file_tmp =$_FILES['product_image']['tmp_name']; //The temporary filename of the file in which the uploaded image was stored on the server.

move_uploaded_file($file_tmp,"images/".$image); //uploads the image to the defined folder

echo $image;
 ?>
