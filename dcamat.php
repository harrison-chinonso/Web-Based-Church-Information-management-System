<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];
include 'includes/discipleshiptopmenu.php';

$link = new PDO("mysql:host=localhost;dbname=dc_okota_db", "root", "");
function fill_unit_select_box($link)
{ 
 $output = '';
 $query = "SELECT * FROM course_tb ORDER BY dcamaturity ASC";
 $statement = $link->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $course = $row["dcamaturity"];
  $val = (substr($course, 0,strpos($course,':')));
  $coursevalue = str_replace(" ","_",$val);
  $output .= '<option value="'. $coursevalue.'">'. $course.'</option>';
 }
 return $output;
}
?>
<div id="workarea" class="col s12 m8 l10 ">
<div class="card-panel mainwork">
        <div class="row">
            <h4 align="center">Dominion City Academy (Maturity)</h4>
            <hr>
            <div class="col m3 s5">
                <button id="scoresheet" class="signup">Update Score Sheet</button>
            </div>
            <div class="col m3 s5">
                <button id="viewscore" class="signup">View Score Sheet</button>
            </div>
        </div> 
        <div class="col s12">
            <div id="scoretable"></div>
            <p id='alert'></p>
        </div>           
</div>
</div>
<div id="persondetail" class="modal modal-fixed-footer">
<div class="modal-content">
    <div class="modal-header">
        <a style="font-size:20px; font-weight:bolder" href="#!" class="modal-close waves-effect waves-green btn-flat right">&times;</a>        
        <h4 class="modal-title">Score Sheet</h4>
    </div>
    <div class="modal-body" id="person_details">

    </div>
</div>
<div class="modal-footer">
  <a href="#!" class="modal-close waves-effect waves-green btn-flat">CLOSE</a>
</div>
</div>
</section>
<?php 
include 'includes/script.php'; 
ob_end_flush();
?>

 <script>
       $(document).ready(function(){
           
$(document).on('click', '#scoresheet', function(){
 var sheet = "";
   sheet += '<h6 align="center">Enter Student\'s Credentials</h6>'
   sheet += '<form style="" method="post" id="insert_form">'
   sheet += '<span id="error"></span>'
   sheet += '<table id="dca_table" style="text-transform: uppercase;background:white;overflow:auto;" class="striped responsive-table">'
   sheet += '<tr>'
   sheet += '<th  width="15%">First Name</th>'
   sheet += '<th  width="15%">Last Name</th>'
   sheet += '<th  width="15%">Reg. Number</th>'
   sheet += '<th  width="40%">Select Course</th>'
   sheet += '<th  width="15%">Score(%)</th>'
   sheet += '</tr>'
   sheet += '</table>'
   sheet += '<div align="right">'
   sheet += '<button type="button" name="add" class="btn add"><span class="glyphicon glyphicon-plus">+</span></button>'
   sheet += '</div>'
   sheet += '<div align="center">'
   sheet += '<input type="submit" name="submit" class="btn" value="Insert" />'
   sheet += '</div>'
   sheet += ' </form>';
 $('#scoretable').html(sheet);
 });

$(document).on('click', '#viewscore', function(){
    var word='dcamaturity';
    $.ajax({
    url:"includes/loadtable.php",
    method:"POST",
    data:{word:word},
    success:function(data)
    {
     $('#scoretable').html(data);
    }
   });
 });

 $(document).on('click', '.grad', function(){
    var id = $(this).attr('id');
    $.ajax({
    url:"includes/loadtable.php",
    method:"POST",
    data:{id:id},
    success:function(data)
    {
     $('#persondetail').remove();
     $('#scoretable').html(data);
    }
   });
 });

 $(document).on('click', '.detail', function(){
    var id = $(this).attr('id');
    $.ajax({
    url:"includes/fetch.php",
    method:"POST",
    data:{id:id},
    success:function(data)
    {
     $('#person_details').html(data);
    }
   });  
 });

 $(document).on('blur', '#gradtable', function(){
    var maturity = $('.count').attr('id');
    var graddate = $('.date').val();
    var followup = $('.follow').val();
    var responsibility = $('.responsibility').val();
    $.ajax({
    url:"includes/insert.php",
    method:"POST",
    data:{maturity:maturity,graddate:graddate,followup:followup,responsibility:responsibility},
    success:function(data)
    {
     $('#alert').html(data);
    }
   });
 });

 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="first_name[]" class="first_name" /></td>';
  html += '<td><input type="text" name="last_name[]" class="last_name" /></td>';
  html += '<td><input type="text" name="reg_no[]" class="reg_no" /></td>';
  html += '<td><select name="course[]" class="browser-default course"><option value="">Select Unit</option><?php echo fill_unit_select_box($link); ?></select></td>';
  html += '<td><input type="text" name="score[]" class="score" /></td>';
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

  $('.course').each(function(){
  var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Course at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.score').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Student's Score at "+count+" Row</p>";
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
      $('#error').html('<div>Details Saved</div>');
     }
   });
  }
  else
  {
   $('#error').html('<div>'+error+'</div>');
  }
 });
 
});
    </script>