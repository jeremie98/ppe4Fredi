<?php
    require_once '../data/pdofredi.php';
    $demandeurmail = $_REQUEST['demandeurmail'];
    $fraisdate = $_REQUEST['fraisdate'];
    $fraismotif = $_REQUEST['fraismotif'];
    $fraistrajet = $_REQUEST['fraistrajet'];
    $fraiskm = $_REQUEST['fraiskm'];
    $fraispeage = $_REQUEST['fraispeage'];
    $fraisrepas = $_REQUEST['fraisrepas'];
    $fraishebergement = $_REQUEST['fraishebergement'];
    
    $pdo = PdoFredi::getPdo();
    $lesfrais = $pdo->getSaisieFrais($demandeurmail, $fraisdate, $fraismotif, $fraistrajet, $fraiskm, $fraispeage, $fraisrepas, $fraishebergement);
    
    echo json_encode($lesfrais);
?>