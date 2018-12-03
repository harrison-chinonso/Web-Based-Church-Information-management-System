
<?php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');
$connect = new PDO("mysql:host=localhost;dbname=dc_okota_db", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM newcell_tb ORDER BY cellname ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["cellname"].'">'.$row["cellname"].'</option>';
 }
 return $output;
}
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

 $outputreport = '';
    $queryreport = "SELECT firstname,lastname,letter_recieved, letter_sentout, person_responsible,person_responsible_phone, cell_leader FROM follow_tb WHERE area = '$area' AND letter_recieved = 'No' ";
    $resultreport = mysqli_query($link, $queryreport);
    $outputreport = '
    <br />
    <table style="text-transform: uppercase; font-weight:500;background:white;overflow:auto;" class="striped highlight responsive-table">
    <tr>
        <th width="15%">First Name</th>
        <th width="15%">Last Name</th>
        <th width="10%">Letter Recieved</th>
        <th width="10%">Letter SentOut</th>
        <th width="10%">Person Responsible</th>
        <th width="10%">Person\'s Phone number</th>
        <th width="10%">Cell Leader</th>
        <th width="10%">Cell Jurisdiction</th>
        <th width="5%"></th>
    </tr>
    ';
    while($rowreport = mysqli_fetch_array($resultreport))
    {
    $outputreport .= 
    '
    <tr>
    <td class="first_name">'.$rowreport["firstname"].'</td>
    <td class="last_name">'.$rowreport["lastname"].'</td>
    <td contentEditable="true" class="letter_recieved">'.$rowreport["letter_recieved"].'</td>
    <td contentEditable="true" class="letter_sentout">'.$rowreport["letter_sentout"].'</td>
    <td contentEditable="true" class="responsible">'.$rowreport["person_responsible"].'</td>
    <td contentEditable="true" class="responsibleNo">'.$rowreport["person_responsible_phone"].'</td>
    <td contentEditable="true" class="cell_leader">'.$rowreport["cell_leader"].'</td>
    <td contentEditable="true" class="cell"></td>
    <td> </td>
    </tr>
    ';
    }
    $outputreport .= '</table>';
    echo $outputreport;
    ?>