<?php
include 'core/init.php';
include 'includes/overall/overallmainheader.php'; 

if(empty ($_POST) === false ){
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    if(user_exists($username) === false){
       $errors[] = 'We can\'t find that username. Be sure You\'ve registered' ; 
    }
    else if (user_active($username) === false){
       $errors[] = 'You haven\'t activated your account. Check your email for activation link'; 
    }
    else {
        $login = login($username, $password);

        if ($login === false) {
            $errors[] = 'That Username/ password combination is incorrect';
        }
        else{
            $id = user_id_from_username($username);
            $_SESSION['id'] = $id;
            getname($id);
            header('Location: work.php');
            exit();
        }
    }
}include 'includes/errordisplay.php';

include 'includes/overall/overallfooter.php'; 
if(logged_in() === false) {
    include 'includes/login.php'; 
  }
?>