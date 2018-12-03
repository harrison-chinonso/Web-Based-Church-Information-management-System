<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');
$page = getpage();
if(empty($_SESSION['id'])=== false){
$id = $_SESSION['id'];
$namearray = referal($id);
$rol = $namearray[1];
}
if($page === "AllAttendDCABasic.php" || $page === "AllNotAttendDCABasic.php" || $page === "registerstudents.php" )  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DCA Basic'. "</td>";
                echo "<td>".$row['dcabasic']."</td>";
                echo "</tr>";
            }                                               
            echo "</table>";
        }
        
        mysqli_close($link);
}

else if($page === "AllAttendDCAMat.php" || $page === "AllNotAttendDCAMat.php" )  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DCA Maturity'. "</td>";
                echo "<td>".$row['mat']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($link);
}

else if($page === "AllAttendDisci.php" || $page === "AllNotAttendDisci.php" )  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated Discipleship Class'. "</td>";
                echo "<td>".$row['discipleship']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($link);
}

else if($page === "AllAttendDli.php" || $page === "AllNotAttendDli.php" )  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DLI'. "</td>";
                echo "<td>".$row['dli']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($link);
}

else if($page === "AllAttendEnc.php" || $page === "AllNotAttendEnc.php" )  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Attended Encounter'. "</td>";
                echo "<td>".$row['enc']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($link);
}

