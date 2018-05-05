<?php
    require_once '../data/pdofredi.php';
    $pdo = PdoFredi::getPdo();
    $lesMotifs = $pdo->getMotifs();
    
    echo json_encode($lesMotifs);
?>