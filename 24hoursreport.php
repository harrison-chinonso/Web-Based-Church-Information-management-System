<?php 
ob_start();
include 'includes/overall/overallworkheader.php';

$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

//include 'includes/workmenutop.php'; 
?>
<div id="workarea" class="col s12 ">
<div class="card-panel mainwork">
        <div style="width:95%" class="container">
        <a href="work.php"><i class=" fa fa-reply fa-2x"></i></a>
                <h5 align="center">24Hours MVP Report</h5>
                <table id="crud_table" style='text-transform: uppercase; font-weight:500;background:white;overflow:auto;' class='striped highlight responsive-table'>
                    
                        <tr>
                            <th width="15%">First Name</th>
                            <th width="15%">Last Name</th>
                            <th width="10%">Letter Recieved</th>
                            <th width="10%">Letter SentOut</th>
                            <th width="10%">Person Responsible</th>
                            <th width="10%">Person's Phone number</th>
                            <th width="10%">Cell Leader</th>
                            <th width="10%">Cell Jurisdiction</th>
                            <th width="5%"></th>
                        </tr>
                
                        <tr>
                            <td contentEditable='true' class='first_name'></td>
                            <td contentEditable='true' class='last_name'></td>
                            <td contentEditable='true' class='letter_recieved'></td>
                            <td contentEditable='true' class='letter_sentout'></td>
                            <td contentEditable='true' class='responsible'></td>
                            <td contentEditable='true' class='responsibleNO'></td>
                            <td contentEditable='true' class='cell_leader'></td>
                            <td contentEditable='true' class='cell'> </td>
                            <td></td>
                        </tr>
                </table>
                <div align="center" class="text-danger">
                    <p id="alert"></p>
                </div>
                <div align="right"> <button type="button" class="btn" id="add">+</button></div>
                <div align="center"> <button type="button" class="btn" id="save" name="save">Save</button></div>
    </div>
</div>
</div>
</section>


<?php 
include 'includes/script.php'; 
ob_end_flush();
?>
<script>
       $(document).ready(function(){
           var count = 1;
           var html_code;
    
          
           $(document).on('click', '#add', function(){
               count++;
               html_code += "<tr id='row"+count+"'>";
               html_code +="<td contentEditable='true' class='first_name'></td>";
               html_code +="<td contentEditable='true' class='last_name'></td>";
               html_code +="<td contentEditable='true' class='letter_recieved'></td>";
               html_code +="<td contentEditable='true' class='letter_sentout'></td>";
               html_code +="<td contentEditable='true' class='responsible'></td>";
               html_code +="<td contentEditable='true' class='responsibleNo'></td>";
               html_code +="<td contentEditable='true' class='cell_leader'></td>";
               html_code +="<td contentEditable='true' class='cel'> <?php $cell = getCell();?><select class='cell browser-default' name='cell' required><option value=''disabled selected>Cell</option><?php foreach ($cell as $option):?><option value='<?php echo $option->cellname;?>'><?php echo $option->cellname;?></option><?php endforeach;?></select></td>"; 
               html_code +="<td><button style='background:red'class='btn' id='remove' type='button' data-row='row"+count+"'><i class='fa fa-trash'></i></button></td>";
               html_code += "</tr>"

               $('#crud_table').append(html_code);
           });
           $(document).on('click', '#remove', function(){

               var delete_tr = $(this).data("row");
               $('#'+delete_tr).remove();
           });
           $(document).on('click','#save', function(){
               var first_name = [];
               var last_name = [];
               var letter_recieved = [];
               var letter_sentout = [];
               var responsible = [];
               var responsibleNo = [];
               var cell_leader = [];
               var cell = [];
                $('.first_name').each(function(){
                    first_name.push(
                        $(this).text());
                });
                $('.last_name').each(function(){
                    last_name.push(
                        $(this).text());
                });
                $('.letter_recieved').each(function(){
                    letter_recieved.push(
                        $(this).text());
                });
                $('.letter_sentout').each(function(){
                    letter_sentout.push(
                        $(this).text());
                });
                $('.responsible').each(function(){
                    responsible.push(
                        $(this).text());
                });
                $('.responsibleNo').each(function(){
                    responsibleNo.push(
                        $(this).text());
                });
                $('.cell_leader').each(function(){
                    cell_leader.push(
                        $(this).text());
                });
                $('.cell').each(function(){
                    cell.push(
                        $(this).text());
                });
                $.ajax({
                    url: "includes/insert.php",
                    type : "POST",
                    data:{first_name:first_name, last_name:last_name, letter_recieved:letter_recieved, letter_sentout:letter_sentout, responsible:responsible, responsibleNo:responsibleNo,cell_leader:cell_leader, cell:cell},
                    success: function(data){
                        alert(data);
                    $("td[contenteditable='true']").text("");
                    for (var i=2; i<= count; i++){
                        $('tr#'+i+'').remove();
                    }
                    fetch_item_data(); }
                });
               
           });
           function fetch_item_data(){
               $.ajax({
                   url:"includes/fetchhrs.php",
                   method: "POST",
                   success: function(data){
                       $('#crud_table').html(data);
                   }
               });
           }
           fetch_item_data();
       });
    </script>