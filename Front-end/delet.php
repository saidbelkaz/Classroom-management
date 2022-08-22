<?php
require("connexion.php");
try {
    
    $dd= $db->prepare("DELETE FROM `etudiant` WHERE CNE='$_GET[cne]'") ;
    $dd->execute(); 

    header("location: indexPro.php");

} catch (PDOException $th) {
    echo $th->getMessage();
}


?>
