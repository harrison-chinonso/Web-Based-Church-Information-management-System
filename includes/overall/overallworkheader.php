<!DOCTYPE html>
<html lang="en">
<?php
include 'core/init.php'; 
user_in();
include 'includes/head.php'; ?>

<body id="workbody">
<?php include 'includes/headerwork.php';?>

 <?php 
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];
$cord = "Area Cordinator";
$admin = "Administrator";

if ($cord === $rol || $admin === $rol) {
    include 'includes/register.php';    
}
?> 