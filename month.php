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
                <h4 align="center">Monthly Area MVP Report</h4>
                <table id="crud_table" style='text-transform: uppercase; font-weight:500;background:white;overflow:auto;' class='striped responsive-table'>
                    
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
                
                        <tr>
                            <td contentEditable='true' class='first_name'></td>
                            <td contentEditable='true' class='last_name'></td>
                            <td contentEditable='true' class='sectime'></td>
                            <td contentEditable='true' class='enc'></td>
                            <td contentEditable='true' class='cell'></td>
                            <td contentEditable='true' class='dcabasic'></td>
                            <td contentEditable='true' class='mat'></td>
                            <td contentEditable='true' class='dept'></td>
                            <td contentEditable='true' class='disciple'></td>
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
                   url:"includes/fetchmonths.php",
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
               html_code +="<td contentEditable='true' class='sectime'></td>";
               html_code +="<td contentEditable='true' class='enc'></td>";
               html_code +="<td contentEditable='true' class='cell'></td>";
               html_code +="<td contentEditable='true' class='dcabasic'></td>";
               html_code +="<td contentEditable='true' class='mat'></td>";
               html_code +="<td contentEditable='true' class='dept'></td>";
               html_code +="<td contentEditable='true' class='disciple'></td>";
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
               var sectime = [];
               var enc = [];
               var cell = [];
               var dcabasic = [];
               var mat = [];
               var dept = [];
               var disciple = [];
                $('.first_name').each(function(){
                    first_name.push(
                        $(this).text());
                });
                $('.last_name').each(function(){
                    last_name.push(
                        $(this).text());
                });
                $('.sectime').each(function(){
                 sectime.push(
                        $(this).text());
                });
                $('.enc').each(function(){
                    enc.push(
                        $(this).text());
                });
                $('.cell').each(function(){
                    cell.push(
                        $(this).text());
                });
                $('.dcabasic').each(function(){
                    dcabasic.push(
                        $(this).text());
                });
                $('.mat').each(function(){
                    mat.push(
                        $(this).text());
                });
                $('.dept').each(function(){
                    dept.push(
                        $(this).text());
                });
                $('.disciple').each(function(){
                    disciple.push(
                        $(this).text());
                });
                $.ajax({
                    url: "includes/insert.php",
                    method:"POST",
                    data:{first_name:first_name,last_name:last_name,sectime:sectime,enc:enc,cell:cell,dcabasic:dcabasic,mat:mat,dept:dept, disciple:disciple},
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