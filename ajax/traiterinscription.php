<?php
    require_once '../data/pdofredi.php';
    $numlicence = $_REQUEST['numlicence'];
    $mail = $_REQUEST['login'];
    $mdp = $_REQUEST['motdepasse'];
    $sexe = $_REQUEST['sexe'];
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $ddn = $_REQUEST['ddn'];
    $numligue = $_REQUEST['liguesp'];
    $rue = $_REQUEST['rue'];
    $cp = $_REQUEST['cp'];
    $ville = $_REQUEST['ville'];
    
    $pdo = PdoFredi::getPdo();
    $newadherent = $pdo->getInscription($numlicence, $mail, $mdp, $sexe, $nom, $prenom, $ddn, $numligue, $rue, $cp, $ville);
    
    echo json_encode($newadherent);
    