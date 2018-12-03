<?php
include "../core/init.php";
$page = getpage();
$id = $_SESSION['id'];
$namearray = referal($id);
$rol = $namearray[1];
$name = $namearray[0];

if($page == "viewmvp.php"){
   if(isset($_POST['fullname'])){
        $id         = sanitize($_POST['id']);
        $fullname   = sanitize($_POST['fullname']);
        $allphone      =sanitize($_POST['phone']);
        $email      =sanitize($_POST['email']);
        $gender     =sanitize($_POST['gender']);
        $address    =sanitize($_POST['address']);
        $cell       =sanitize($_POST['cell']);
        $area       =sanitize($_POST['area']);
        $marital    =sanitize($_POST['marital']);
        $age        =sanitize($_POST['age']);
        $birthday   =sanitize($_POST['birthday']);          
        $mvpdate    =sanitize($_POST['mvpdate']);
        $sec        =sanitize($_POST['sec']);
        $third      =sanitize($_POST['third']);
        $firstname = (substr($fullname,0,strpos($fullname,' ')));
        $lastname = (substr($fullname,strlen($firstname)+1,strlen($fullname)));
        $phone = (substr($allphone,0,strpos($allphone,' ')));
        $phone2 = (substr($allphone,strlen($phone)+1,strlen($allphone)));
        
        $sql ="
        UPDATE mvp_tb SET firstname = '$firstname',lastname = '$lastname', phone = '$phone',phone2 = '$phone2',email = '$email',
        gender = '$gender',address = '$address',cell = '$cell',area = '$area',marital = '$marital',age = '$age',birthday = '$birthday',
        mvpdate = '$mvpdate',2ndtime = '$sec',3rdtime = '$third',referral = '$name' WHERE id = '$id'";
       if (mysqli_query($link,$sql)){
        echo $name.",You have successfully edited this record";
       }
       else{
        echo "Your request wasn't completed, please try again";
       }
   }
}
else if($page == "viewmem.php"){
    if(isset($_POST['fullname'])){
         $id         = sanitize($_POST['id']);
         $fullname   = sanitize($_POST['fullname']);
         $allphone      =sanitize($_POST['phone']);
         $email      =sanitize($_POST['email']);
         $gender     =sanitize($_POST['gender']);
         $address    =sanitize($_POST['address']);
         $cell       =sanitize($_POST['cell']);
         $area       =sanitize($_POST['area']);
         $marital    =sanitize($_POST['marital']);
         $age        =sanitize($_POST['age']);
         $birthday   =sanitize($_POST['birthday']);          
         $mvpdate    =sanitize($_POST['mvpdate']);
         $sec        =sanitize($_POST['sec']);
         $dept      =sanitize($_POST['dept']);
         $basic    =sanitize($_POST['basic']);
         $enc        =sanitize($_POST['enc']);
         $mat   =sanitize($_POST['mat']);          
         $dli    =sanitize($_POST['dli']);
         $som        =sanitize($_POST['som']);
         $disciple      =sanitize($_POST['disciple']);
         $firstname = (substr($fullname,0,strpos($fullname,' ')));
         $lastname = (substr($fullname,strlen($firstname)+1,strlen($fullname)));
         $phone = (substr($allphone,0,strpos($allphone,' ')));
         $phone2 = (substr($allphone,strlen($phone)+1,strlen($allphone)));
         
         $sql ="
         UPDATE member_tb SET firstname = '$firstname',lastname = '$lastname', phone = '$phone',phone2 = '$phone2',email = '$email',
         gender = '$gender',address = '$address',cell = '$cell',area = '$area',marital = '$marital',age = '$age',birthday = '$birthday',
         mvpdate = '$mvpdate',2ndtime = '$sec',dept = '$dept',dcabasic = '$basic',mat = '$mat',enc = '$enc',
         dli = '$dli',discipleship = '$disciple',school_of_ministry = '$som',referral = '$name' WHERE id = '$id'";
        if (mysqli_query($link,$sql)){
         echo $name.",You have successfully edited this record";
        }
        else{
         echo "Your request wasn't completed, please try again";
        }
    }
 }
