<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');

$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

    $output = '';
    $query = "SELECT firstname,lastname,2ndtime,enc,joined_cell,joined_dca,joined_mat,joined_dept,discipleship FROM follow_tb WHERE area = '$area' AND discipleship = 'No' ";
    $result = mysqli_query($link, $query);
    $output = '
    <br />
    <table style="text-transform: uppercase; font-weight:500;background:white;overflow:auto;" class="striped responsive-table">
    <tr>
      <th width="15%">First Name</th>
      <th width="10%">Last Name</th>
      <th width="10%">Second Attendance</th>
      <th width="10%">Attended Encounter</th>
      <th width="10%">Joined Cell</th>
      <th width="10%">Started DCA Basic</th>
      <th width="10%">Started DCA Maturity</th>
      <th width="10%">Joined Department</th>
      <th width="10%">Started Disciplship Class</th>
      <th width="5%"></th>
    </tr>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '
    <tr>
    <td class="first_name">'.$row["firstname"].'</td>
    <td class="last_name">'.$row["lastname"].'</td>
    <td contentEditable="true" class="sectime">'.$row["2ndtime"].'</td>
    <td contentEditable="true" class="enc">'.$row["enc"].'</td>
    <td contentEditable="true" class="cell">'.$row["joined_cell"].'</td>
    <td contentEditable="true" class="dcabasic">'.$row["joined_dca"].'</td>
    <td contentEditable="true" class="mat">'.$row["joined_mat"].'</td>
    <td contentEditable="true" class="dept">'.$row["joined_dept"].'</td>
    <td contentEditable="true" class="disciple">'.$row["discipleship"].'</td>
    <td></td>
    </tr>
    ';
    }
    $output .= '</table>';
    echo $output;


?>