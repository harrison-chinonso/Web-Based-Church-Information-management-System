
<?php
 include 'core/init.php';  
 include 'includes/overall/overallmainheader.php'; 
 include 'includes/slider.php';
 include 'includes/aboutus.php';
 include 'includes/services.php';
 include 'includes/gallery.php';
 include 'includes/financial.php';
 include 'includes/overall/overallfooter.php'; 
 ?>
 <?php

 if(logged_in() === false) {
     include 'includes/login.php'; 
}
 ?>
