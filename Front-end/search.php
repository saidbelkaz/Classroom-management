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
                <p><?php echo "Mr. ". $d->nom." ".$d->prenom;?></p>
                <a href=".../../profile.php"><i class="fa-solid fa-user-pen"></i></a>
                <a href="outloge.php"><i class="fa-solid fa-user-slash"></i></a>
            </div>
        </header>
        <h1 class="h1"> Liste Global !</h1>
    <form method="get">
            <input type="text" name="ns" class="ns" value="<?php if (isset($_GET['search'])) {echo $_GET['ns'];}?>" placeholder="CNE Or Nom Or Niveau Scolaire Or Date Naissance">
            <input type="submit" name="search"  class="but" value="Search">
    <div class="content">
        <a href='indexPro.php' class="Retour" name='Retour'>Retour au menu principal</a>
        <a href="ajouterEtud.php" class="Ajouter" name="Ajouter">Ajouter un Etudiant</a>
    </div>
    </form>    


</body>
</html>
<?php
require("connexion.php");

try {

    if (isset($_GET['search'])) {
        require 'searchSql.php';
        if (count($results)>0 ) {
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
            foreach ( $results as $d)
            {
                echo "<tr><td>".$d["CNE"]."</td><td>".$d['NomEtudiant']."</td><td>".$d['PrenomEtudaint']."</td><td>".$d['DateNaissance']."</td><td>".$d['niveauScolaire']."</td><td>".$d['NumeroTele']."</td><td><a href='edite.php?cne=$d[CNE]' id='update' >update</a></td><td><a href='delet.php?cne=$d[CNE]' id='delet'>delete</a></td><td><a href='Note.php?cne=$d[CNE]' id='delet'>Les Notes</a></td></tr>" ;
            }
        }else{
            echo '<table id="customers">';
            echo '<thead>';
            echo'<tr id="trd">';
            echo '<td>CNE</td>';
            echo '<td>Nom </td>';
            echo '<td>Prenom </td>';
            echo '<td>Date Naissance </td>';
            echo '<td>Niveau Scolaire </td>';
            echo '<td>Numéro de téléphone </td>';
            echo '<td colspan="2">Button </td>';
            echo ' </tr>';
            echo '</thead>';
            echo '<tbody>';
            echo " <tr> <th colspan=11 >No results found.</th> </tr> " ; 
        }
        echo '</tbody>';
        echo '</table>'; 

    }


} catch (PDOException $th) {
    echo $th->getMessage();
}

echo'<footer><h5 style="margin: 100px 0;font-family: cursive; ">&copy; TDD 113</h5></footer>';
?>