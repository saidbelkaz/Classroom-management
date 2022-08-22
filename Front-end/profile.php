<?php
session_start();

require ('connexion.php');


try {
    if (isset($_POST['Up'])){

        // $id=$_POST['id'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];

    $ddd= $db->prepare("UPDATE `professeur` SET `Email`='$email',`password`='$password',`nom`='$nom',`prenom`='$prenom' WHERE id='$_SESSION[idprof]'");
    $ddd->execute();
    // echo '<script>location.reload();</script>';
    header("Refresh:0; url=profile.php");

}    

} catch (PDOException $th) {
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
    <link rel="stylesheet" href="css/styleprofile.css">
    <script src="https://kit.fontawesome.com/a0eb35f725.js" crossorigin="anonymous"></script>
    <title>profil</title>
</head>
<body>
    <header>
        <div class="name">
            <p><?php echo "Mr. ". $d->nom." ".$d->prenom;?></p>
            <a href="outloge.php"><i class="fa-solid fa-user-slash"></i>Deconnecte</a>
        </div>
    </header>
    <form method="post">
        <table>
            <tr>
                <td colspan="2"><h1>Vos informations</h1></td>
            </tr>
            <tr>
                <td>ID : </td>
                <td><input type="text" name='id'  value="<?= $d->id?>" disabled></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name='email'  value="<?= $d->Email?>" required></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="text" name='password'  value="<?= $d->password?>" required></td>
            </tr>
            <tr>
                <td>Nom :</td>
                <td><input type="text"  name='nom' value="<?= $d->nom?>" required></td>
            </tr>
            <tr>
                <td>Prenom :</td>
                <td><input type="text" name='prenom'  value="<?= $d->prenom?>"  required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name='Up' >Update</button></td>
            </tr>
        </table>
    </form>
            <a href='indexPro.php' class="Retour" name='Retour'>Retour au menu principal</a>
</body>
</html>
