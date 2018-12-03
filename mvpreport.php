<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];
include 'includes/script.php'; 
?>
<script>
       $(document).ready(function(){
           var count = 1; var html_code;
           
           $(document).on('click','#addpage', function(){
               count++;
               html_code += "<tr id='row"+count+"'>";
               html_code +="<td  class='date'></td>";
               html_code +="<td  class='first_name'></td>";
               html_code +="<td  class='last_name'></td>";
               html_code +="<td  class='phone'></td>";
               html_code +="<td  class='area'></td>";
               html_code +="<td contentEditable='true' class='letter_prepared'></td>";
               html_code +="<td contentEditable='true' class='letter_collected'></td>";
               html_code +="<td contentEditable='true' class='call'></td>";
               html_code +="<td contentEditable='true' class='sms'></td>";
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
               var area = [];
               var letter_prepared = [];
               var letter_collected = [];
               var call = [];
               var sms = [];

                $('.first_name').each(function(){
                    first_name.push(
                        $(this).text());
                });
                $('.last_name').each(function(){
                    last_name.push(
                        $(this).text());
                });
                $('.area').each(function(){
                    area.push(
                        $(this).text());
                });
                $('.letter_prepared').each(function(){
                    letter_prepared.push(
                        $(this).text());
                });
                $('.letter_collected').each(function(){
                    letter_collected.push(
                        $(this).text());
                });
                $('.call').each(function(){
                    call.push(
                        $(this).text());
                });
                $('.sms').each(function(){
                    sms.push(
                        $(this).text());
                });
                $.ajax({
                    url: "includes/insert.php",
                    type : "POST",
                    data:{first_name:first_name, last_name:last_name,area:area, letter_prepared:letter_prepared, letter_collected:letter_collected, call:call, sms:sms},
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
                   url:"includes/fetchmvp.php",
                   method: "POST",
                   success: function(data){
                       $('#crud_table').html(data);
                   }
               })
           }
fetch_item_data();
       });
    </script>

<div id="workarea" class="col s12 ">
<div class="card-panel mainwork">
        <div style="width:95%" class="container">
            <a href="work.php"><i class=" fa fa-reply fa-2x"></i></a>
                <h4 align="center">MVP Report</h4>
                <table id="crud_table" style='text-transform: uppercase; font-weight:500;background:white;overflow:auto;' class='striped responsive-table'>
                    
                        <tr>
                            <th width="15%">Date</th>
                            <th width="10%">First Name</th>
                            <th width="10%">Last Name</th>
                            <th width="10%">Phone</th>
                            <th width="10%">Area</th>
                            <th width="10%">Letter Prepared</th>
                            <th width="10%">Letter Collected</th>
                            <th width="10%">Call</th>
                            <th width="10%">SMS</th>
                            <th width="5%"></th>
                        </tr>
                        <tr>
                            <td class='date'></td>
                            <td class='first_name'></td>
                            <td class='last_name'></td>
                            <td class='phone'></td>
                            <td class='area'></td>
                            <td contenteditable='true' class='letter_prepared'></td>
                            <td contenteditable='true' class='letter_collected'></td>
                            <td contenteditable='true' class='call'></td>
                            <td contenteditable='true' class='sms'></td>
                            <td></td>
                        </tr>
                </table>
                <div align="center">
                    <p id="alert"></p>
                </div>
                <div align="right"> <button type="button" class="btn" id="addpage">+</button></div>
                <div align="center"> <button type="button" class="btn" id="save" name="save">Save</button></div>
    </div>
</div>
</div>
</section>
<?php 
ob_end_flush();
?>