else if($page === "AllAttendSOM.php" || $page === "AllNotAttendSOM.php" )  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated School Of Ministry'. "</td>";
                echo "<td>".$row['school_of_ministry']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($link);
}
else if($page === "allmem.php" || $page === "viewmem.php" || $page === "cellmem.php" || $page === "Membership.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;'  class='mem striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td contenteditable='true' id='name'>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td contenteditable='true' id='phone'>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td contenteditable='true' id='email'>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td contenteditable='true' id='gender'>".$row['gender']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td contenteditable='true' id='dept'>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td contenteditable='true' id='marital'>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Age Range'. "</td>";
                echo "<td contenteditable='true' id='age'>".$row['age']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td contenteditable='true' id='birth'>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td contenteditable='true' id='address'>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td contenteditable='true' id='mvpdate'>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td contenteditable='true' id='2nd'>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td contenteditable='true' id='area'>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td contenteditable='true' id='cell'>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DCA Basic'. "</td>";
                echo "<td contenteditable='true' id='basic'>".$row['dcabasic']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DCA Maturity'. "</td>";
                echo "<td contenteditable='true' id='mat'>".$row['mat']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DLI'. "</td>";
                echo "<td contenteditable='true' id='dli'>".$row['dli']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Attended Encounter'. "</td>";
                echo "<td contenteditable='true' id='enc'>".$row['enc']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated Discipleship Class'. "</td>";
                echo "<td contenteditable='true' id='disciple'>".$row['discipleship']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated School Of Ministry'. "</td>";
                echo "<td contenteditable='true' id='som'>".$row['school_of_ministry']."</td>";
                echo "</tr>";
                echo '<p style ="display:none" id="divid"> '.$row['id'] .'</p>';  
            } 
                                                          
            echo "</table>";
        }
        mysqli_close($link);
}
else if($page === "arcmem.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM arcmember_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DCA Basic'. "</td>";
                echo "<td>".$row['dcabasic']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DCA Maturity'. "</td>";
                echo "<td>".$row['mat']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated DLI'. "</td>";
                echo "<td>".$row['dli']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Attended Encounter'. "</td>";
                echo "<td>".$row['enc']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated Discipleship Class'. "</td>";
                echo "<td>".$row['discipleship']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Graduated School Of Ministry'. "</td>";
                echo "<td>".$row['school_of_ministry']."</td>";
                echo "</tr>";
                echo '<p style ="display:none" id="divid"> '.$row['id'] .'</p>';
            }
            echo "</table>";
        }
        mysqli_close($link);
}
else if($page === "allmvp.php" || $page === "viewmvp.php" || $page === "Mvp.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM mvp_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;'  class='mvp striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td contenteditable='true' id='name'>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td contenteditable='true' id='phone'>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td contenteditable='true' id='email'>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td contenteditable='true' id='gender'>".$row['gender']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td contenteditable='true' id='marital'>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Age Range'. "</td>";
                echo "<td contenteditable='true' id='age'>".$row['age']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td contenteditable='true' id='birth'>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td contenteditable='true' id='address'>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td contenteditable='true' id='mvpdate'>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td contenteditable='true' id='2nd'>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Third Attendance'. "</td>";
                echo "<td contenteditable='true' id='3rd'>".$row['3rdtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td contenteditable='true' id='area'>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td contenteditable='true' id='cell'>".$row['cell']."</td>";
                echo "</tr>";
                echo "<p style ='display:none' id='divid' >".$row['id']."</p>";  
            }
            echo "</table>";

        }
        mysqli_close($link);
}
else if($page === "allworker.php" || $page === "viewworker.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM member_tb WHERE dept <> '' AND id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Department'. "</td>";
                echo "<td>".$row['dept']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cell']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($link);
}
else if($page === "allnewbeliever.php" || $page === "viewnewbeliever.php" || $page === "Newbelievers.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM newbeliever_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='believe striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td contenteditable='true' id='name'>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Phone Number'. "</td>";
                echo "<td contenteditable='true' id='phone'>".$row['phone']." "." ". $row['phone2'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td contenteditable='true' id='email'>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Gender'. "</td>";
                echo "<td contenteditable='true' id='gender'>".$row['gender']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Marital Status'. "</td>";
                echo "<td contenteditable='true' id='marital'>".$row['marital']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Date Of Decision'. "</td>";
                echo "<td contenteditable='true' id='decision'>".$row['decisiondate']."</td>";
                echo "</tr>";
                echo "<td>" .'Birthday'. "</td>";
                echo "<td contenteditable='true' id='birth'>".$row['birthday']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Address'. "</td>";
                echo "<td contenteditable='true' id='address'>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'First Attendance'. "</td>";
                echo "<td contenteditable='true' id='mvpdate'>".$row['mvpdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Attendance'. "</td>";
                echo "<td contenteditable='true' id='2nd'>".$row['2ndtime']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td contenteditable='true' id='area'>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td contenteditable='true' id='cell'>".$row['cell']."</td>";
                echo "</tr>";
                echo "<p style ='display:none' id='divid' >".$row['id']."</p>";
            }
            echo "</table>";
        }
        mysqli_close($link);
}
else if($page === "allareareport.php" || $page === "viewareareport.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM area_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='area striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Date Of Report'. "</td>";
                echo "<td contenteditable='true' id='reportdate'>".$row['reportdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area membership target'. "</td>";
                echo "<td contenteditable='true' id='target'>".$row['target']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Total membership'. "</td>";
                echo "<td contenteditable='true' id='totalmember'>".$row['totalmember']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Number Of Cells In Area'. "</td>";
                echo "<td contenteditable='true' id='number_of_cells'>".$row['number_of_cells']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Number Of Held Cells '. "</td>";
                echo "<td contenteditable='true' id='cellheld'>".$row['cellheld']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Newly Created cells'. "</td>";
                echo "<td contenteditable='true' id='newcell'>".$row['newcell']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell Attendance'. "</td>";
                echo "<td contenteditable='true' id='cellattend'>".$row['cellattend']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Church Attendance'. "</td>";
                echo "<td contenteditable='true' id='sundayattend'>".$row['sundayattend']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Previous MVP(s)'. "</td>";
                echo "<td contenteditable='true' id='premvp'>".$row['premvp']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'New MVP(s)'. "</td>";
                echo "<td contenteditable='true' id='newmvp'>".$row['newmvp']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Second Timers'. "</td>";
                echo "<td contenteditable='true' id='2ndtimer'>".$row['2ndtimer']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Joined Workforce'. "</td>";
                echo "<td contenteditable='true' id='workforce'>".$row['workforce']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Number went on Outreach'. "</td>";
                echo "<td contenteditable='true' id='outreach'>".$row['outreach']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Attended DCA Basic'. "</td>";
                echo "<td contenteditable='true' id='dcabasic'>".$row['dcabasic']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Attended DCA Maturity'. "</td>";
                echo "<td contenteditable='true' id='mat'>".$row['mat']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Attended DLI'. "</td>";
                echo "<td contenteditable='true' id='dli'>".$row['dli']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Attended Encounter'. "</td>";
                echo "<td contenteditable='true' id='enc'>".$row['enc']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Number of members visited'. "</td>";
                echo "<td contenteditable='true' id='visit'>".$row['visit']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Number of calls made'. "</td>";
                echo "<td contenteditable='true' id='calls'>".$row['calls']."</td>";
                echo "</tr>";
                echo '<p style ="display:none" id="divid"> '.$row['id'] .'</p>'; 
            }
            echo "</table>";     
        }
        mysqli_close($link);
}

