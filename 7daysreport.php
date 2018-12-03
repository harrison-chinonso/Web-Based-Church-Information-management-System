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
<div id="workarea" class="col s12">
<div class="card-panel mainwork">
        <div style="width:95%" class="container">
        <a href="work.php"><i class=" fa fa-reply fa-2x"></i></a>
                <h4 align="center">7 Days MVP Report</h4>
                <table id="crud_table" style='text-transform: uppercase; font-weight:500;background:white;overflow:auto;' class='striped responsive-table'>
                    
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
                
                        <tr>
                            <td contentEditable='true' class='first_name'></td>
                            <td contentEditable='true' class='last_name'></td>
                            <td contentEditable='true' class='letter_deliver'></td>
                            <td contentEditable='true' class='date_deliver'><input type="text" class="datepicker" name="date_deliver" placeholder=""></td>
                            <td contentEditable='true' class='signed'></td>
                            <td contentEditable='true' class='visited'></td>
                            <td contentEditable='true' class='date_visited'><input type="text" class="datepicker" name="date_visited" placeholder=""></td>
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
       
            function fetch_item_data(){
               $.ajax({
                   url:"includes/fetchdays.php",
                   type : "POST",
                   success: function(data){
                       $('#crud_table').html(data);
                   }
               });
           }
           
           $(document).on('click', '#add', function(){
               count++;
               html_code +="<tr id='row"+count+"'>";
               html_code +="<td contentEditable='true' class='first_name'></td>";
               html_code +="<td contentEditable='true' class='last_name'></td>";
               html_code +="<td contentEditable='true' class='letter_deliver'></td>";
               html_code +="<td contentEditable='true' class='date_deliver'><input type='text' class='datepicker' name='date_deliver' placeholder=''></td>";
               html_code +="<td contentEditable='true' class='signed'></td>";
               html_code +="<td contentEditable='true' class='visited'></td>";
               html_code +="<td contentEditable='true' class='date_visited'><input type='text' class='datepicker' name='date_visited' placeholder=''></td>";
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
               var letter_deliver = [];
               var date_deliver = [];
               var signed = [];
               var visited = [];
               var date_visited = [];
                $('.first_name').each(function(){
                    first_name.push(
                        $(this).text());
                });
                $('.last_name').each(function(){
                    last_name.push(
                        $(this).text());
                });
                $('.letter_deliver').each(function(){
                    letter_deliver.push(
                        $(this).text());
                });
                $('.date_deliver').each(function(){
                    date_deliver.push(
                        $(this).text());
                });
                $('.signed').each(function(){
                    signed.push(
                        $(this).text());
                });
                $('.visited').each(function(){
                    visited.push(
                        $(this).text());
                });
                $('.date_visited').each(function(){
                    date_visited.push(
                        $(this).text());
                });
                $.ajax({
                    url: "includes/insert.php",
                    method:"POST",
                    data:{first_name:first_name, last_name:last_name, letter_deliver:letter_deliver, date_deliver:date_deliver, signed:signed, visited:visited, date_visited:date_visited},
                    success: function(data){
                        alert(data);
                    $("td[contenteditable='true']").text("");
                    for (var i=2; i<= count; i++){
                        $('tr#'+i+'').remove();
                    }
                    fetch_item_data(); }
                });
               
           });
           
           fetch_item_data();
    });
    </script>