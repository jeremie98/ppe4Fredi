<?php
    session_start();
    require_once '../data/pdofredi.php';
    $login = $_REQUEST['login'];
    $mdp = $_REQUEST['motdepasse'];
    $pdo = PdoFredi::getPdo();
    $adherent = $pdo->getLeAdherent($login, $mdp);
    if($adherent != null){
        $_SESSION['adherent'] = $adherent;
        $_SESSION['adherent']['login'] = $login;
        $_SESSION['adherent']['mdp'] = $mdp;
    }
   echo json_encode($adherent);
?>