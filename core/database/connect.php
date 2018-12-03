 <?php
 $connect_error = 'sorry we\'re experiencing error';
$link = new mysqli('localhost', 'root',  '', 'dc_okota_db');
if($link-> connect_errno){
    die($connect_error);
}

?> 