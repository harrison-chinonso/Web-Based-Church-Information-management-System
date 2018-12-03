<?php
$link = new mysqli('localhost', 'root','', 'dc_okota_db');

function user_in(){
    if (logged_in() === false) {
        header('Location: index.php');
        exit();
    }
}
function getPage(){
    $source_page = $_SERVER['HTTP_REFERER'];
    $str = str_word_count($source_page,1,'.');
    $page = $str[3];
    if(empty($page) === false) {    
      return $page; 
    }      
}

function logged_in(){
    return (isset($_SESSION['id'])) ? true : false;
}

if (logged_in()){
    $id = $_SESSION['id'];
    $namearray = referal($id);
    $name = $namearray[0];
    $rol = $namearray[1];
    $area = $namearray[2];
    $lastname = $namearray[3];
    $pass = $namearray[4];
    $email = $namearray[5];
    $uname = $namearray[6];
}

function register($register_data){
    global $link;
    $page = getpage();
    array_walk($register_data,'array_sanitize');
    $fields = implode(',', array_keys($register_data));
    $data='\''.implode('\',\'',$register_data).'\'';

    switch($page) {
        case 'newbeliever.php':
             mysqli_query ($link,"INSERT INTO newbeliever_tb ($fields) VALUES ($data)");
        break;

        case 'newcellreport.php':
            mysqli_query ($link,"INSERT INTO cell_tb ($fields) VALUES ($data)");
        break;

        case 'newworker.php':
            $dept = $register_data['dept']; $fname = $register_data['firstname'];$lname = $register_data['lastname'];$phone = $register_data['phone'];
            $sql = "UPDATE member_tb SET dept='$dept' WHERE firstname='$fname' AND phone='$phone' AND lastname='$lname'";
            if (mysqli_query($link,$sql)){
                header('Location: newwworker.php?success');              
            }
            else{
                header('Location: newwworker.php?error');
            }
        break;
        case 'newareareport.php':
            mysqli_query ($link,"INSERT INTO area_tb ($fields) VALUES ($data)");
        break;

        case 'newmem.php':
            mysqli_query ($link,"INSERT INTO member_tb ($fields) VALUES ($data)");
        break;

        case 'newmvp.php':
        $mvpdate = $register_data['mvpdate']; $fname = $register_data['firstname'];$lname = $register_data['lastname'];$phone = $register_data['phone'];$area = $register_data['area'];
             mysqli_query ($link,"INSERT INTO mvp_tb ($fields) VALUES ($data)");
             mysqli_query ($link,"INSERT INTO follow_tb (mvpdate,firstname,lastname,phone,area) VALUES ('$mvpdate','$fname','$lname','$phone','$area')");
        break;

        case 'registercell.php':
             mysqli_query ($link,"INSERT INTO newcell_tb ($fields) VALUES ($data)");
        break;

        case 'newdepartment.php':
        mysqli_query ($link,"INSERT INTO newdept_tb ($fields) VALUES ($data)");
        break;

        case 'newarea.php':
        mysqli_query ($link,"INSERT INTO newarea_tb ($fields) VALUES ($data)");
        break;


        default:
        
        break;
    }
    mysqli_close($link);
}
function update($register_data){
    global $link;

    $page = getpage();
   
    array_walk($register_data,'array_sanitize');
    $fname = $register_data['firstname'];
    $phone = $register_data['phone'];
    $date = $register_data['school'];

    switch($page) {

        case 'UpdateDCABasic.php':
            $sql = "UPDATE member_tb SET dcabasic='$date' WHERE firstname='$fname' AND phone='$phone'";
            if (mysqli_query($link,$sql)){
                header('Location: UpdateDCABasic.php?success');
            }
            else{
                header('Location: UpdateDCABasic.php?error');
            }
        break;
        case 'UpdateDCAMat.php':
            $sql = "UPDATE member_tb SET mat='$date' WHERE firstname='$fname' AND phone='$phone'";
            if (mysqli_query($link,$sql)){
                header('Location: UpdateDCAMat.php?success');
            }else{
                header('Location: UpdateDCAMat.php?error');
            }
        break;
        case 'UpdateDisci.php':
            $sql = "UPDATE member_tb SET discipleship='$date' WHERE firstname='$fname' AND phone='$phone'";
            if (mysqli_query($link,$sql)){
                header('Location: UpdateDisci.php?success');
            }else{
                header('Location: UpdateDisci.php?error');
            }
        break;
        case 'UpdateEnc.php':
            $sql = "UPDATE member_tb SET enc='$date' WHERE firstname='$fname' AND phone='$phone'";
            if (mysqli_query($link,$sql)){
                header('Location: UpdateEnc.php?success');
            }else{
                header('Location: UpdateEnc.php?error');                
            }
        break;
        case 'UpdateDli.php':
            $sql = "UPDATE member_tb SET dli='$date' WHERE firstname='$fname' AND phone='$phone'";
            if (mysqli_query($link,$sql)){
                header('Location: UpdateDli.php?success');
            }else{
                header('Location: UpdateDli.php?error');                
            }
        break;
        case 'UpdateSOM.php':
            $sql = "UPDATE member_tb SET school_of_ministry='$date' WHERE firstname='$fname' AND phone='$phone'";
            if (mysqli_query($link,$sql)){
                header('Location: UpdateSOM.php?success');
            }else{
                header('Location: UpdateSOM.php?error');                
            }
        break;

        default:
        
        break;
    }
    mysqli_close($link);
}

