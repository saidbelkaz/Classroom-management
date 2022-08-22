<?php

try {
    $user_db='root';
    $password_db='';
    $db = new PDO('mysql:host=localhost;dbname=massar', "root", "");
} catch (PDOException $th) {
    echo 'config.php'.$th->getMessage();
}

?>