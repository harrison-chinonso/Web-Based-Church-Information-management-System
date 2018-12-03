<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');
$page = getpage();

if($page === "manageusers.php")  
{
    if(isset($_GET["deleteuser"]))
        {
            $userid =  $_GET["deleteuser"];
            $sql = "DELETE FROM user_tb WHERE  id = '".$userid."'"; 
            if (mysqli_query($link,$sql)){
                header('Location: ../manageusers.php?deleted');
            }else{
                header('Location: ../manageusers.php?errordel');
            }                             
            mysqli_close($link);
        }
}

?>