function register_user($register_data){
    global $link;
    array_walk($register_data,'array_sanitize');
    $register_data['pass'] = md5($register_data['pass']);
    $fields = implode(',', array_keys($register_data));
    $data='\''.implode('\',\'',$register_data).'\'';
    $sql = "INSERT INTO user_tb ($fields) VALUES ($data)";
    if (mysqli_query($link,$sql)){
        header('Location: work.php?success');
     }
    else{
        header('Location:  work.php?error');                
    }
    mysqli_close($link);
}

function update_user($register_data){
    global $link;
    $id = $_SESSION['id'];
    array_walk($register_data,'array_sanitize');
    $fields = implode(',', array_keys($register_data));
    $data='\''.implode('\',\'',$register_data).'\'';
    $email= $register_data['email'];
    $firstname = $register_data['firstname'];
    $lastname = $register_data['lastname'];
    $area = $register_data['area'];
    $rol = $register_data['rol'];
    $referral = $register_data['referral']; 
    $sql = "UPDATE user_tb SET email='$email',firstname='$firstname',lastname='$lastname',area='$area',referral='$referral' WHERE id = '$id'";
    if (mysqli_query($link,$sql)){
        header('Location: work.php?updated');
     }
    else{
        header('Location:  work.php?error');                
    }
    mysqli_close($link);
}

function change_pass($newpassword){
    global $link;  $id = $_SESSION['id']; $psw = sanitize($newpassword);  $newpass = md5($psw);
    $sql = "UPDATE user_tb SET pass='$newpass' WHERE id = '$id'";
    if (mysqli_query($link,$sql)){
        header('Location: work.php?passchange');
     }
    else{
        header('Location: work.php?error');                
    }
    mysqli_close($link);
}

function save_image($img){
    global $link;  $id = $_SESSION['id']; $img = sanitize($img);
    $sql = "UPDATE user_tb SET picture ='$img' WHERE id = '$id'";
    if (mysqli_query($link,$sql)){
          return true;
     }
    else{
        return false;           
    }
    mysqli_close($link);
}

function get_image(){
    global $link;  $id = $_SESSION['id'];
   $sql = "SELECT picture FROM user_tb WHERE id = '$id' limit 1";
   $result = mysqli_query( $link,$sql);
   $row = $result->fetch_row();
   if(empty($row) === false){   
    return $pix = $row[0]; 
   } 
   mysqli_close($link);
}

function user_exists($username){
    global $link; 
    global $username;
   $username = sanitize($username);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM user_tb WHERE username = '$username'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   } 
   mysqli_close($link);
 }   
