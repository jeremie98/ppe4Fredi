<?php
    require_once '../data/pdofredi.php';
    $login = $_REQUEST['login'];
    $pdo = PdoFredi::getPdo();
    $ligueaffiliee = $pdo->getLigueAffiliee($login);
    
   echo json_encode($ligueaffiliee);
?>
