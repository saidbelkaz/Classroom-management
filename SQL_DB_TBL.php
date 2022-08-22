<?php

//  
try {
    $user_db='root';
    $password_db='';
    $db = new PDO('mysql:host=localhost', "root", "");
    $sql="CREATE DATABASE MASSAR";
    $p=$db->prepare($sql);
    $p->execute();

    $db = new PDO('mysql:host=localhost;dbname=massar', "root", "");
    $sql1="CREATE TABLE ETUDIANT(
	        CNE varchar(255),
	        NomEtudiant varchar(255),
	        PrenomEtudaint varchar(255),
	        DateNaissance DATE ,
	        niveauScolaire varchar(255),
	        NumeroTele int ,
	        CONSTRAINT CNE PRIMARY KEY (CNE))";
    $p=$db->prepare($sql1);
    $p->execute();

    $sql2="CREATE TABLE MATIERE(
	            id INT PRIMARY KEY AUTO_INCREMENT,
	            CNE varchar(255),
	            NomMatiere varchar(255),
	            NoteMatiere varchar(255),
	            CONSTRAINT CNE FOREIGN KEY(CNE) REFERENCES ETUDIANT(CNE)
                ON DELETE CASCADE	)";
    $p=$db->prepare($sql2);
    $p->execute();

    $sql3="CREATE TABLE PROFESSEUR(
	        id INT PRIMARY KEY AUTO_INCREMENT,
	        Email TEXT (255),
	        Password varchar(255),
	        nom varchar(255),
	        prenom varchar(255)	)";
    $p=$db->prepare($sql3);
    $p->execute();

    //insert in table professeur
    $p=$db->prepare(" INSERT INTO `professeur`(`id`, `Email`, `password`, `Nom`, `Prenom`) VALUES ('','professeur1@massar.ma','professeur1','Oussama','Sabir')");
    $p->execute();

    //insert in table etudiant
    $p=$db->prepare("INSERT INTO `etudiant`(`CNE`, `NomEtudiant`, `PrenomEtudaint`, `DateNaissance`, `niveauScolaire`, `NumeroTele`) VALUES ('R147852369','Saad','zarok','2002-02-13','TDD113','0606060606')");
    $p->execute();

    $p=$db->prepare("INSERT INTO `etudiant`(`CNE`, `NomEtudiant`, `PrenomEtudaint`, `DateNaissance`, `niveauScolaire`, `NumeroTele`) VALUES ('R123456789','achref','salat','2002-02-13','TDD113','061478523')");
    $p->execute();

    //insert in table matiere
    $p=$db->prepare("INSERT INTO `matiere`(`id`, `CNE`, `NomMatiere`, `NoteMatiere`) VALUES ('','R147852369','JAVA','15')");
    $p->execute();
    $p=$db->prepare("INSERT INTO `matiere`(`id`, `CNE`, `NomMatiere`, `NoteMatiere`) VALUES ('','R147852369','PYTHON','20')");
    $p->execute();
    $p=$db->prepare("INSERT INTO `matiere`(`id`, `CNE`, `NomMatiere`, `NoteMatiere`) VALUES ('','R147852369','HTML','10')");
    $p->execute();

    $p=$db->prepare("INSERT INTO `matiere`(`id`, `CNE`, `NomMatiere`, `NoteMatiere`) VALUES ('','R123456789','HTML','12')");
    $p->execute();
    $p=$db->prepare("INSERT INTO `matiere`(`id`, `CNE`, `NomMatiere`, `NoteMatiere`) VALUES ('','R123456789','css','13')");
    $p->execute();



    echo "La base de données a été créée avec succès ";

} catch (PDOException $th) {
    echo 'config.php'.$th->getMessage();
}

?>