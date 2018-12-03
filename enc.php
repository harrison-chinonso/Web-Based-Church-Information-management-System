<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];
include 'includes/discipleshiptopmenu.php';
?>
<div id="workarea" class="col s12 m8 l10 ">
<div class="card-panel mainwork">
        <div class="row">
            <h4 align="center">Dominion City Encounter Retreat (Dominion City Okota)</h4>
            <hr>
            <h6 align="center">Update Student's Record</h6>
                <form  method="post" id="insert_form">
                    <span id="error"></span>
                    <table id="dca_table" style="overflow:auto;text-transform: uppercase;background:white;overflow:auto;" class="striped responsive-table">
                    <tr>
                    <th  width="25%">First Name</th>
                    <th  width="25%">Last Name</th>
                    <th  width="25%">Reg. Number</th>
                    <th  width="20%">Date Of Attendance</th>
                    <th  width="5%"></th>
                    </tr>
                    </table>
                    <div align="right">
                    <button type="button" name="add" class="btn add"><span class="glyphicon glyphicon-plus">+</span></button>
                    </div>
                    <div align="center">
                    <input type="submit" name="submit" class="btn" value="Update" />
                    </div>
                </form>;
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
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="first_name[]" class="first_name" /></td>';
  html += '<td><input type="text" name="last_name[]" class="last_name" /></td>';
  html += '<td><input type="text" name="reg_no[]" class="reg_no" /></td>';
  html += "<td><input type='text' class= 'date' name='date[]' placeholder='format(Oct 10, 2018)' /></td>";
  html += '<td><button style="background:red" type="button" name="remove" class="btn remove"><i class="fa fa-trash"></i></button></td></tr>';
  $('#dca_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $(document).on('submit','#insert_form', function(event){
  event.preventDefault();
  var error = '';
  $('.first_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Student's First name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.last_name').each(function(){
  var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Student's Last name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.reg_no').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Student's Registration number at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.date').each(function(){
  var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Date at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
 
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"includes/insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    { 
      $('#dca_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success"> Details Saved</div>');
     }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
    </script>