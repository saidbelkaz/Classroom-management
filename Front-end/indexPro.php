<?php

session_start();
if(!isset($_SESSION['idprof'])){
    header("location: Back-end/login/loginprf.php");
}
require('connexion.php');

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
    <link rel="stylesheet" href="css/indexProf.css">
    <script src="https://kit.fontawesome.com/a0eb35f725.js" crossorigin="anonymous"></script>
    <title>compte</title>
</head>
<body>
    <header>
        <h1> Bienvenue sur votre compte </h1>
        <div class="name">
            <p><?php echo "Mr. ". $d->nom." ".$d->prenom;?></p>
            <a href=".../../profile.php"><i class="fa-solid fa-user-pen"></i></a>
            <a  href="../Front-end/outloge.php" ><i class="fa-solid fa-user-slash"></i>Deconnecte</a>
        </div>
    </header>
    <div class="content">
        <section>
            <article>
                <a href="ajouterEtud.php">
                <i class="fa-solid fa-person-circle-plus"></i>
                <p>Ajouter Etudiant</p></a>
            </article>
        </section>
        <section>
            <article>
                <a href="listedetudiant.php">
                <i class="fa-solid fa-graduation-cap"></i>
                <p> Liste D'étudiant</p></a>
            </article>
        </section>
    </div>

</body>
</html>