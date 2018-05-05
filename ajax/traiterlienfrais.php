<?php
    require_once '../data/pdofredi.php';
    $ladate = new DateTime();
    $datelien = $ladate->format('Y-m-d H:i:s');
    $fraisnumlicence = $_REQUEST['fraisnumlicence'];
    $demandeurmail = $_REQUEST['demandeurmail'];
    
    $pdo = PdoFredi::getPdo();
    $lesliens = $pdo->getLienFrais($datelien, $fraisnumlicence, $demandeurmail);
    
    echo json_encode($lesliens);
?>