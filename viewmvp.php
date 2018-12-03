<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php'; 
$id = $_SESSION['id'];
$namearray = referal($id);
$rol = $namearray[1];
?>

<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
         <span class="black-text right" style='font-size:17px'> 
        <?php
        if(isset ($_GET['noteadded']) && empty($_GET['noteadded'])){
        echo 'You\'ve Successfully Added a note';
        }
        else if(isset ($_GET['noteerror']) && empty($_GET['noteerror'])){
            echo 'Sorry we couldn\'t successfully add your note. Try again';
        }
        else if(isset ($_GET['made']) && empty($_GET['made'])){
            echo 'You\'ve Successfully made a member';
        }
        else if(isset ($_GET['error']) && empty($_GET['error'])){
            echo 'Sorry we couldn\'t successfully carryout your request. Please Try again';
        }
        ?>
        </span>
    <div id="new_register" class="new_register">
    <form id="viewperson" class="new_register-content" name="viewperson">
       <div class="container" style="font-size:18px">
        <h1 style="font-size:30px" id='newreg'>View An MVP's Details</h1>
        <p style="font-size:20px" id="membernote">Search for an MVP using his/her Firstname, Lastname or Phone Number</p>
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
    <form action="includes/archive.php" method="post">
    <div id="note" class="input-field col s12"  style="display:none">
        <input type="text"  name="note" style="height:100px" placeholder="Write a follow up note on this member....">
        <input id="not" name="noteid" style="display:none"> 
        <input type="submit" value="Submit" class="btn large blue">
    </div> 
    </form>
    <form action="includes/archive.php" id="viewnote" name="viewnote">
        <div id="noteview" class="input-field col s12"  style="display:none">
            <input type="text"  name="noteview" style="height:100px" placeholder=" ">
            <input id="notview" name="noteviewid" style="display:none"> 
        </div>
    </form>
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
    <div class="col s3 m3"><button style="font-size: 10px; padding:2px; margin:0px;" onclick="document.getElementById('note').style.display='block'; document.getElementById('persondetail').style.display='none';" class="signup"> Make NOTE</button></div>                
    <div class="col s4 m3"><button onclick="showperson(this.value,this.name,this.id);" style=" font-size: 10px;padding:2px; margin:0px;" id ="mem" name="makemem" class="signup">Make Member</button></div>
    <div class="col s3 m3"><button onclick="showperson(this.value,this.name);" name="noteview" style="font-size: 10px;padding:2px; margin:0px;" class="signup"> View NOTE</button></div>                                     
    <div class="col s2 m3"><a href="#!" style="font-size:10px;padding:2px; margin:0px;" onclick="document.getElementById('persondetail').style.display='none'"; class="modal-close waves-effect waves-green btn-flat">X</a></div> 
    </div>
</div>
</div>
</section>
<?php
include 'includes/script.php';
if($rol == "Administrator" || $rol == "Mvp Personnel") { ?>
<script>
 $(document).on('blur', '.mvp', function(){
        var id = document.getElementById('divid').innerHTML;
        var fullname   = $('#name').text();
        var phone      =$('#phone').text();
        var email      =$('#email').text();
        var gender     =$('#gender').text();
        var address    =$('#address').text();
        var cell       =$('#cell').text();
        var area       =$('#area').text();
        var marital    =$('#marital').text();
        var age        =$('#age').text();
        var birthday   =$('#birthday').text();           
        var mvpdate    =$('#mvpdate').text();
        var sec        =$('#2nd').text();
        var third      =$('#3rd').text();
    $.ajax({
    url: "includes/edit.php",
    type: "POST",
    data:{id:id,fullname:fullname,phone:phone,email:email,gender:gender,address:address,cell:cell,area:area,marital:marital,age:age,birthday:birthday,mvpdate:mvpdate,sec:sec,third:third},
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
 <script>
  function showperson(value,name,id) {
        if (name ==="") {
            document.getElementById("txtHint").innerHTML = " ";
            document.getElementById("txtHint").style.display = "none";        
            return;
            }  
            document.getElementById("not").value = id;  
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
            else if (name === 'noteview'){  
                document.getElementById('persondetail').style.display='none';
                var div = document.getElementById('divid').innerHTML;
            xmlhttp.open("GET","includes/archive.php?noteview="+div,true);  
            }
            else if (name === 'makemem'){  
                var div = document.getElementById('divid').innerHTML;
            xmlhttp.open("GET","includes/archive.php?makemem="+div,true);  
            }
            xmlhttp.send();
        }
    
</script>