else if($page === "allcellreport.php" || $page === "viewcellreport.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM cell_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='cell striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th width='70%'>Data</th>  
            <th width='30%'>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                    echo "<td>" .'Date Of Report'. "</td>";
                    echo "<td contenteditable='true' id='reportdate'>".$row['reportdate']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Name Of Cell'. "</td>";
                    echo "<td contenteditable='true' id='name_of_cell'>".$row['name_of_cell']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Name Of Cell Leader'. "</td>";
                    echo "<td contenteditable='true' id='cellleader'>".$row['cellleader']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Cell membership target'. "</td>";
                    echo "<td contenteditable='true' id='target'>".$row['target']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Cell Population'. "</td>";
                    echo "<td contenteditable='true' id='cellpop'>".$row['cellpop']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Meeting Start Time'. "</td>";
                    echo "<td contenteditable='true' id='start'>".$row['start']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Meeting End Time'. "</td>";
                    echo "<td contenteditable='true' id='end'>".$row['end']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Cell Attendance'. "</td>";
                    echo "<td contenteditable='true' id='cellattend'>".$row['cellattend']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Church Attendance'. "</td>";
                    echo "<td contenteditable='true' id='sundayattend'>".$row['sundayattend']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Church MVP(s)'. "</td>";
                    echo "<td contenteditable='true' id='churchmvp'>".$row['churchmvp']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Cell MVP(s)'. "</td>";
                    echo "<td contenteditable='true' id='cellmvp'>".$row['cellmvp']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Second Timers'. "</td>";
                    echo "<td contenteditable='true' id='2ndtimer'>".$row['2ndtimer']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Offering'. "</td>";
                    echo "<td contenteditable='true' id='offering'>".$row['offering']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Attended DCA Basic'. "</td>";
                    echo "<td contenteditable='true' id='dcabasic'>".$row['dcabasic']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Attended DCA Maturity'. "</td>";
                    echo "<td contenteditable='true' id='mat'>".$row['mat']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Attended DLI'. "</td>";
                    echo "<td contenteditable='true' id='dli'>".$row['dli']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Attended Encounter'. "</td>";
                    echo "<td contenteditable='true' id='enc'>".$row['enc']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Number of members visited'. "</td>";
                    echo "<td contenteditable='true' id='visit'>".$row['visit']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>" .'Cell Attendants'. "</td>";
                    echo "<td contenteditable='true' id='cellperson'>".$row['cellperson']."</td>";
                echo "</tr>";
                echo '<p style ="display:none" id="divid"> '.$row['id'] .'</p>'; 
            }
            echo "</table>";     
        }
        mysqli_close($link);
}
else if($page === "manageusers.php")  
{
    if(isset($_GET["id"]))
        {
            $id =  $_GET["id"];
            $query = "SELECT * FROM user_tb WHERE id = '$id' ";
            $result = mysqli_query($link, $query);
            echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>
            <tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
        
            <th>Data</th>  
            <th>Details</th>            
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" .'Fullname'. "</td>";
                echo "<td>".$row['firstname']." ". $row['lastname'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Username'. "</td>";
                echo "<td>".$row['username']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Email'. "</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Role'. "</td>";
                echo "<td>".$row['rol']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Area'. "</td>";
                echo "<td>".$row['area']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Cell'. "</td>";
                echo "<td>".$row['cellname']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" .'Referal'. "</td>";
                echo "<td>".$row['referral']."</td>";
                echo "</tr>";
                echo '<p style ="display:none" id="divid"> '.$row['id'] .'</p>';  
                echo '<div id="confirm" style="display:none"><h4>You are about to delete a user. Continue ??</h4><div class="col m4 s12"><button name="deleteuser" onclick="showperson(this.value,this.name,'.$row['id'] .');"style="font-weight: bold; font-size: 15px;" class="signup">YES</button></div><div class="col m4 s12"><button onclick="document.getElementById("confirm").style.display="none"" style="font-weight: bold; font-size: 15px;" class="signup">NO</button></div></div>';                                         
            }
            echo "</table>";
        }
        mysqli_close($link);
}
else if($page === "dcabasic.php")  
{
    if(isset($_GET['id'])){
      $id = $_GET['id'];
     $query = "SELECT * FROM dca_score_tb WHERE DCAreg_no = '$id' ";
     $result = mysqli_query($link, $query);
     while($row = mysqli_fetch_array($result)) {
     echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>";
     echo "<td style= 'font-weight:bold'>".$id."</td>";
     echo "<tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
     <th>Course</th>  
     <th>Score</th>            
     </tr>";
         echo "<tr>";
         echo "<td>" .'DCA 101: NEW BIRTH'. "</td>";
         echo "<td>".$row['DCA_101']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 102: ASSURANCE OF SALVATION'. "</td>";
         echo "<td>".$row['DCA_102']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 103: CHRISTIAN DEVOTION'. "</td>";
         echo "<td>".$row['DCA_103']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 104: STUDY OF THE WORD '. "</td>";
         echo "<td>".$row['DCA_104']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 105: HOLY GHOST BAPTISM '. "</td>";
         echo "<td>".$row['DCA_105']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 106: SOUL-WINNING'. "</td>";
         echo "<td>".$row['DCA_106']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 107: CHRISTIAN FELLOWSHIP'. "</td>";
         echo "<td>".$row['DCA_107']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 108: CHRISTIAN STEWARDSHIP'. "</td>";
         echo "<td>".$row['DCA_108']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 109: UNDERSTANDING DELIVERANCE'. "</td>";
         echo "<td>".$row['DCA_109']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 110: WATER BAPTISM'. "</td>";
         echo "<td>".$row['DCA_110']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 111: DOMINION CITY AND YOU '. "</td>";
         echo "<td>".$row['DCA_111']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 112: UNDERSTANDING THE CELL SYSTEM'. "</td>";
         echo "<td>".$row['DCA_112']."</td>";
         echo "</tr>";
     }
     echo "</table>";
     echo "<button id='".$id."' class='grad signup'>Graduate Student</button>";
 }
 mysqli_close($link);
     }
