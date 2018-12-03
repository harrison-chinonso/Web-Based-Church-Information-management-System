<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');
$page = getpage();

        $id = $_SESSION['id'];
        $namearray = referal($id);
        $name = $namearray[0];
        $rol = $namearray[1];
        $area = $namearray[2];
        
if($page === "viewmvp.php")  
{   
        if(isset($_GET['fname'])){
            $q = $_GET['fname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
            $sql = "SELECT * FROM mvp_tb WHERE  firstname LIKE '%".$q."%'";
            } else {
            $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND firstname LIKE '%".$q."%'";                
            }
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['phone'])){
            $q = $_GET['phone'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM mvp_tb WHERE phone LIKE '%".$q."%'";                
                } else {
                    $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND phone LIKE '%".$q."%'";                
                }
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['lname'])){
            $q = $_GET['lname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
            $sql = "SELECT * FROM mvp_tb WHERE lastname LIKE '%".$q."%'";}
            else{
            $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND lastname LIKE '%".$q."%'";                
            }
            $result = mysqli_query( $link,$sql);
        }
        viewPersonTable($result);
        mysqli_close($link);
}

else if($page === "allmvp.php")  
{   
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM mvp_tb WHERE gender = '".$q."'";}
               else{
                $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['stday'])){
            $q = $_GET['stday'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM mvp_tb WHERE mvpdate = '".$q."'";}
               else{
                $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND mvpdate = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['marital'])){
            $q = $_GET['marital'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM mvp_tb WHERE marital = '".$q."'";}
               else{
                $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND marital = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['stmonth'])){
            $q = $_GET['stmonth'];
            $y = substr($q,0,4);
            $m = substr($q,5,7);
            $mm = substr($q,6,7);

            if($mm == 1){$m = "Jan";}
               else if($mm == 02){$m = "Feb";} 
               else if($mm == 3){$m = "Mar";}
               else if($mm == 4){$m = "Apr";}
               else if($mm == 5){$m = "May";}
               else if($mm == 6){$m = "Jun";}
               else if($mm == 7){$m = "Jul";}
               else if($mm == 8){$m = "Aug";}
               else if($mm == 9){$m = "Sep";}
               else if($m == 10){$m = "Oct";}
               else if($m == 11){$m = "Nov";}
               else if($m == 12){$m = "Dec";}
            $q = $m."%"."%".$y;
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM mvp_tb WHERE mvpdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND mvpdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['styear'])){
            $q = $_GET['styear'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM mvp_tb WHERE mvpdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND mvpdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['return'])){
            $q = $_GET['return'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM mvp_tb WHERE 2ndtime <> '' ";}
               else{
                $sql = "SELECT * FROM mvp_tb WHERE area = '$area' AND 2ndtime <> '' ";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['mvp'])){
            $q = $_GET['mvp'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM mvp_tb";}
               else{
                $sql = "SELECT * FROM mvp_tb WHERE area = '$area'";}
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result);
        mysqli_close($link);
}

else if($page === "viewmem.php")  
{   
        if(isset($_GET['fname'])){
            $q = $_GET['fname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE firstname LIKE '%".$q."%'"; }
                else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND firstname LIKE '%".$q."%'";                   
                }
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['phone'])){
            $q = $_GET['phone'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE phone LIKE '%".$q."%'"; }
                else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND phone LIKE '%".$q."%'";                   
                }
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['lname'])){
            $q = $_GET['lname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE lastname LIKE '%".$q."%'"; }
                else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND lastname LIKE '%".$q."%'";                   
                }
            $result = mysqli_query( $link,$sql);
        }
        viewPersonTable($result);
        mysqli_close($link);
}
else if($page === "allmem.php")  
{   
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE gender = '".$q."'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE dept = '".$q."'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['marital'])){
            $q = $_GET['marital'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE marital = '".$q."'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND marital = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['discipleship'])){
            $q = $_GET['discipleship'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE ".$q." <> '' ";}
               else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND ".$q." <> '' ";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['member'])){
            $q = $_GET['member'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            $sql = "SELECT * FROM member_tb";
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb";}
               else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['birth'])){
            $q = $_GET['birth'];
            $q = substr($q,0,3);
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE birthday LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND birthday LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result);
        mysqli_close($link);
}
else if($page === "arcmem.php")  
{   
    if(isset($_GET['gender'])){
        $q = $_GET['gender'];
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
        if ($rol == "Administrator"){ 
            $sql = "SELECT * FROM arcmember_tb WHERE gender = '".$q."'"; }
            else{
            $sql = "SELECT * FROM arcmember_tb WHERE area = '$area' AND gender = '".$q."'";                   
            }
        $result = mysqli_query( $link,$sql);
    }
    else if(isset($_GET['dept'])){
        $q = $_GET['dept'];
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
        if ($rol == "Administrator"){ 
            $sql = "SELECT * FROM arcmember_tb WHERE dept = '".$q."'"; }
            else{
            $sql = "SELECT * FROM arcmember_tb WHERE area = '$area' AND dept = '".$q."'";                   
            }
        $result = mysqli_query( $link,$sql);
    }
    else if(isset($_GET['marital'])){
        $q = $_GET['marital'];
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
        if ($rol == "Administrator"){ 
            $sql = "SELECT * FROM arcmember_tb WHERE marital = '".$q."'"; }
            else{
            $sql = "SELECT * FROM arcmember_tb WHERE area = '$area' AND marital = '".$q."'";                   
            }
        $result = mysqli_query( $link,$sql);
    }
    else if(isset($_GET['discipleship'])){
        $q = $_GET['discipleship'];
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
        if ($rol == "Administrator"){ 
            $sql = "SELECT * FROM arcmember_tb WHERE ".$q." <> '' ";}
            else{
            $sql = "SELECT * FROM arcmember_tb WHERE area = '$area' AND ".$q." <> '' ";}                   
        $result = mysqli_query( $link,$sql);
    }
    else if(isset($_GET['member'])){
        $q = $_GET['member'];
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
        if ($rol == "Administrator"){ 
             $sql = "SELECT * FROM arcmember_tb";}
            else{
             $sql = "SELECT * FROM arcmember_tb WHERE area = '$area'";}
        $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['birth'])){
            $q = $_GET['birth'];
            $q = substr($q,0,3);
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM arcmember_tb WHERE birthday LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM arcmember_tb WHERE area = '$area' AND birthday LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result);
        mysqli_close($link);
}

