<?php
    require_once '../data/pdofredi.php';
    $demandeurmail = $_REQUEST['demandeurmail'];
    $demandeurnom = $_REQUEST['demandeurnom'];
    $demandeurprenom = $_REQUEST['demandeurprenom'];
    $demandeuradresse = $_REQUEST['demandeuradresse'];
    $demandeurcp = $_REQUEST['demandeurcp'];
    $demandeurville = $_REQUEST['demandeurville'];
    
    $pdo = PdoFredi::getPdo();
    $ledemandeurfrais = $pdo->getDemandeursFrais($demandeurmail, $demandeurnom, $demandeurprenom, $demandeuradresse, $demandeurcp, $demandeurville);
    
    echo json_encode($ledemandeurfrais);
?>