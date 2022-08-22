<?php
require("connexion.php");

// SEARCH
$stat= $db->prepare(" SELECT * FROM etudiant  WHERE CNE LIKE '%$_GET[ns]%' OR NomEtudiant LIKE '%$_GET[ns]%' OR niveauScolaire LIKE '%$_GET[ns]%' OR DateNaissance LIKE '%$_GET[ns]%'   ");
$stat->execute();

$results= $stat->fetchAll();
?>