else if($page === "cellmem.php")  
{   
        if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE cell = '".$q."'"; }
                else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND cell = '".$q."'";                   
                }
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result);
        mysqli_close($link);
}

else if($page === "viewworker.php")  
{   
        if(isset($_GET['fname'])){
            $q = $_GET['fname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND firstname LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND area = '$area' AND firstname LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['phone'])){
            $q = $_GET['phone'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND phone LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND area = '$area' AND phone LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['lname'])){
            $q = $_GET['lname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND lastname LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND area = '$area' AND lastname LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        viewPersonTable($result);
        mysqli_close($link);
}


else if($page === "allworker.php")  
{   
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM member_tb WHERE dept <> '' AND gender = '".$q."'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE dept <> '' AND area = '$area' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM member_tb WHERE dept = '".$q."'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE area = '$area' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['area'])){
            $q = $_GET['area'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND area = '".$q."'";}
               else{
                $sql = "SELECT * FROM member_tb WHERE dept <>'' AND area = '$area' AND area = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['worker'])){
            $q = $_GET['worker'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                 $sql = "SELECT * FROM member_tb WHERE dept <>'' ";}
               else{
                 $sql = "SELECT * FROM member_tb WHERE dept <>'' AND area = '$area'";}
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result); 
        mysqli_close($link);
}

else if($page === "viewnewbeliever.php")  
{   
        if(isset($_GET['fname'])){
            $q = $_GET['fname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM newbeliever_tb WHERE firstname LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND firstname LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['phone'])){
            $q = $_GET['phone'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM newbeliever_tb WHERE phone LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND phone LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['lname'])){
            $q = $_GET['lname'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM newbeliever_tb WHERE lastname LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND lastname LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        viewPersonTable($result);
        mysqli_close($link);
}


else if($page === "allnewbeliever.php")  
{   
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM newbeliever_tb WHERE gender = '".$q."'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['stday'])){
            $q = $_GET['stday'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM newbeliever_tb WHERE decisiondate LIKE '".$q."'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND decisiondate LIKE '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['marital'])){
            $q = $_GET['marital'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM newbeliever_tb WHERE marital = '".$q."'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND marital = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['stmonth'])){
            $q = $_GET['stmonth'];
            $y = substr($q,0,4);
            $m = substr($q,5,7);
            $mm = substr($q,6,7);
            if($mm == 1){$m = "Jan";}
               else if($mm == 02){$m = "Feb";} 
               else if($mm == 3){$m = "Mar";}
               else if($mm == 4){$m = "Apr";}
               else if($mm == 5){$m = "May";}
               else if($mm == 6){$m = "Jun";}
               else if($mm == 7){$m = "Jul";}
               else if($mm == 8){$m = "Aug";}
               else if($mm == 9){$m = "Sep";}
               else if($m == 10){$m = "Oct";}
               else if($m == 11){$m = "Nov";}
               else if($m == 12){$m = "Dec";}
            $q = $m."%"."%".$y;
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM newbeliever_tb WHERE decisiondate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND decisiondate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['styear'])){
            $q = $_GET['styear'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM newbeliever_tb WHERE decisiondate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area' AND decisiondate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['newbeliever'])){
            $q = $_GET['newbeliever'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM newbeliever_tb";}
               else{
                $sql = "SELECT * FROM newbeliever_tb WHERE area = '$area'";}
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result);
        mysqli_close($link);
}

else if($page === "viewareareport.php")  
{   
        if(isset($_GET['date'])){
            $q = $_GET['date'];
            
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM area_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM area_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        reportTable($result);
        mysqli_close($link);
}

else if($page === "allareareport.php")  
{   
        if(isset($_GET['areareport'])){
            $q = $_GET['areareport'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            $sql = "SELECT * FROM area_tb";
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM area_tb";}
               else{
                $sql = "SELECT * FROM area_tb WHERE area = '$area'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['day'])){
            $q = $_GET['day'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM area_tb WHERE reportdate LIKE '".$q."'";}
               else{
                $sql = "SELECT * FROM area_tb WHERE area = '$area' AND reportdate LIKE '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['monthyear'])){
            $q = $_GET['monthyear'];
            $y = substr($q,0,4);
            $m = substr($q,5,7);
            $mm = substr($q,6,7);
            if($mm == 1){$m = "Jan";} else if($mm == 02){$m = "Feb";} else if($mm == 3){$m = "Mar";}
               else if($mm == 4){$m = "Apr";} else if($mm == 5){$m = "May";} else if($mm == 6){$m = "Jun";}
               else if($mm == 7){$m = "Jul";} else if($mm == 8){$m = "Aug";} else if($mm == 9){$m = "Sep";}
               else if($m == 10){$m = "Oct";} else if($m == 11){$m = "Nov";} else if($m == 12){$m = "Dec";}
            $q = $m."%"."%".$y;
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM area_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM area_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['year'])){
            $q = $_GET['year'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM area_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM area_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['month'])){
            $q = $_GET['month'];
            $q = substr($q,0,3);
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM area_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM area_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        reportTable($result);
        mysqli_close($link);
}

else if($page === "viewcellreport.php")  
{   
        if(isset($_GET['date'])){
            $q = $_GET['date'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){ 
                $sql = "SELECT * FROM cell_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM cell_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
       
        reportTable($result);
        mysqli_close($link);
}


else if($page === "allcellreport.php")  
{   
        if(isset($_GET['cellreport'])){
            $q = $_GET['cellreport'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM cell_tb";}
               else{
                $sql = "SELECT * FROM cell_tb WHERE area = '$area'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['day'])){
            $q = $_GET['day'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM cell_tb WHERE reportdate LIKE '".$q."'";}
               else{
                $sql = "SELECT * FROM cell_tb WHERE area = '$area' AND reportdate LIKE '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['monthyear'])){
            $q = $_GET['monthyear'];
            $y = substr($q,0,4);
            $m = substr($q,5,7);
            $mm = substr($q,6,7);
            if($mm == 1){$m = "Jan";}
               else if($mm == 02){$m = "Feb";} 
               else if($mm == 3){$m = "Mar";}
               else if($mm == 4){$m = "Apr";}
               else if($mm == 5){$m = "May";}
               else if($mm == 6){$m = "Jun";}
               else if($mm == 7){$m = "Jul";}
               else if($mm == 8){$m = "Aug";}
               else if($mm == 9){$m = "Sep";}
               else if($m == 10){$m = "Oct";}
               else if($m == 11){$m = "Nov";}
               else if($m == 12){$m = "Dec";}
            $q = $m."%"."%".$y;
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM cell_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM cell_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['year'])){
            $q = $_GET['year'];
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM cell_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM cell_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['month'])){
            $q = $_GET['month'];
            $q = substr($q,0,3);
            if (!$link) {
                die('Could not connect: ' . mysqli_error($link));
            }
            if ($rol == "Administrator"){
                $sql = "SELECT * FROM cell_tb WHERE reportdate LIKE '%".$q."%'";}
               else{
                $sql = "SELECT * FROM cell_tb WHERE area = '$area' AND reportdate LIKE '%".$q."%'";}
            $result = mysqli_query( $link,$sql);
        }
        reportTable($result);
        mysqli_close($link);
}

else if($page === "AllAttendDCABasic.php")  
{   
    $field = "dcabasic";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];            
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> ''";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> ''";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);    
        mysqli_close($link);
    }
    else if($page === "AllNotAttendDCABasic.php")  
{   
    $field = "dcabasic";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' ";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' ";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result); 
        mysqli_close($link);   
    }
else if($page === "AllAttendDCAMat.php")  
{   
    $field = "mat";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];            
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> ''";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> ''";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result); 
        mysqli_close($link);   
    }
    else if($page === "AllNotAttendDCAMat.php")  
{   
    $field = "mat";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];           
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];            
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' ";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' ";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);  
        mysqli_close($link);  
    }
else if($page === "AllAttendDisci.php")  
{   
    $field = "discipleship";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> ''";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> ''";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
    }
else if($page === "AllNotAttendDisci.php")  
{   
    $field = "discipleship";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' ";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' ";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
    }
else if($page === "AllAttendEnc.php")  
{   
    $field = "enc";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];            
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> ''";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> ''";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
    }
else if($page === "AllNotAttendEnc.php")  
{   
    $field = "enc";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];            
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' ";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' ";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
    }
else if($page === "AllAttendDli.php")  
{   
    $field = "dli";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];          
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];            
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> ''";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> ''";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
    }
else if($page === "AllNotAttendDli.php")  
{   
    $field = "dli";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' ";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' ";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
    }
else if($page === "AllAttendSOM.php")  
{   
    $field = "school_of_ministry";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];           
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field <> ''";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field <> ''";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
    }
else if($page === "AllNotAttendSOM.php")  
{   
    $field = "school_of_ministry";
        if(isset($_GET['gender'])){
            $q = $_GET['gender'];            
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND gender = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND gender = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['dept'])){
            $q = $_GET['dept'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND dept = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND dept = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['cellname'])){
            $q = $_GET['cellname'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' AND cell = '".$q."'";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' AND cell = '".$q."'";}
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['allshow'])){
            $q = $_GET['allshow'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            if ($rol == "Administrator" || $rol == "DCA Staff"){$sql = "SELECT * FROM member_tb WHERE $field = '' ";}
            else{ $sql = "SELECT * FROM member_tb WHERE area = '$area' AND $field = '' ";}
            $result = mysqli_query( $link,$sql);
        }
        loadPersonTable($result);
        mysqli_close($link);    
}
else if($page === "manageusers.php") {
        
    if(isset($_GET['area'])){
            $q = $_GET['area'];           
            if (!$link) { die('Could not connect: ' . mysqli_error($link));}
            $sql = "SELECT * FROM user_tb WHERE area = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['role'])){
            $q = $_GET['role'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM user_tb WHERE  rol = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['cell'])){
            $q = $_GET['cell'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM user_tb WHERE cellname = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['all'])){           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM user_tb";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['allactive'])){          
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM user_tb WHERE active = 1";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['allpassive'])){          
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM user_tb WHERE active = 0";
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result);
        mysqli_close($link); 
} 
else if($page === "Membership.php") {

    if(isset($_GET['cell'])){
            $q = $_GET['cell'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM member_tb WHERE cell = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['all'])){           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM member_tb";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['allarea'])){  
            $q = $_GET['allarea'];        
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM member_tb WHERE area = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
        else if(isset($_GET['age'])){  
            $q = $_GET['age']; 
            $checkarea = (substr($q,strpos($q,'/')+1));
            $age = (substr($q, 0,strpos($q,'/')));       
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM member_tb WHERE age = '".$age."' AND area = '".$checkarea."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['marital'])){  
            $q = $_GET['marital']; 
            $checkarea = (substr($q,strpos($q,'/')+1));
            $marital = (substr($q, 0,strpos($q,'/')));       
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM member_tb WHERE marital = '".$marital."' AND area = '".$checkarea."'";
            $result = mysqli_query( $link,$sql);
        }
        PersonTable($result);
        mysqli_close($link); 
} 
else if($page === "Mvp.php") {

    if(isset($_GET['cell'])){
            $q = $_GET['cell'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM mvp_tb WHERE cell = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['all'])){           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM mvp_tb";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['allarea'])){  
            $q = $_GET['allarea'];        
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM mvp_tb WHERE area = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['allreturn'])){  
            $q = $_GET['allreturn'];        
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM mvp_tb WHERE 2ndtime <> '' AND area = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['age'])){  
            $q = $_GET['age']; 
            $checkarea = (substr($q,strpos($q,'/')+1));
            $age = (substr($q, 0,strpos($q,'/')));       
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM mvp_tb WHERE age = '".$age."' AND area = '".$checkarea."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['marital'])){  
            $q = $_GET['marital']; 
            $checkarea = (substr($q,strpos($q,'/')+1));
            $marital = (substr($q, 0,strpos($q,'/')));       
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM mvp_tb WHERE marital = '".$marital."' AND area = '".$checkarea."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['stday'])){
         $q = $_GET['stday'];
         $checkarea = (substr($q,strpos($q,'/')+1));
         $day = (substr($q, 0,strpos($q,'/')));
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));}
            $sql = "SELECT * FROM mvp_tb WHERE area = '".$checkarea."' AND mvpdate = '".$day."'";
            $result = mysqli_query( $link,$sql);
    }
    else if(isset($_GET['stmonth'])){
         $q = $_GET['stmonth'];
         $checkarea = (substr($q,strpos($q,'/')+1));
         $month = (substr($q, 0,strpos($q,'/')));
            $y = substr($month,0,4);
            $m = substr($month,5,7);
            $mm = substr($month,6,7);

        if($mm == 1){$m = "Jan";}
            else if($mm == 02){$m = "Feb";} 
            else if($mm == 3){$m = "Mar";}
            else if($mm == 4){$m = "Apr";}
            else if($mm == 5){$m = "May";}
            else if($mm == 6){$m = "Jun";}
            else if($mm == 7){$m = "Jul";}
            else if($mm == 8){$m = "Aug";}
            else if($mm == 9){$m = "Sep";}
            else if($m == 10){$m = "Oct";}
            else if($m == 11){$m = "Nov";}
            else if($m == 12){$m = "Dec";}
        $month = $m."%"."%".$y;
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
            $sql = "SELECT * FROM mvp_tb WHERE  area = '".$checkarea."' AND mvpdate LIKE '%".$month."%'";
            $result = mysqli_query( $link,$sql);
    }
    else if(isset($_GET['styear'])){
        $q = $_GET['styear'];
                $checkarea = (substr($q,strpos($q,'/')+1));
                $year = (substr($q, 0,strpos($q,'/')));
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
            $sql = "SELECT * FROM mvp_tb WHERE  area = '".$checkarea."' AND mvpdate LIKE '%".$year."%'";
            $result = mysqli_query( $link,$sql);
    }
        PersonTable($result);
        mysqli_close($link); 
}
 
