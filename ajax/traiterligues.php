<?php
    require_once '../data/pdofredi.php';
    $pdo = PdoFredi::getPdo();
    $lesLigues = $pdo->getLiguesSportives();
    
    echo json_encode($lesLigues);
?>