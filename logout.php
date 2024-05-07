<?php
             echo $_SESSION['id'];
             
        session_destroy();
         echo $_SESSION['id'];
        
        header("driver.php");
        exit();

?>