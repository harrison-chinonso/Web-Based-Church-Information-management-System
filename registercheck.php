<?php
include 'core/init.php';
user_in();
include 'includes/overall/overallmainheader.php';

$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$lname = $namearray[3];
$rol = $namearray[1];
$area = $namearray[2];
$email = $namearray[5];
$pass = $namearray[4];
$cord = "Area Cordinator";
$admin = "Administrator";


if(isset($_GET['newuser']) && empty($_GET['newuser'])) {
    if (empty($_POST) === false){
      $required_fields = array ('username','email','fname','lname','rol','area','psw','psw-repeat');
      foreach ($_POST as $key => $value){
        if (empty ($value) && in_array($key, $required_fields)=== true){
              $errors[] = 'Fill in all required fields'; 
        }
      }
        if(empty($errors) === true){
                if(user_exists($_POST['username']) === true) {
                  $errors[] = 'Sorry. the username \'' . $_POST['username'].'\' is already taken';
                }
                if(preg_match('/\\s/', $_POST['username'])=== true){
                  $errors[]= 'Your username must not contain spaces';
                }
                if(strlen($_POST['psw']) < 6){
                  $errors[] = 'Your Password must be atleast 6 Character';
                }
                if($_POST['psw'] !== $_POST['psw-repeat']){
                  $errors[] = 'Your Passwords do not Match';
                }
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)=== false){
                  $errors[]= 'A Valid email address is required';
                }
                if(email_exists($_POST['email'],'user_tb') === true) {
                  $errors[] = 'Sorry. the email \'' . $_POST['email'].'\' is already taken';
                  }
                if(name_exists($_POST['fname'],$_POST['lname'],'user_tb') === true) {
                  $errors[] = 'Sorry. the firstname \'' . $_POST['fname'].'\' and the lastname \'' . $_POST['lname'].'\' combination is already taken';
                }       
        }
        if (empty($_POST) === false && empty($errors) === true ){
            $register_data = array(
                'username'   => $_POST['username'],
                'email'      => $_POST['email'],
                'pass'       => $_POST['psw'],
                'firstname'  => $_POST['fname'],
                'lastname'   => $_POST['lname'],
                'area'       => $_POST['area'],
                'cellname'   => $_POST['cellname'],
                'rol'        => $_POST['rol'],
                'referral'   => $name 
            );
            register_user($register_data);
            header('Location: work.php?success');
            exit();
        }else if(empty($errors) === false){
            include 'includes/errordisplay.php';
        }
    }
    }

else if(isset ($_GET['upuser']) && empty ($_GET['upuser']) ){
  if (empty($_POST) === false){
    $required_fields = array ('username','email','fname','lname','area');
    foreach ($_POST as $key => $value){
      if (empty ($value) && in_array($key, $required_fields)=== true){
            $errors[] = 'Fill in all required fields'; 
      }
    }
      if(empty($errors) === true){
              if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)=== false){
                  $errors[]= 'A Valid email address is required';
              }
              if(email_exists($_POST['email'],'user_tb') === true && $_POST['email'] != $email) {
                  $errors[] = 'Sorry. the email \'' . $_POST['email'].'\' is already taken';
                } 
              if(name_exists($_POST['fname'],$_POST['lname'],'user_tb') === true && $_POST['fname'] != $name  && $_POST['lname'] != $lname) {
                $errors[] = 'Sorry. the firstname \'' . $_POST['fname'].'\' and the lastname \'' . $_POST['lname'].'\' combination is already taken';
               }
        }
      if (empty($_POST) === false && empty($errors) === true ){
          $register_data = array(
              'email'      => $_POST['email'],
              'firstname'  => $_POST['fname'],
              'lastname'   => $_POST['lname'],
              'area'       => $_POST['area'],
              'referral'   => $name 
          ); 
          update_user($register_data);
      }else if(empty($errors) === false){
          include 'includes/errordisplay.php';
      }
  }
  }

else if(isset($_GET['uppix']) && empty($_GET['uppix']) ){
  
        $pixname = $_FILES['dp'] ['name'];
        $extention = strtolower(substr($pixname,strpos($pixname,'.')+1));
        $size = $_FILES['dp'] ['size'];
        $maxsize = 2097152; 
        $type = $_FILES['dp'] ['type'];
        $tmp_name = $_FILES['dp'] ['tmp_name'];
        $error = $_FILES['dp'] ['error'];
        $location = 'img/';

    if(!(($extention == 'jpg' || $extention == 'jpeg') && ($type == 'image/jpeg') && ($size < $maxsize))){
          $errors[] = 'File must be jpg/jpeg and 2megabytes or less';
        }
        if (empty($_POST) === true && empty($errors) === true ){
          if (move_uploaded_file($tmp_name,$location.$pixname)){ 
                  if(save_image($pixname)){
                    header('Location: work.php?imageup');
                    }
                  else{
                    header('Location: work.php?error');
                  }
          }
        }
       else if(empty($errors) === false){
              include 'includes/errordisplay.php';
        }
}   

  else if(isset ($_GET['changepass']) && empty($_GET['changepass']) ){
    if (empty($_POST) === false){
      $required_fields = array ('cpsw','psw','psw-repeat');
      foreach ($_POST as $key => $value){
        if (empty ($value) && in_array($key, $required_fields)=== true){
              $errors[] = 'Fill in all required fields'; 
        }
      }
      if(empty($errors) === true){
          if($pass !== md5($_POST['cpsw'])) {
            $errors[] = 'Please enter you correct current password';
            }
            if(strlen($_POST['psw']) < 6){
              $errors[] = 'Your Password must be atleast 6 Character';
            }
            if(trim($_POST['psw']) !== trim($_POST['psw-repeat'])){
              $errors[] = 'Your Passwords do not Match';
            }
        }
        if (empty($_POST) === false && empty($errors) === true ){
             $newpass = $_POST['psw'];
          change_pass($newpass);
        }
        else if(empty($errors) === false){
          include 'includes/errordisplay.php';
      }
  }
}
  

?>