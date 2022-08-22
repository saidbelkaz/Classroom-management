<?php        
session_start();  

if (isset($_SESSION["idprof"])) {
    
    session_destroy();
    header('location: ../Back-end/login/loginprf.php ');
}


?>   
