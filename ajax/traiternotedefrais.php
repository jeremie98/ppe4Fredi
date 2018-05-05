<?php
    require_once '../data/pdofredi.php';
    $numlicence = $_REQUEST['numlicence'];
    $pdo = PdoFredi::getPdo();
    $lesnotedefrais = $pdo->getNoteDeFrais($numlicence);
    
   echo json_encode($lesnotedefrais);
?>
