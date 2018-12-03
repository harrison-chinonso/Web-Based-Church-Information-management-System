<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php'; 
?>

<div id="workarea" class="col s12 m8 l8 ">
<div class="card-panel mainwalk">

  <span class="black-text right" style='font-size:20px'> 
  <?php
    if(isset ($_GET['success']) && empty ($_GET['success']) ){
      echo 'You\'ve Successfully Registered';
     }
    else if(isset ($_GET['updated']) && empty ($_GET['updated']) ){
      echo 'You\'ve Successfully Updated your details';
     }
    else if(isset ($_GET['error']) && empty ($_GET['error']) ){
      echo 'We\'ve experienced an error. Please try again';
     }
    else if(isset ($_GET['passchange']) && empty ($_GET['passchange']) ){
      echo 'You\'ve Successfully Changed your password';
    }
    else if(isset ($_GET['imageup']) && empty ($_GET['imageup']) ){
      echo 'You\'ve Successfully Changed your profile picture';
    }
  ?>
  </span>
</div>
</div>
<?php
include 'includes/script.php';
include 'includes/workmenubelow.php';  
?>
