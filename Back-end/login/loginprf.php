<?php
session_start();
if (isset($_SESSION['idprof'])) {
    header('location :  Front-end/indexPro.php');
}

try {
require("connexion.php");

if (isset($_POST['submit'])) {

    $email=$_POST['email'];
    $pass=$_POST['password'];

    $sql= "SELECT * FROM `professeur` WHERE Email='$email' AND  password='$pass'";
    $statemnt = $db->prepare($sql);
    $statemnt->execute();
    $row=$statemnt->rowCount();
    $d=$statemnt->fetch();

    // echo "nom pass =>". $row ;

    if ( $row >0) {
            header("location: ../../Front-end/indexPro.php ");  
            $_SESSION['idprof']=$d['id'];
            $_SESSION['nomprof']= $d["Nom"];
            $_SESSION['prenomprof']= $d['Prenom'];
            $_SESSION['emailprof']= $d['Email'];
            $_SESSION['passwordprof']= $d['password'];
            
    }else{
        echo 'error';
    }


}
} catch (PDOException $th) {
    echo 'loginprf       !'.$th->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleprf.css">  
    <title>Login</title>
</head>

<body >
    <header>
        <h1>MASSAR</h1>
    </header>
    <div class="content1">
        <img src="../imgs/4669575.jpg" alt="backgrand" width="600px">
        <form method="post">
            <p>Bienvenue sur votre compte</p>
            <section class="content">
                <table>
                    <tr>
                        <td><input type="email" name="email" id="email" placeholder="Entrer votre Email" required>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="Password" name="password" id="Password" placeholder="Entrer votre Password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" id="submit" value="se connecter"></td>
                    </tr>
                </table>
            </section>
        </form>
    </div>

</body>
</html>


