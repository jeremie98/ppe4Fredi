<?php
    require_once '../data/pdofredi.php';
    $login = $_REQUEST['login'];
    $mdp = $_REQUEST['motdepasse'];
    $pdo = PdoFredi::getPdo();
    $lesinfos = $pdo->getLeAdherent($login, $mdp);
    
   echo json_encode($lesinfos);
?>