else if($page === "Newbelievers.php") {

    if(isset($_GET['cell'])){
            $q = $_GET['cell'];
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM newbeliever_tb WHERE cell = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['all'])){           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM newbeliever_tb";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['allarea'])){  
            $q = $_GET['allarea'];        
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
           $sql = "SELECT * FROM newbeliever_tb WHERE area = '".$q."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['stday'])){
         $q = $_GET['stday'];
         $checkarea = (substr($q,strpos($q,'/')+1));
         $day = (substr($q, 0,strpos($q,'/')));
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));}
            $sql = "SELECT * FROM newbeliever_tb WHERE area = '".$checkarea."' AND decisiondate = '".$day."'";
            $result = mysqli_query( $link,$sql);
        }
    else if(isset($_GET['stmonth'])){
        $q = $_GET['stmonth'];
            $checkarea = (substr($q,strpos($q,'/')+1));
            $month = (substr($q, 0,strpos($q,'/')));
        $y = substr($q,0,4);
        $m = substr($q,5,7);
        $mm = substr($q,6,7);

        if($mm == 1){$m = "Jan";}
            else if($mm == 02){$m = "Feb";} 
            else if($mm == 3){$m = "Mar";}
            else if($mm == 4){$m = "Apr";}
            else if($mm == 5){$m = "May";}
            else if($mm == 6){$m = "Jun";}
            else if($mm == 7){$m = "Jul";}
            else if($mm == 8){$m = "Aug";}
            else if($mm == 9){$m = "Sep";}
            else if($m == 10){$m = "Oct";}
            else if($m == 11){$m = "Nov";}
            else if($m == 12){$m = "Dec";}
        $month = $m."%"."%".$y;
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
            $sql = "SELECT * FROM newbeliever_tb WHERE  area = '".$checkarea."' AND decisiondate LIKE '%".$month."%'";
            $result = mysqli_query( $link,$sql);
    }
    else if(isset($_GET['styear'])){
        $q = $_GET['styear'];
            $checkarea = (substr($q,strpos($q,'/')+1));
            $year = (substr($q, 0,strpos($q,'/')));
        if (!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
            $sql = "SELECT * FROM newbeliever_tb WHERE  area = '".$checkarea."' AND decisiondate LIKE '%".$year."%'";
        $result = mysqli_query( $link,$sql);
    }
        PersonTable($result);
        mysqli_close($link); 
}
else if($page === "registerstudents.php")  
{   
    if(isset($_GET['allbasic'])){
            $field = "basic_start";
            $q = $_GET['allbasic'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            $sql = "SELECT * FROM member_tb WHERE dcabasic = '' AND DCAreg_no = '' ";
            $result = mysqli_query( $link,$sql);
        RegisterTable($result,$field); 
        mysqli_close($link);
        } 
    else if(isset($_GET['allmat'])){
            $field = "mat_start";
            $q = $_GET['allmat'];           
            if (!$link) {die('Could not connect: ' . mysqli_error($link));}
            $sql = "
            SELECT consolidation_db.*,member_tb.* FROM consolidation_db JOIN member_tb ON member_tb.DCAreg_no = consolidation_db.reg_no WHERE mat_start = ''
            ";
            $result = mysqli_query( $link,$sql);
        RegisterTable($result,$field); 
        mysqli_close($link);
        }   
}
else if($page === "dcabasic.php")  
{          
     if(isset($_GET['word'])){
            if (!$link) {die('Could not connect:'. mysqli_error($link));
            }
           $sql = "SELECT * FROM member_tb WHERE DCAreg_no <> '' ";
            $result = mysqli_query( $link,$sql);
        ScoreTable($result);
        mysqli_close($link); 
        }  
    else if(isset($_GET['id'])){
          $id = $_GET['id'];
            if (!$link) {die('Could not connect:'. mysqli_error($link));
            }
           $sql = "SELECT * FROM member_tb WHERE DCAreg_no = '".$id."' ";
            $result = mysqli_query( $link,$sql);
        GradTableBasic($result);
        mysqli_close($link); 
        }  
}
else if($page === "dcamat.php")  
{          
     if(isset($_GET['word'])){
            if (!$link) {die('Could not connect:'. mysqli_error($link));
            }
           $sql = "SELECT * FROM member_tb WHERE DCAreg_no <> '' ";
            $result = mysqli_query( $link,$sql);
        ScoreTable($result);
        mysqli_close($link); 
        }  
    else if(isset($_GET['id'])){
          $id = $_GET['id'];
            if (!$link) {die('Could not connect:'. mysqli_error($link));
            }
           $sql = "SELECT * FROM member_tb WHERE DCAreg_no = '".$id."' ";
            $result = mysqli_query( $link,$sql);
        GradTableMat($result);
        mysqli_close($link); 
        }  
}
else if($page === "followup.php")  
{          
     if(isset($_POST['area'])){
         $area = $_POST['area'];
            if (!$link) {die('Could not connect:'. mysqli_error($link));
            }
           $sql = "SELECT * FROM follow_tb WHERE area = '".$area."' ";
            $result = mysqli_query( $link,$sql);
        followTable($result);
        mysqli_close($link); 
        }   
} 
else if($page === "consolidation.php")  
{          
     if(isset($_POST['area'])){
        $area = $_POST['area'];
        if (!$link) {die('Could not connect:'. mysqli_error($link));
        }
         $sql = "
             SELECT member_tb.*,consolidation_db.* FROM member_tb INNER JOIN consolidation_db ON member_tb.DCAreg_no = consolidation_db.reg_no WHERE member_tb.area = '".$area."'
             ";
         $result = mysqli_query( $link,$sql);
        ConsolidateTable($result);
        mysqli_close($link); 
        }   
} 
 ?>