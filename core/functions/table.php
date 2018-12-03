<?php
$link = new mysqli('localhost', 'root','', 'dc_okota_db');

function loadPersonTable($result){
    $counter = 1;
    echo "Click full name to view personal details";
    echo "<table style='text-transform: uppercase;line-height:10px;font-size:12px; background:white;overflow:auto;' class='striped responsive-table'>
    <tr style='text-transform: uppercase; font-weight: bolder;background:gray'>

    <th>ID</th>  
    <th>Fullname</th>            
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td>" . $counter. "</td>";
        echo "<td><a style='color:black;' href='#persondetail' onclick='showall(this.value,this.name,this.id);' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['firstname'] ." ". $row['lastname'] . "</a></td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function RegisterTable($result,$field){
    $counter = 1;
    echo "Click full name to view personal details";
    echo "<table style='text-transform: uppercase;line-height:10px;font-size:12px; background:white;overflow:auto;' class='striped responsive-table'>
    <tr style='text-transform: uppercase; font-weight: bolder;background:gray;margin:0px;padding:0px;'>

    <th>ID</th>  
    <th>Fullname</th>
    <th>Phone Number</th>
    <th>Area</th>  
    <th>Registration Number</th>
    <th>Registration Date</th>           
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td>" . $counter. "</td>";
        echo "<td class='names'><a style='color:black;' href='#persondetail' onclick='showall(this.value,this.name,this.id);' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['firstname'] ." ". $row['lastname'] . "</a></td>";
        echo "<td class='phone'>" . $row['phone']. "</td>";
        echo "<td class='area'>" .$row['area']. "</td>";
        echo "<td contenteditable='true' class='reg_no'>" .$row['DCAreg_no']. "</td>";
        echo "<td contenteditable='true' id='$field' class='date'><input type='text' class='regdate datepicker' name='date_deliver' placeholder='Format(Oct 10, 2018)'></td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
    echo "<div align='center' class='text-danger'><p id='alert'></p></div>";
    echo "<div align='center'> <button type='button' class='btn' id='save' name='save'>Save</button></div>";
}

function PersonTable($result){
    $counter = 1;    
    echo "Click full name to view personal details";    
    echo "<table style='text-transform: uppercase; line-height:10px;font-size:12px;background:white;overflow:auto;' class='striped responsive-table'>
    <tr style='text-transform: uppercase; font-weight: bolder;background:gray'>

    <th>ID</th>  
    <th>Fullname</th>            
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td>" . $counter. "</td>";
        echo "<td><a style='color:black;' onclick='showperson(this.value,this.name,this.id);' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['firstname'] ." ". $row['lastname'] . "</a></td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function ScoreTable($result){
    $counter = 1;    
    echo "Click full name to view personal details";    
    echo "<table style='text-transform: uppercase; line-height:10px;font-size:12px;background:white;overflow:auto;' class='striped responsive-table'>
    <tr style='text-transform: uppercase; font-weight: bolder;background:gray'>

    <th>ID</th>  
    <th>Fullname</th>
    <th>Phone Number</th>
    <th>Area</th>  
    <th>Registration Number</th>           
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['DCAreg_no'];
        echo "<tr>";
        echo "<td>" . $counter. "</td>";
        echo "<td class='names'><a style='color:black;' href='#persondetail' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['firstname'] ." ". $row['lastname'] . "</a></td>";
        echo "<td class='phone'>" . $row['phone']. "</td>";
        echo "<td class='area'>" .$row['area']. "</td>";
        echo "<td contenteditable='true' class='reg_no'>" .$row['DCAreg_no']. "</td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function GradTableBasic($result){
    $counter = 1;    
    echo "Click full name to view personal details";    
    echo "<table style='text-transform: uppercase; line-height:10px;font-size:12px;background:white;overflow:auto;' id='gradtable' class='striped responsive-table'>
    <tr style='text-transform: uppercase; font-weight: bolder;background:gray'>

    <th width='5%'>ID</th>  
    <th width='15%'>Fullname</th>
    <th width='10%'>Phone No</th>
    <th width='10%'>Area</th>  
    <th width='10%'>Reg Number</th>
    <th width='20%'>Graduation Date</th>
    <th width='30%'>Soul Won</th>           
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['DCAreg_no'];
        echo "<tr>";
        echo "<td class='count' id='".$id."'>" . $counter. "</td>";
        echo "<td class='names'><a style='color:black;' href='#persondetail' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['firstname'] ." ". $row['lastname'] . "</a></td>";
        echo "<td class='phone'>" . $row['phone']. "</td>";
        echo "<td class='area'>" .$row['area']. "</td>";
        echo "<td class='reg_no'>" .$row['DCAreg_no']. "</td>";
        echo "<td contenteditable='true' class='graddate'>".'<input type="text" class="date" name="som" placeholder="Form(Oct 10, 2018)">'."</td>";
        echo "<td contenteditable='true' class='soulclass'>".'<input type="text" class="soul" name="som" placeholder="Souls Won">'."</td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function GradTableMat($result){
    $counter = 1;    
    echo "Click full name to view personal details";    
    echo "<table style='text-transform: uppercase; line-height:10px;font-size:12px;background:white;overflow:auto;' id='gradtable' class='striped responsive-table'>
    <tr style='text-transform: uppercase; font-weight: bolder;background:gray'>

    <th width='5%'>ID</th>  
    <th width='10%'>Fullname</th>
    <th width='10%'>Phone No</th>
    <th width='10%'>Area</th>  
    <th width='10%'>Reg Number</th>
    <th width='15%'>Graduation Date</th>
    <th width='20%'>Follow Up Assigned</th> 
    <th width='20%'>Responsibility Assigned</th>           
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['DCAreg_no'];
        echo "<tr>";
        echo "<td class='count' id='".$id."'>" . $counter. "</td>";
        echo "<td class='names'><a style='color:black;' href='#persondetail' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['firstname'] ." ". $row['lastname'] . "</a></td>";
        echo "<td class='phone'>" . $row['phone']. "</td>";
        echo "<td class='area'>" .$row['area']. "</td>";
        echo "<td class='reg_no'>" .$row['DCAreg_no']. "</td>";
        echo "<td contenteditable='true' class='graddate'>".'<input type="text" class="date" name="graddate" placeholder="Form(Oct 10,2018)">'."</td>";
        echo "<td contenteditable='true' class='followup'>".'<input type="text" class="follow" name="followup" placeholder="Follow Up assigned">'."</td>";
        echo "<td contenteditable='true' class='response'>".'<input type="text" class="responsibility" name="responsibility" placeholder="Responsibility assigned">'."</td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function viewPersonTable($result){
    $counter = 1;
    echo "Click full name to view personal details";    
    echo "<table style='text-transform: uppercase; line-height:10px;font-size:12px;background:white;overflow:auto;' class='striped responsive-table'>
    <tr style='text-transform: uppercase; font-weight: bolder;background:gray'>

    <th>ID</th>  
    <th>Fullname</th> 
    <th>PhoneNumber</th>                           
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td>" . $counter. "</td>";
        echo "<td><a style='color:black;' onclick='showperson(this.value,this.name,this.id);' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['firstname'] ." ". $row['lastname'] . "</a></td>";
        echo "<td>" . $row['phone'] ." "." ". $row['phone2'] . "</td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function reportTable($result){
    $counter = 1;    
    echo "Click on Date to view report details";    
    echo "<table style='text-transform: uppercase;line-height:10px;font-size:12px;background:white; overflow:auto;' class='striped responsive-table'>
    <tr style='text-transform: uppercase; padding:1px;font-weight: bolder;background:gray'>
    <th>ID</th>  
    <th>Date</th>                            
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td>" .$counter. "</td>";
        echo "<td><a style='color:black;' onclick='showperson(this.value,this.name,this.id);' class='detail waves-effect waves-light modal-trigger' name='view' id='$id'>" . $row['reportdate']."</a></td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function followTable($result){
    $counter = 1;        
    echo "<table style='margin-top:0px;background:gray;overflow:auto;' id='gradtable' class='striped responsive-table'>
    <tr style='text-transform: uppercase;font-size:10px; font-weight: bold; background:gray'>

            <th width='10%'>Date</th>
            <th width='10%'>First Name</th>
            <th width='10%'>Last Name</th>
            <th width='10%'>Phone</th>
            <th width='5%'>Letter Prepared</th>
            <th width='5%'>Letter Collected</th>
            <th width='5%'>Call</th>
            <th width='5%'>SMS</th>
            <th width='5%'>Letter Recieved</th>
            <th width='5%'>Letter SentOut</th>
            <th width='10%'>Person Responsible</th>
            <th width='10%'>Person's Phone number</th>
            <th width='10%'>Cell Leader</th>
            <th width='5%'>Letter Delivered</th>
            <th width='10%'>Date Of Delievery</th>
            <th width='5%'>Signed Copy Returned</th>
            <th width='5%'>Visited</th>
            <th width='10%'>Date Of Visit</th>
            <th width='5%'>Second Attendance</th>
            <th width='5%'>Attended Encounter</th>
            <th width='5%'>Joined Cell</th>
            <th width='5%'>Started DCA Basic</th>
            <th width='5%'>Started DCA Maturity</th>
            <th width='5%'>Joined Department</th>
            <th width='5%'>Started Disciplship Class</th>    
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo "<tr>";
        echo"<td class='Date'>".$row['mvpdate']."</td>";
        echo"<td class='first_name'>".$row['firstname']."</td>";
        echo"<td class='last_name'>".$row['lastname']."</td>";
        echo"<td  class='phone'>".$row['phone']."</td>";
        echo"<td  class='letter_prepared'>".$row['letter_prepared']."</td>";
        echo"<td  class='letter_collected'>".$row['letter_collected']."</td>";
        echo"<td  class='call'>".$row['called']."</td>";
        echo"<td  class='sms'>".$row['sms']."</td>";
        echo"<td  class='letter_recieved'>".$row['letter_recieved']."</td>";
        echo"<td  class='letter_sentout'>".$row['letter_sentout']."</td>";
        echo"<td  class='responsible'>".$row['person_responsible']."</td>";
        echo"<td  class='responsibleNo'>".$row['person_responsible_phone']."</td>";
        echo"<td  class='cell_leader'>".$row['cell_leader']."</td>";
        echo"<td  class='letter_deliver'>".$row['letter_delievered']."</td>";
        echo"<td  class='date_deliver'>".$row['date_of_delievery']."</td>";
        echo"<td  class='signed'>".$row['sign_copy_returned']."</td>";
        echo"<td  class='visited'>".$row['visited']."</td>";
        echo"<td  class='date_visited'>".$row['date_of_visit']."</td>";
        echo"<td  class='sectime'>".$row['2ndtime']."</td>";
        echo"<td  class='enc'>".$row['enc']."</td>";
        echo"<td  class='cell'>".$row['joined_cell']."</td>";
        echo"<td  class='dcabasic'>".$row['joined_dca']."</td>";
        echo"<td  class='mat'>".$row['joined_mat']."</td>";
        echo"<td  class='dept'>".$row['joined_dept']."</td>";
        echo"<td  class='disciple'>".$row['discipleship']."</td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function ConsolidateTable($result){
    $counter = 1;        
    echo "<table style='margin-top:0px;background:gray;overflow:auto;' id='gradtable' class='striped responsive-table'>
    <tr style='text-transform: uppercase;font-size:10px; font-weight: bold; background:gray'>

            <th width='10%'>First Name</th>
            <th width='10%'>Last Name</th>
            <th width='10%'>Phone</th>
            <th width='5%'>Encounter</th>
            <th width='5%'>DCA Basic Started</th>
            <th width='5%'>DCA Basic Ended</th>
            <th width='5%'>DCA Maturity Started</th>
            <th width='5%'>DCA Maturity Ended</th>
            <th width='5%'>Discipleship</th>
            <th width='5%'>DLI</th>
            <th width='10%'>Soul Won</th>
            <th width='10%'>Follow-Up assigned</th>
            <th width='10%'>Responsibility</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        echo "<tr>";
        echo"<td class='first_name'>".$row['firstname']."</td>";
        echo"<td class='last_name'>".$row['lastname']."</td>";
        echo"<td  class='phone'>".$row['phone']."</td>";
        echo"<td  class='enc'>".$row['enc_session']."</td>";
        echo"<td  class='startbasic'>".$row['basic_start']."</td>";
        echo"<td  class='startbasic'>".$row['basic_end']."</td>";
        echo"<td  class='matstart'>".$row['mat_start']."</td>";
        echo"<td  class='matstart'>".$row['mat_end']."</td>";
        echo"<td  class='dli'>".$row['dli_session']."</td>";
        echo"<td  class='soul'>".$row['soul_won']."</td>";
        echo"<td  class='followup'>".$row['follow_up']."</td>";
        echo"<td  class='responsibility'>".$row['responsibility']."</td>";
        echo "</tr>";
        $counter++;
    }
    echo "</table>";
}
function cellLocate($result){
        while($data[] = mysqli_fetch_object($result)) {
            $option[] = array_pop($data);
        }
        if(empty($option)===true){
            echo "Opps...Sorry, we don't have a cell around here yet. Please select another axis closer.";       
        }
        else
        {
        foreach ($option as $row){
            $id = $row->id;
                 if($row->gender === "Female"){
                    echo '
                    <div style="margin: 0px; height: 100%;" class="col s12" class="celldisplay">'.$row->map.'</div>
                    <div><p><i class="fa fa-home fa-2x"></i>'.$row->celladdress.'</p>
                    <p style="padding:5px;"><i class="fa fa-female fa-2x"></i>'.$row->cellleader.'</p>
                    <p style="padding:5px;"><i class="fa fa-phone fa-2x"></i>'.$row->phone.'</p> </div>';
                 }
                 else{
                    echo '
                    <div style="margin: 0px; height: 100%;" class="col s12" class="celldisplay">'.$row->map.'</div>
                    <div> <p><i class="fa fa-home fa-2x"></i>'.$row->celladdress.'</p>
                    <p><i class="fa fa-male fa-2x"></i>'.$row->cellleader.'</p>
                    <p><i class="fa fa-phone fa-2x"></i>'.$row->phone.'</p> </div>';
                 }
        }
    }
}
?>