<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php'; 
?>
<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
        <span class="black-text right" style='font-size:17px'> 
            <?php
            if(isset ($_GET['noteadded']) && empty($_GET['noteadded'])){
            echo 'You\'ve Successfully Added a note';
            }
            else if(isset ($_GET['noteerror']) && empty($_GET['noteadded'])){
                echo 'Sorry we couldn\'t successfully add your note. Try again';
            }
            else if(isset ($_GET['moved']) && empty($_GET['moved'])){
                echo 'You\'ve Successfully Moved a member to archive';
            }
            else if(isset ($_GET['errormove']) && empty($_GET['errormove'])){
                echo 'Sorry we couldn\'t successfully the member to archive. Try again';
            }
            ?>
        </span>
    <div id="new_register" class="new_register">
    <form id="viewperson" class="new_register-content" name="viewperson">
       <div class="container" style="font-size:18px">
        <h1 style="font-size:30px" id='newreg'>View A Member's Details</h1>
        <p style="font-size:20px" id="membernote">Search for a Member by:</p>
        <hr>   
        <div class="row">
          <div class=" worker input-field col m4 s12">
            <input type="text" onkeyup="showperson(this.value,this.name)" placeholder="First Name" name="fname">
          </div>
          <div class=" worker input-field col m4 s12">
            <input type="text" onkeyup="showperson(this.value,this.name)" placeholder="Last Name" name="lname">
          </div>
          <div class=" worker input-field col m4 s12">
            <input type="number" onkeyup="showperson(this.value,this.name)" placeholder="Phone Number" name="phone">
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
    <div class="col s3 m3"><button onclick="showperson(this.value,this.name);" name="noteview" style="font-size: 10px;padding:2px; margin:0px;" class="signup"> View NOTE</button></div>         
    <div class="col s4 m3"><button onclick="sendarc();" style=" font-size:10px;padding:2px; margin:0px;" name="arc" class="signup">Archive</button></div>                            
    <div class="col s2 m3"><a href="#!" style="font-size:10px;padding:2px; margin:0px;" onclick="document.getElementById('persondetail').style.display='none'"; class="modal-close waves-effect waves-green btn-flat">X</a></div> 
    </div>
</div>
</div>
</section>
<?php
include 'includes/script.php';
if($rol == "Administrator") { ?>
<script>
 $(document).on('blur', '.mem', function(){
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
        var basic      =$('#basic').text();
        var mat        =$('#mat').text();
        var dli        =$('#dli').text();
        var enc        =$('#enc').text();           
        var disciple   =$('#disciple').text();
        var dept       =$('#dept').text();
        var som        =$('#som').text();
    $.ajax({
    url: "includes/edit.php",
    type: "POST",
    data:{id:id,fullname:fullname,phone:phone,email:email,gender:gender,address:address,cell:cell,area:area,marital:marital,age:age,birthday:birthday,mvpdate:mvpdate,sec:sec,dept:dept,basic:basic,mat:mat,dli:dli,enc:enc,disciple:disciple,som:som},
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
function sendarc(){
    var div = document.getElementById('divid').innerHTML;
    window.location = "includes/archive.php?memarc="+div;
}

function showperson(value,name,id) {
    if (name ==="") {
        document.getElementById("txtHint").innerHTML = " ";
        document.getElementById("txtHint").style.display = "none";        
        return;
        } 
        document.getElementById("not").value = id;
        document.getElementById("notview").value = id;
          
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
            else if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && value == '') {
                document.getElementById("noteview").innerHTML = xmlhttp.responseText;
                 
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
            document.getElementById('noteview').style.display='block'; 
            document.getElementById('persondetail').style.display='none';
            var div = document.getElementById('divid').innerHTML;
        xmlhttp.open("GET","includes/archive.php?noteview="+div,true);  
        }
        xmlhttp.send();
    }
</script>