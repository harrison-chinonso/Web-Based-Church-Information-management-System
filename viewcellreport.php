<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php'; 
?>
<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
    <div id="new_register" class="new_register">
    <form id="viewperson" class="new_register-content" name="viewperson">
       <div class="container" style="font-size:18px">
        <h1 style="font-size:30px" id='newreg'>View A Cell Report Details</h1>
        <p style="font-size:20px" id="membernote">Search for a Cell Report using the report date</p>
        <hr>   
        <div class="row">
          <div class=" worker input-field col m4 s12">
            <input type="text" class="datepicker" onchange="showperson(this.value,this.name)" placeholder="Select a Report Date" name="date">
          </div>
        </div>
        </div>
    </form>
    <br>
    <div id="txtHint"></div> 
  </div>
  </div>
</div>
<div id="persondetail" class="modal modal-fixed-footer">
<div class="modal-content">
    <div class="modal-header">
        <a style="font-size:20px; font-weight:bolder" href="#!" onclick="document.getElementById('persondetail').style.display='none'"; class="modal-close waves-effect waves-green btn-flat right">&times;</a>        
        <h4 class="modal-title">Personal Details</h4>
    </div>
    <div id="alert"></div>
    <div class="modal-body" id="person_details">

    </div>
</div>
<div class="modal-footer">
    <div class="row">
    <div class="col s12"><button style="font-size:10px;padding:2px; margin:0px;" onclick="document.getElementById('persondetail').style.display='none'"; class="signup modal-close waves-effect waves-green btn-flat">CLOSE</button></div> 
    </div>
</div>
</div>
</section>
<?php
include 'includes/script.php';
if($rol == "Administrator" || $rol == "Cell Leader" || $rol == "Area Cordinator") { ?>
<script>
 $(document).on('blur', '.cell', function(){
        var id = document.getElementById('divid').innerHTML;
        var reportdate     = $('#reportdate').text();
        var name_of_cell   = $('#name_of_cell').text();
        var cellleader     =$('#cellleader').text();
        var target         =$('#target').text();
        var cellpop        =$('#cellpop').text();
        var start          =$('#start').text();
        var end            =$('#end').text();
        var cellattend     =$('#cellattend').text();
        var sundayattend   =$('#sundayattend').text();
        var sectimer       =$('#2ndtimer').text();
        var churchmvp      =$('#churchmvp').text();
        var cellmvp        =$('#cellmvp').text();           
        var offering       =$('#offering').text();
        var dcabasic       =$('#dcabasic').text();
        var mat            =$('#mat').text();
        var enc            =$('#enc').text();
        var dli            =$('#dli').text();           
        var visit          =$('#visit').text();
        var cellperson     =$('#cellperson').text();
    $.ajax({
    url: "includes/edit.php",
    type: "POST",
    data:{dcabasic:dcabasic,mat:mat,enc:enc,dli:dli,visit:visit,cellperson:cellperson,id:id,reportdate:reportdate,name_of_cell:name_of_cell,cellleader:cellleader,target:target,cellpop:cellpop,start:start,end:end,cellattend:cellattend,sundayattend:sundayattend,sectimer:sectimer,churchmvp:churchmvp,cellmvp:cellmvp,offering:offering},
    success:function(response)
    {
     $('#alert').fadeIn().html(response);
     setTimeout(function(){
         ('#alert').slideUp(2000)
     },3000);
    }

   });
 });
 </script>
 <?php }?>
<script type="text/javascript">
function showperson(value,name,id) {
    if (name ==="") {
        document.getElementById("txtHint").innerHTML = " ";
        document.getElementById("txtHint").style.display = "none";        
        return;
        }   
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && id == undefined ) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText; 
            }
            else if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && value == undefined ) {
                document.getElementById("person_details").innerHTML = xmlhttp.responseText; 
            }
        };
        if(name === 'date'){
        xmlhttp.open("GET","includes/loadTable.php?date="+document.viewperson.date.value,true);
        }
        else if (name === 'view'){
        document.getElementById("persondetail").style.display = "block";    
        xmlhttp.open("GET","includes/fetch.php?id="+id,true);    
        }
        xmlhttp.send();
    }
  
</script>