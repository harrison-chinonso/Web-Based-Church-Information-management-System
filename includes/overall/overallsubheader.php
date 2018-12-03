<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body id="workbody">
<?php include 'includes/headerwork.php';?>

<?php 
if (logged_in()){
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[1];
$cord = "Area Cordinator";
$pastor = "Pastor";

if( $cord === $name || $pastor === $cord ) {
    include 'includes/register.php';    
}
}
?>