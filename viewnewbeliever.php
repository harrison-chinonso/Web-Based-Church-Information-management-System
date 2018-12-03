<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php'; 
?>
<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
    <div id="new_register" class="new_register">
    <form id="viewperson" class="new_register-content" name="viewperson">
       <div class="container" style="font-size:18px">
        <h1 style="font-size:30px" id='newreg'>View A New Believer's Details</h1>
        <p style="font-size:20px" id="membernote">Search for a New Believer using his/her Firstname, Lastname or Phone Number</p>
        <hr>   
        <div class="row">
          <div class=" worker input-field col m4 s12">
            <input type="text" onkeyup="showperson(this.value,this.name)" placeholder="Enter First Name" name="fname">
          </div>
          <div class=" worker input-field col m4 s12">
            <input type="text" onkeyup="showperson(this.value,this.name)" placeholder="Enter Last Name" name="lname">
          </div>
          <div class=" worker input-field col m4 s12">
            <input type="number" onkeyup="showperson(this.value,this.name)" placeholder="Enter Phone Number" name="phone">
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
    <div class="col s12"><button href="#!" style="font-size:10px;padding:2px; margin:0px;" onclick="document.getElementById('persondetail').style.display='none'"; class="signup modal-close waves-effect waves-green btn-flat">CLOSE</button></div> 
    </div>
</div>
</div>
</section>
<?php
include 'includes/script.php';
if($rol == "Administrator") { ?>
<script>
 $(document).on('blur', '.believe', function(){
        var id = document.getElementById('divid').innerHTML;
        var fullname   = $('#name').text();
        var phone      =$('#phone').text();
        var email      =$('#email').text();
        var gender     =$('#gender').text();
        var address    =$('#address').text();
        var cell       =$('#cell').text();
        var area       =$('#area').text();
        var marital    =$('#marital').text();
        var decision   =$('#decision').text();
        var birthday   =$('#birthday').text();           
        var mvpdate    =$('#mvpdate').text();
        var sec        =$('#2nd').text();
    $.ajax({
    url: "includes/edit.php",
    type: "POST",
    data:{id:id,fullname:fullname,phone:phone,email:email,gender:gender,address:address,cell:cell,area:area,marital:marital,decision:decision,birthday:birthday,mvpdate:mvpdate,sec:sec},
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
        if (name === "phone"){
        xmlhttp.open("GET","includes/loadTable.php?phone="+document.viewperson.phone.value,true);
        }
        else if (name === "lname"){
        xmlhttp.open("GET","includes/loadTable.php?lname="+document.viewperson.lname.value,true);          
        }
        else if (name === "fname"){
        xmlhttp.open("GET","includes/loadTable.php?fname="+document.viewperson.fname.value,true);          
        }
        else if (name === 'view'){
        document.getElementById("persondetail").style.display = "block";    
        xmlhttp.open("GET","includes/fetch.php?id="+id,true);    
        }
        xmlhttp.send();
    }
  
</script>