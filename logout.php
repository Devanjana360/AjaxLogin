<?php
session_start();
if(isset($_SESSION['email'])){

   
    header("location:login.php");
    session_destroy();
    exit();



}else{
    if (isset($_SESSION["jsonData"])) {

        header("location:login.php");
        session_destroy();
        exit();
    
    }
   
}

?>
