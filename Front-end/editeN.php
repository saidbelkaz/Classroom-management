<?php
session_start();

require ('connexion.php');


try {
    if (isset($_POST['Up'])){

        $NomMatiere=$_POST['NomMatiere'];
        $NoteMatiere=$_POST['NoteMatiere'];

    $ddd= $db->prepare("UPDATE `matiere` SET `NomMatiere`='$NomMatiere',`NoteMatiere`='$NoteMatiere' WHERE id='$_GET[id]'");
    $ddd->execute();
    echo "<label> L'élève a été modifié </label>";
    header("Refresh:0; url=Note.php?cne=".$_GET['cne']);

    }
} catch (PDOException $th) {
    echo $th->getMessage();
}

$ddd= $db->prepare("SELECT* FROM `professeur` WHERE id=$_SESSION[idprof]");
$ddd->execute();     
$dd =$ddd->fetch(PDO::FETCH_OBJ);

$ddv= $db->prepare("SELECT * FROM `etudiant` WHERE cne='$_GET[cne]'");
$ddv->execute();     
$d =$ddv->fetch(PDO::FETCH_OBJ);

$dddv= $db->prepare("SELECT * FROM `matiere` WHERE id='$_GET[id]'");
$dddv->execute();     
$dz =$dddv->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ajouterEtud.css">
    <title>modifié une Note</title>
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
                <td colspan="2">
                    <h1>Modifié la Note de  <?= $d->NomEtudiant ." ".$d->PrenomEtudaint ?> !</h1>
                </td>
            </tr>
            <tr>
                <td>Nom Matiere : </td>
                <td><input type="text" name='NomMatiere' value='<?= $dz->NomMatiere ?>' required></td>
            </tr>
            <tr>
                <td>Note Matiere : </td>
                <td><input type="text" name='NoteMatiere' value='<?= $dz->NoteMatiere ?>' required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name='Up'>Update</button></td>
            </tr>
            <tr>
                <td colspan="2"><a href='indexPro.php' class="Retour" name='Retour'>Retour au menu principal</a></td>
            </tr>
        </table>
    </form>

</body>
</html>