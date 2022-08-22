<?php
session_start();
require("connexion.php");
$dd= $db->prepare("SELECT* FROM `professeur` WHERE id=$_SESSION[idprof]");
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
    <title>Liste</title>
</head>
<body>
        <header>
            <div class="name">
                <p><?php echo "Mr. ". $d->nom." ".$d->prenom;?> </p>
            </div>
        </header>
        <h1 class="h1"> Liste Global !</h1>
    <form  action="search.php?search=$_GET['ns']" method="get">
        <input type="text" name="ns" class="ns" placeholder="CNE Or Nom Or Niveau Scolaire Or Date Naissance">
        <input type="submit" name="search"  class="but" value="Search">
    </form>

</body>
</html>
<?php
require("connexion.php");

try {


    echo '<a href="indexPro.php" class="Retour" name="Retour">Retour au menu principal</a>';
    echo '<a href="ajouterEtud.php" class="Ajouter" name="Ajouter">Ajouter un Etudiant</a>';
    $dd= $db->prepare("SELECT * FROM etudiant") ;
    $dd->execute(); 
    echo '<table id="customers">';
    echo '<thead>';
    echo'<tr id="trd">';
    echo '<td>CNE</td>';
    echo '<td>Nom </td>';
    echo '<td>Prenom </td>';
    echo '<td>Date Naissance </td>';
    echo '<td>Niveau Scolaire </td>';
    echo '<td>Numéro de téléphone </td>';
    echo '<td colspan="3">Button </td>';
    echo ' </tr>';
    echo '</thead>';
    echo '<tbody>';
    while($d = $dd->fetch())
    {

        echo "<tr><td>".$d["CNE"]."</td><td>".$d['NomEtudiant']."</td><td>".$d['PrenomEtudaint']."</td><td>".$d['DateNaissance']."</td><td>".$d['niveauScolaire']."</td><td>".$d['NumeroTele']."</td><td><a href='edite.php?cne=$d[CNE]' id='update' >update</a></td><td><a href='delet.php?cne=$d[CNE]' id='delet'>delete</a></td><td><a href='Note.php?cne=$d[CNE]' id='delet'>Les Notes</a></td></tr>" ;
    }
    echo '</tbody>';
    echo '</table>'; 

} catch (PDOException $th) {
    echo $th->getMessage();
}
?>