<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');

$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

    $output = '';
    $query = "SELECT firstname,lastname,letter_delievered, date_of_delievery, sign_copy_returned, visited,date_of_visit FROM follow_tb WHERE area = '$area' AND sign_copy_returned = 'No' ";
    $result = mysqli_query($link, $query);
    $output = '
    <br />
    <table style="text-transform: uppercase; font-weight:500;background:white;overflow:auto;" class="striped responsive-table">
    <tr>
        <th width="15%">First Name</th>
        <th width="15%">Last Name</th>
        <th width="10%">Letter Delivered</th>
        <th width="15%">Date Of Delievery</th>
        <th width="10%">Signed Copy Returned</th>
        <th width="10%">Visited</th>
        <th width="15%">Date Of Visit</th>
        <th width="10%"></th>
    </tr>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '
    <tr>
    <td class="first_name">'.$row["firstname"].'</td>
    <td class="last_name">'.$row["lastname"].'</td>
    <td contentEditable="true" class="letter_deliver">'.$row["letter_delievered"].'</td>
    <td contentEditable="true" class="date_deliver">'.$row["date_of_delievery"].'</td>
    <td contentEditable="true" class="signed">'.$row["sign_copy_returned"].'</td>
    <td contentEditable="true" class="visited">'.$row["visited"].'</td>
    <td contentEditable="true" class="date_visited">'.$row["date_of_visit"].'</td>
    <td> </td>
    </tr>
    ';
    }
    $output .= '</table>';
    echo $output;


?>