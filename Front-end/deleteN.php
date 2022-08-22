<?php
require("connexion.php");
try {
    
    $dd= $db->prepare("DELETE FROM `matiere` where id=$_GET[id]") ;
    $dd->execute(); 

    header("location: Note.php?cne=$_GET[cne]");

} catch (PDOException $th) {
    echo $th->getMessage();
}


?>
