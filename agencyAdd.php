
<?php
use DreamTeam\Agency;

require_once __DIR__ . '/lib/Agency.php';
$agency = new Agency();

try{
    $newagencyresult = $agency->agencyInsert();
   
   echo json_encode( unserialize(serialize($newagencyresult)));

  }catch(Exception $e){
      array(
        "status" => "error",
        "message" => "Greška:" . $e->getMessage()
    );
  }
?>
