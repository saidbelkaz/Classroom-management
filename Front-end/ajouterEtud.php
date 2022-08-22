<?php
session_start();

require ('connexion.php');

try {
    if (isset($_POST['ajouter'])){

        $cne=$_POST['cne'];
        $password=$_POST['password'];
        $nomEtud=$_POST['NomEtudiant'];
        $prenomEtud=$_POST['PrenomEtudiant'];
        $DateNaissance=$_POST['DateNaissance'];
        $NiveauScolaire=$_POST['NiveauScolaire'];
        $NumeroTele=$_POST['NumeroTele'];

        $ddd= $db->prepare("INSERT INTO `etudiant`(`CNE`, `Password`, `NomEtudiant`, `PrenomEtudaint`, `DateNaissance`, `niveauScolaire`, `NumeroTele`) VALUES ('$cne','$password','$nomEtud','$prenomEtud','$DateNaissance','$NiveauScolaire','$NumeroTele') ");
        $ddd->execute();
        echo "<label> Étudiant ajouté </label>";
    }
    if (!empty($_POST['Retour'])) {
        header('location: indexPro.php');
    }
        

}catch (PDOException $th) {
    echo $th->getMessage();
}
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
    <link rel="stylesheet" href="css/ajouterEtud.css">
    <title>Ajouter Etudiant</title>
</head>
<body>
    <header>
        <div class="name">
            <p><?php echo "Mr. ". $d->nom." ".$d->prenom;?></p>
        </div>
    </header>
    <form method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h1>Ajouter Etudiant !</h1>
                </td>
            </tr>
            <tr>
                <td>CNE : </td>
                <td><input type="text" name='cne' maxlength='11' required></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="text" name='password' required></td>
            </tr>
            <tr>
                <td>Nom Etudiant :</td>
                <td><input type="text" name='NomEtudiant' required></td>
            </tr>
            <tr>
                <td>Prenom Etudiant :</td>
                <td><input type="text" name='PrenomEtudiant' required></td>
            </tr>
            <tr>
                <td>Date Naissance :</td>
                <td><input type="text" name='DateNaissance' required></td>
            </tr>
            <tr>
                <td>Niveau Scolaire :</td>
                <td><input type="text" name='NiveauScolaire' required></td>
            </tr>
            <tr>
                <td>Numéro de téléphone :</td>
                <td><input type="text" name='NumeroTele' required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name='ajouter'>Ajouter</button></td>
            </tr>
            <tr>
                <td colspan="2"><a href='indexPro.php' class="Retour" name='Retour'>Retour au menu principal</a></td>
            </tr>
        </table>
    </form>



</body>
</html>