else if($page === "dcamat.php")  
{
    if(isset($_GET['id'])){
      $id = $_GET['id'];
     $query = "SELECT * FROM dca_score_tb WHERE DCAreg_no = '$id' ";
     $result = mysqli_query($link, $query);
     while($row = mysqli_fetch_array($result)) {
     echo "<table style='text-transform:uppercase;font-size:15px;background:white;' class='striped responsive-table'>";
     echo "<td style= 'font-weight:bold'>".$id."</td>";
     echo "<tr style='text-transform: uppercase;font-weight:bolder;padding:5px;background:gray'>
     <th>Course</th>  
     <th>Score</th>            
     </tr>";
         echo "<tr>";
         echo "<td>" .'DCA 201: ETERNAL LIFE (THE DIVINE LIFE)'. "</td>";
         echo "<td>".$row['DCA_201']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 202: MAN IN THREE DIMENSIONS'. "</td>";
         echo "<td>".$row['DCA_202']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 203: HOW TO BE LED OF THE SPIRIT'. "</td>";
         echo "<td>".$row['DCA_203']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 204: FRUIT OF THE SPIRIT'. "</td>";
         echo "<td>".$row['DCA_204']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 205: FAITH'. "</td>";
         echo "<td>".$row['DCA_205']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 206: AGAPE LOVE'. "</td>";
         echo "<td>".$row['DCA_206']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 207: VICTORIOUS CHRISTIAN LIVING'. "</td>";
         echo "<td>".$row['DCA_207']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 208: THE BENEFITS OF THE WILL'. "</td>";
         echo "<td>".$row['DCA_208']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 209: PRINCIPLES OF EFFECTIVE PRAYER'. "</td>";
         echo "<td>".$row['DCA_209']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 210: THE PRESENT DAY MINISTRY OF JESUS CHRIST'. "</td>";
         echo "<td>".$row['DCA_210']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 211: LAY MINISTRY'. "</td>";
         echo "<td>".$row['DCA_211']."</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>" .'DCA 212: HOW TO START AND RUN A CELL'. "</td>";
         echo "<td>".$row['DCA_212']."</td>";
         echo "</tr>";
     }
     echo "</table>";
     echo "<button id='".$id."' class='grad signup'>Graduate Student</button>";
 }
 mysqli_close($link);
     }

else if($page === "celllocator.php")  
     {          
          if(isset($_POST['area'])){
             $area = $_POST['area'];
             if (!$link) {die('Could not connect:'. mysqli_error($link));
             }
              $sql = "
                  SELECT * FROM newcell_tb WHERE area = '".$area."' 
                  ";
              $result = mysqli_query( $link,$sql);
             cellLocate($result);
             mysqli_close($link);
             }   
     }
?> 