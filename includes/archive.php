<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');
$page = getpage();

$userid = $_SESSION['id'];
$namearray = referal($userid);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];
$currentDateTime = date('Y-m-d H:i:s');

if($page === "viewmem.php"){
    if (empty($_POST['note']) === false){
        if(isset($_POST['note']) && isset($_POST['noteid'])){
            $newnote = $_POST['note'];
            $id = $_POST['noteid'];
                $sql = "SELECT note FROM member_tb WHERE id = '$id'";
                $result = mysqli_query( $link,$sql);
                $row = $result->fetch_row();
                $oldnote = $row[0];
                
                $note = $oldnote."<br>".$newnote."\n".$currentDateTime;
                $sql = "UPDATE member_tb SET note='$note' WHERE id='$id'";
                if (mysqli_query($link,$sql)){
                    header('Location: ../viewmem.php?noteadded');
                    return true;
                }else{
                    return false;
                    header('Location: ../viewmem.php?noteerror');             
                }
                 mysqli_close($link);
        }
    }
    else if (isset($_GET['memarc'])){
        $memid = $_GET['memarc'];
        if ($rol == "Administrator"){ 
                    $sql = "SELECT * FROM member_tb WHERE id = '".$memid."'"; }
                    else{
                    $sql = "SELECT * FROM member_tb WHERE area = '$area' AND id = '".$memid."'";                   
                    }
                $result = mysqli_query( $link,$sql);
            while($row = mysqli_fetch_array($result))
                        {
                            $register_data = array(
                                'firstname'  => $row['firstname'],
                                'lastname'   => $row['lastname'],
                                'phone'      => $row['phone'],
                                'phone2'     => $row['phone2'],
                                'email'      => $row['email'],
                                'gender'     => $row['gender'],
                                'dept'       => $row['dept'],
                                'address'    => $row['address'],
                                'cell'       => $row['cell'],
                                'area'       => $row['area'],
                                'marital'    => $row['marital'],
                                'birthday'   => $row['birthday'],            
                                'mvpdate'    => $row['mvpdate'],
                                '2ndtime'    => $row['2ndtime'],
                                'dcabasic'   => $row['dcabasic'],
                                'mat'        => $row['mat'],
                                'enc'        => $row['enc'],            
                                'discipleship'       => $row['discipleship'],
                                'school_of_ministry' => $row['school_of_ministry'],
                                'dli'                => $row['dli'],
                                'note'                => $row['note'],
                                'referral'   => $name 
                            );}
                    array_walk($register_data,'array_sanitize');
                       $fields = implode(',', array_keys($register_data));
                       $data='\''.implode('\',\'',$register_data).'\'';
                    mysqli_query ($link,"INSERT INTO arcmember_tb ($fields) VALUES ($data)"); 
                    $sql = "DELETE FROM member_tb WHERE  id = '".$memid."'"; 
                    if (mysqli_query($link,$sql)){
                        header('Location: ../viewmem.php?moved');
                    }else{
                        header('Location: ../viewmem.php?errormove');
                    }                             
                    mysqli_close($link);
}
else if (isset($_GET['noteview'])){
                $idnote = $_GET['noteview'];
                $sql = "SELECT note FROM member_tb WHERE id = '".$idnote."'"; 
                 $result = mysqli_query( $link,$sql);
                 $row = $result->fetch_row();
                if(empty($row)===false){   
                echo $note = $row[0]; }   
}
}
else if (isset($_GET['arcmem'])){
$memid = $_GET['arcmem'];
if ($rol == "Administrator"){ 
            $sql = "SELECT * FROM arcmember_tb WHERE id = '".$memid."'"; }
            else{
            $sql = "SELECT * FROM arcmember_tb WHERE area = '$area' AND id = '".$memid."'";                   
            }
        $result = mysqli_query( $link,$sql);
    while($row = mysqli_fetch_array($result))
                {
                    $register_data = array(
                        'firstname'  => $row['firstname'],
                        'lastname'   => $row['lastname'],
                        'phone'      => $row['phone'],
                        'phone2'     => $row['phone2'],
                        'email'      => $row['email'],
                        'gender'     => $row['gender'],
                        'dept'       => $row['dept'],
                        'address'    => $row['address'],
                        'cell'       => $row['cell'],
                        'area'       => $row['area'],
                        'marital'    => $row['marital'],
                        'birthday'   => $row['birthday'],            
                        'mvpdate'    => $row['mvpdate'],
                        '2ndtime'    => $row['2ndtime'],
                        'dcabasic'   => $row['dcabasic'],
                        'mat'        => $row['mat'],
                        'enc'        => $row['enc'],            
                        'discipleship'       => $row['discipleship'],
                        'school_of_ministry' => $row['school_of_ministry'],
                        'dli'                => $row['dli'],
                        'note'                => $row['note'],
                        'referral'   => $name 
                    );}
            array_walk($register_data,'array_sanitize');
                $fields = implode(',', array_keys($register_data));
                $data='\''.implode('\',\'',$register_data).'\'';
            if(mysqli_query ($link,"INSERT INTO member_tb ($fields) VALUES ($data)")){ 
            $sql = "DELETE FROM arcmember_tb WHERE  id = '".$memid."'"; 
                if (mysqli_query($link,$sql)){
                    header('Location: ../arcmem.php?moved');
                }                           
                } 
                else{
                    header('Location: ../arcmem.php?errormove');
                }
            mysqli_close($link);     
}
else if($page === "viewmvp.php"){
    if (empty($_POST['note']) === false){
        if(isset($_POST['note']) && isset($_POST['noteid'])){
            $newnote = $_POST['note'];
            $id = $_POST['noteid'];
                $sql = "SELECT note FROM mvp_tb WHERE id = '$id'";
                $result = mysqli_query( $link,$sql);
                $row = $result->fetch_row();
                $oldnote = $row[0];
                
                $note = $oldnote."<br>".$newnote."\n".$currentDateTime;
                $sql = "UPDATE mvp_tb SET note='$note' WHERE id='$id'";
                if (mysqli_query($link,$sql)){
                    header('Location: ../viewmvp.php?noteadded');
                }else{
                    header('Location: ../viewmvp.php?noteerror');                
                }
                 mysqli_close($link);
        }
    }
else if (isset($_GET['noteview'])){
        $idnote = $_GET['noteview'];
        $sql = "SELECT note FROM mvp_tb WHERE id = '".$idnote."'"; 
         $result = mysqli_query( $link,$sql);
         $row = $result->fetch_row();
        if(empty($row)===false){   
        echo $note = $row[0]; }   
}
else if (isset($_GET['makemem'])){
    $idmem = $_GET['makemem'];
    $sql = "SELECT * FROM mvp_tb WHERE id = '".$idmem."'"; 
     $result = mysqli_query( $link,$sql);
     while($row = mysqli_fetch_array($result))
     {
         $register_data = array(
             'firstname'  => $row['firstname'],
             'lastname'   => $row['lastname'],
             'phone'      => $row['phone'],
             'phone2'     => $row['phone2'],
             'email'      => $row['email'],
             'gender'     => $row['gender'],
             'address'    => $row['address'],
             'cell'       => $row['cell'],
             'area'       => $row['area'],
             'marital'    => $row['marital'],
             'birthday'   => $row['birthday'],            
             'mvpdate'    => $row['mvpdate'],
             '2ndtime'    => $row['2ndtime'],
             'note'       => $row['note'],
             'referral'   => $name 
         );}
 array_walk($register_data,'array_sanitize');
     $fields = implode(',', array_keys($register_data));
     $data='\''.implode('\',\'',$register_data).'\'';
 if(mysqli_query($link,"INSERT INTO member_tb ($fields) VALUES ($data)")){ 
         echo "You have successfully Made a member.";
     }                            
     else{
         echo "Your request wasn't successful, please try again.";
     }   
}
}
?>