function user_active($username){
    global $link;
    $username = sanitize($username);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM user_tb WHERE username = '$username' AND active = 1 ");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function dept_exists($dept,$table){
    global $link;
    $dept = sanitize($dept);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM $table WHERE dept = '$dept'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function cell_exists($cell,$table){
    global $link;
    $cell = sanitize($cell);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM $table WHERE cellname = '$cell'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function area_exists($area,$table){
    global $link;
    $area = sanitize($area);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM $table WHERE area = '$area'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function date_exists($date,$table){
    global $link;
    $date = sanitize($date);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM $table WHERE reportdate = '$date'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function email_exists($email,$table){
    global $link;
    $email = sanitize($email);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM $table WHERE email = '$email'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function name_exists($fname,$lname,$table){
    global $link;
    $fname = sanitize($fname);
    $lname = sanitize($lname);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM $table WHERE lastname = '$lname' AND firstname = '$fname'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function phone_exists($phone,$table){
    global $link;
    $phone = sanitize($phone);
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM $table WHERE phone = '$phone'");
   $row= $result->fetch_row();
   $row_cnt = $row[0];
   if($row_cnt == 1)
   {
       return true;
   }
   else{
       return false;
   }
   mysqli_close($link);
}
function user_id_from_username($username){
    global $link;
   $username = sanitize($username);
   $sql = "SELECT id FROM user_tb WHERE username = '$username'limit 1";
   $result = mysqli_query( $link,$sql);
   $row = $result->fetch_row();
   if(empty($row)===false){   
   return $user_id = $row[0]; 
   }
   mysqli_close($link);
}
function referal($user_id){
   global $link;
   $sql = "SELECT firstname,rol,area,lastname,pass,email,username FROM user_tb WHERE id = '$user_id'";
   $result = mysqli_query( $link,$sql);
   $row = $result->fetch_row();
    if(empty($row) === true){ 
        $errors[] = 'Please check your login credentials and try logging in again'; 
          header('Location: ../includes/errordisplay.php');
    }
    else{
        return $row;
    }
   mysqli_close($link);
 }
function getname($user_id){
   global $link;
   $sql = "SELECT firstname,lastname,rol,email FROM user_tb WHERE id = '$user_id'";
   $result = mysqli_query( $link,$sql);
   $row = $result->fetch_row();
   $details = $row;
   $fname = $details[0];
   $lname = $details[1];
   $rol = $details[2];
   $email = $details[3];
   if(empty($row) === false){ 
   return $rol."<br>". $fname." ".$lname."<br>".$email;
   }
   mysqli_close($link);
 }
function login($username, $password){
    global $link;
    $username = sanitize($username);
    $password = md5($password);

    $result = mysqli_query($link, "SELECT COUNT(id) FROM user_tb WHERE username = '$username' AND pass = '$password' ");
    $row= $result->fetch_row();
    $row_cnt = $row[0];
    if($row_cnt == 1)
    {
        return true;
    }
    else{
        return false;
    }
    mysqli_close($link);
}
function getCell (){
    global $link,$rol,$area;

    if ($rol == "Administrator") {$sql = "SELECT cellname FROM newcell_tb";}
 else{$sql = "SELECT cellname FROM newcell_tb WHERE area = '$area'";}

      $result = mysqli_query( $link,$sql);
while($row[] = mysqli_fetch_object($result)){
        $data[] = array_pop($row);
        }
        if(empty($data) === false){        
            return $data;
        }
   mysqli_close($link);
}
function getAreaCell ($selArea){
    global $link;
        $sql = "SELECT cellname FROM newcell_tb WHERE area = '$selArea'";
      $result = mysqli_query( $link,$sql);
while($row[] = mysqli_fetch_object($result)){
        $data[] = array_pop($row);
        }
        if(empty($data) === false){
         return $data;
        }
   mysqli_close($link);
}
function getrol(){
    global $link;
    $sql = "SELECT DISTINCT rol FROM user_tb";
      $result = mysqli_query( $link,$sql);
while($row[] = mysqli_fetch_object($result)){
        $data[] = array_pop($row);
        }
        if(empty($data) === false){        
            return $data;
        }
   mysqli_close($link);
}
function getdept (){
    global $link,$rol,$area;

    $sql = "SELECT dept FROM newdept_tb";
      $result = mysqli_query( $link,$sql);
while($row[] = mysqli_fetch_object($result)){
        $data[] = array_pop($row);
        }
        if(empty($data) === false){        
            return $data;
        }
   mysqli_close($link);
}
function getarea (){
    global $link,$rol,$area;

    $sql = "SELECT area FROM newarea_tb";
      $result = mysqli_query( $link,$sql);
while($row[] = mysqli_fetch_object($result)){
        $data[] = array_pop($row);
        }
        if(empty($data) === false){        
            return $data;
        }
   mysqli_close($link);
}
function getTotalUser(){
    global $link;
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM user_tb");
   $row = $result->fetch_row();
    if(empty($row)===false){
   return $total = $row[0];
}
   mysqli_close($link);
}
function getActiveUser(){
    global $link;
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM user_tb WHERE active = 1");
   $row = $result->fetch_row();
   if(empty($row)===false){   
   return $total = $row[0];}
   mysqli_close($link);
}
function getPassiveUser(){
    global $link;
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM user_tb WHERE active = 0");
   $row = $result->fetch_row();
   if(empty($row)===false){   
   return $total = $row[0];}
   mysqli_close($link);
}
function getCellMembers(){
    global $link,$rol,$area,$name,$lastname;
    if ($rol == "Administrator") {$sql = "SELECT cellname FROM user_tb WHERE firstname = '$name' AND lastname = '$lastname'";}
    else{$sql = "SELECT cellname FROM user_tb WHERE area = '$area' AND firstname = '$name' AND lastname = '$lastname'";}
        $result = mysqli_query( $link,$sql);
        $row = $result->fetch_row();
        $cellname = $row[0];
        if (empty($cellname) === false){
            if ($rol == "Administrator") {$sql = "SELECT firstname,lastname FROM member_tb WHERE cell = '$cellname'";}
            else{$sql = "SELECT firstname,lastname FROM member_tb WHERE area = '$area' AND cell = '$cellname'";} 
                  $result = mysqli_query($link,$sql);
            while($row[] = mysqli_fetch_object($result)){
                    $data[] = array_pop($row);
                    }
                    if(empty($data)===false){
                        return $data; 
                    } }
   mysqli_close($link);
}
function getTotalMember(){
    global $link;
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM member_tb");
   $row = $result->fetch_row();
   if(empty($row)===false){    
   return $total = $row[0]; }
   mysqli_close($link);
}
function getTotalMvp(){
    global $link;
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM mvp_tb");
   $row = $result->fetch_row();
   if(empty($row)===false){    
   return $total = $row[0]; }
   mysqli_close($link);
}
function getTotalNewbeliever(){
    global $link;
   $result = mysqli_query ($link, "SELECT COUNT(id) FROM newbeliever_tb");
   $row = $result->fetch_row();
   if(empty($row)===false){    
   return $total = $row[0]; }
   mysqli_close($link);
}

?>