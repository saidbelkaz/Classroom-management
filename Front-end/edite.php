<?php
session_start();

require ('connexion.php');


try {
    if (isset($_POST['Up'])){

        // $cne=$_POST['cne'];
        $nom=$_POST['Nom'];
        $prenom=$_POST['prenom'];
        $DateNaissance=$_POST['DateNaissance'];
        $niveauScolaire=$_POST['niveauScolaire'];
        $NumeroTele=$_POST['NumeroTele'];

    $ddd= $db->prepare("UPDATE `etudiant` SET `NomEtudiant`='$nom',`PrenomEtudaint`='$prenom',`DateNaissance`='$DateNaissance',`niveauScolaire`='$niveauScolaire',`NumeroTele`='$NumeroTele' WHERE  CNE='$_GET[cne]'");
    $ddd->execute();
    echo "<label> L'élève a été modifié </label>";

}    

} catch (PDOException $th) {
    echo $th->getMessage();
}
$dd= $db->prepare("SELECT * FROM `etudiant` WHERE CNE='$_GET[cne]'");
$dd->execute();     
$d =$dd->fetch(PDO::FETCH_OBJ);

$ddd= $db->prepare("SELECT* FROM `professeur` WHERE id=$_SESSION[idprof]");
$ddd->execute();     
$dd =$ddd->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleprofile.css">
    <script src="https://kit.fontawesome.com/a0eb35f725.js" crossorigin="anonymous"></script>
    <title>Edite</title>
</head>
<body>
    <header>
        <div class="name">
            <p><?php echo "Mr. ". $dd->nom." ".$dd->prenom;?> </p>
        </div>
    </header>
    <form method="post">
        <table>
            <tr>
                <td colspan="2"><h1>Vos informations</h1></td>
            </tr>
            <tr>
                <td>CNE : </td>
                <td><input type="text" name='cne'  value="<?= $d->CNE?>" disabled></td>
            </tr>
            <tr>
                <td>Nom: </td>
                <td><input type="text" name='Nom'  value="<?= $d->nomEtudiant?>" required></td>
            </tr>
            <tr>
                <td>Prenom :</td>
                <td><input type="text" name='prenom'  value="<?= $d->prenomEtudaint?>" required></td>
            </tr>
            <tr>
                <td>Date Naissance :</td>
                <td><input type="text"  name='DateNaissance' value="<?= $d->DateNaissance?>" required></td>
            </tr>
            <tr>
                <td>Niveau Scolaire :</td>
                <td><input type="text" name='niveauScolaire'  value="<?= $d->niveauScolaire?>"  required></td>
            </tr>
            <tr>
                <td>Numero de Telephone :</td>
                <td><input type="text" name='NumeroTele'  value="<?= $d->NumeroTele?>"  required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name='Up' >Update</button></td>
            </tr>
        </table>
    </form>
            <a href='indexPro.php' class="Retour" name='Retour'>Retour au menu principal</a>
</body>
</html>