else if(isset($_POST['fullname'])){
    $id         = sanitize($_POST['id']);
    $fullname   = sanitize($_POST['fullname']);
    $allphone   =sanitize($_POST['phone']);
    $email      =sanitize($_POST['email']);
    $gender     =sanitize($_POST['gender']);
    $address    =sanitize($_POST['address']);
    $cell       =sanitize($_POST['cell']);
    $area       =sanitize($_POST['area']);
    $marital    =sanitize($_POST['marital']);
    $decision   =sanitize($_POST['decision']);
    $birthday   =sanitize($_POST['birthday']);          
    $mvpdate    =sanitize($_POST['mvpdate']);
    $sec        =sanitize($_POST['sec']);
    $firstname = (substr($fullname,0,strpos($fullname,' ')));
    $lastname = (substr($fullname,strlen($firstname)+1,strlen($fullname)));
    $phone = (substr($allphone,0,strpos($allphone,' ')));
    $phone2 = (substr($allphone,strlen($phone)+1,strlen($allphone)));
    
    $sql ="
    UPDATE newbeliever_tb SET firstname = '$firstname',lastname = '$lastname', phone = '$phone',phone2 = '$phone2',email = '$email',
    gender = '$gender',address = '$address',cell = '$cell',area = '$area',marital = '$marital',decisiondate = '$decision',birthday = '$birthday',
    mvpdate = '$mvpdate',2ndtime = '$sec',referral = '$name' WHERE id = '$id'";
   if (mysqli_query($link,$sql)){
    echo $name.",You have successfully edited this record";
   }
   else{
    echo "Your request wasn't completed, please try again";
   }
}
else if($page == "viewcellreport.php"){
    if(isset($_POST['reportdate'])){
        $id                = sanitize($_POST['id']);
        $reportdate        = sanitize($_POST['reportdate']);
        $name_of_cell      = sanitize($_POST['name_of_cell']);
        $cellleader        = sanitize($_POST['cellleader']);
        $target            = sanitize($_POST['target']);
        $cellpop           = sanitize($_POST['cellpop']);
        $start             = sanitize($_POST['start']);
        $end               = sanitize($_POST['end']);
        $cellattend        = sanitize($_POST['cellattend']);
        $sundayattend      = sanitize($_POST['sundayattend']);
        $sectimer          = sanitize($_POST['sectimer']);
        $churchmvp         = sanitize($_POST['churchmvp']);
        $cellmvp           = sanitize($_POST['cellmvp']);
        $offering          = sanitize($_POST['offering']);
        $dcabasic          = sanitize($_POST['dcabasic']);
        $mat               = sanitize($_POST['mat']);
        $enc               = sanitize($_POST['enc']);
        $dli               = sanitize($_POST['dli']);
        $visit             = sanitize($_POST['visit']);
        $cellperson        = sanitize($_POST['cellperson']);
         
         $sql ="
         UPDATE cell_tb SET reportdate = '$reportdate',name_of_cell = '$name_of_cell', cellleader = '$cellleader',target = '$target',cellpop = '$cellpop',
         start = '$start',end = '$end',cellattend = '$cellattend',sundayattend = '$sundayattend',2ndtimer = '$sectimer',churchmvp = '$churchmvp',cellmvp = '$cellmvp',
         offering = '$offering',dcabasic = '$dcabasic',mat = '$mat',enc = '$enc',dli = '$dli',visit = '$visit',cellperson = '$cellperson',referral = '$name' WHERE id = '$id'";
        if (mysqli_query($link,$sql)){
         echo $name.",You have successfully edited this record";
        }
        else{
         echo "Your request wasn't completed, please try again";
        }
    }
 }
 else if($page == "viewareareport.php"){
    if(isset($_POST['reportdate'])){
        $id               = sanitize($_POST['id']);
        $reportdate       =sanitize( $_POST['reportdate']);
        $target           =sanitize( $_POST['target']);
        $totalmember      =sanitize( $_POST['totalmember']);
        $number_of_cells  =sanitize( $_POST['number_of_cells']);
        $cellheld         =sanitize( $_POST['cellheld']);
        $newcell          =sanitize( $_POST['newcell']);
        $cellattend       =sanitize( $_POST['cellattend']);
        $sundayattend     =sanitize( $_POST['sundayattend']);
        $premvp           =sanitize( $_POST['premvp']);
        $newmvp           =sanitize( $_POST['newmvp']);
        $sectimer         =sanitize( $_POST['sectimer']);
        $workforce        =sanitize( $_POST['workforce']);
        $outreach         =sanitize( $_POST['outreach']);
        $dcabasic         =sanitize( $_POST['dcabasic']);
        $mat              =sanitize( $_POST['mat']); 
        $enc              =sanitize( $_POST['enc']);
        $dli              =sanitize( $_POST['dli']);
        $visit            =sanitize( $_POST['visit']);
        $calls            =sanitize( $_POST['calls']);
         $sql ="
         UPDATE area_tb SET reportdate = '$reportdate',totalmember = '$totalmember',number_of_cells = '$number_of_cells',target = '$target',cellheld = '$cellheld',
         newcell = '$newcell',premvp = '$premvp',cellattend = '$cellattend',sundayattend = '$sundayattend',2ndtimer = '$sectimer',newmvp = '$newmvp',workforce = '$workforce',
         outreach = '$outreach',dcabasic = '$dcabasic',mat = '$mat',enc = '$enc',dli = '$dli',visit = '$visit',calls = '$calls',referral = '$name' WHERE id = '$id'";
        if (mysqli_query($link,$sql)){
         echo $name.",You have successfully edited this record";
        }
        else{
         echo "Your request wasn't completed, please try again";
        }
    }
 }


?>