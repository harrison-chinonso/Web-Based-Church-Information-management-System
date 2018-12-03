<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');

$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

    $output = '';
    $query = "SELECT mvpdate,firstname,lastname,phone,area, letter_prepared, letter_collected,called,sms FROM follow_tb WHERE letter_collected = 'No' ";
    $result = mysqli_query($link, $query);
    $output .= '
    <br />
    <table style="text-transform: uppercase; font-weight:500;background:white;overflow:auto;" class="striped responsive-table">
    <tr>
        <th width="10%">Date</th>
        <th width="10%">First Name</th>
        <th width="10%">Last Name</th>
        <th width="10%">Phone</th>
        <th width="10%">Area</th>
        <th width="10%">Letter Prepared</th>
        <th width="10%">Letter Collected</th>
        <th width="10%">Call</th>
        <th width="10%">SMS</th>
        <th width="10%"></th>
    </tr>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '
    <tr>
        <td class="date">'.$row["mvpdate"].'</td>
        <td class="first_name">'.$row["firstname"].'</td>
        <td class="last_name">'.$row["lastname"].'</td>
        <td class="phone">'.$row["phone"].'</td>
        <td class="area">'.$row["area"].'</td>
        <td contentEditable="true" class="letter_prepared">'.$row["letter_prepared"].'</td>
        <td contentEditable="true" class="letter_collected">'.$row["letter_collected"].'</td>
        <td contentEditable="true" class="call">'.$row["called"].'</td>
        <td contentEditable="true" class="sms">'.$row["sms"].'</td>
        <td> </td>
    </tr>
    ';
    }
    $output .= '</table>';
    echo $output;
?>