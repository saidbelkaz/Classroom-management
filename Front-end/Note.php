<?php
session_start();

require ('connexion.php');


$dddd= $db->prepare("SELECT * FROM `professeur` WHERE id='$_SESSION[idprof]'");
$dddd->execute();     
$ddd =$dddd->fetch(PDO::FETCH_OBJ);


$nom= $db->prepare("SELECT * from etudiant WHERE CNE='$_GET[cne]'");
$nom->execute();     
$dnom =$nom->fetch(PDO::FETCH_OBJ);

$dd= $db->prepare("SELECT NomMatiere ,NoteMatiere from etudiant inner join MATIERE on ETUDIANT.CNE=MATIERE.CNE WHERE etudiant.CNE='$_GET[cne]'");
$dd->execute();     
$d =$dd->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listestyle.css">
    <script src="https://kit.fontawesome.com/a0eb35f725.js" crossorigin="anonymous"></script>
    <title>Note</title>
</head>
<body>
    <header>
        <div class="name">
            <p><?php echo "Mr. ". $ddd->nom." ".$ddd->prenom ;?></p>
        </div>
    </header>
    <div class="div1">
        </div>
        
    </body>
    </html>
    
    <?php
require("connexion.php");

try {
    
    $dd= $db->prepare("SELECT  MATIERE.id,ETUDIANT.CNE,NomMatiere ,NoteMatiere from etudiant inner join MATIERE on ETUDIANT.CNE=MATIERE.CNE WHERE etudiant.CNE='$_GET[cne]'");
    $dd->execute(); 
    echo ' <p class="pp">Les points de '. $dnom->NomEtudiant ." ".$dnom->PrenomEtudaint .'</p>';
    echo '<table id="customers">';
    echo '<thead>';
    echo '<tr id="trd">';
    echo '<td>Nom Matiere</td>';
    echo '<td>Note Matiere</td>';
    echo '<td colspan="2">Button </td>';
    echo '</thead>';
    echo '</tr>';
    echo '<tbody id="tbody">';
    while($d = $dd->fetch())
    {
        echo "<tr><td>".$d["NomMatiere"]."</td><td>".$d['NoteMatiere']."</td><td><a href='editeN.php?cne=$_GET[cne]&id=$d[id]' id='update'>update</a></td><td><a href='deleteN.php?cne=$_GET[cne]&id=$d[id]' id='delet'>delete</a></td></tr>" ;
    }
    echo '</tbody>';
    echo '</table>'; 
    echo '<a href="indexPro.php" class="Retour" name="Retour">Retour au menu principal</a>';
    echo '<a href="AjouterNote.php?cne='.$_GET['cne'].'" class="Ajouter">Ajouter une Note</a>';

} catch (PDOException $th) {
    echo $th->getMessage();
}

echo'<footer><h5 style="margin: 100px 0;font-family: cursive; ">&copy; TDD 113</h5></footer>';
?>