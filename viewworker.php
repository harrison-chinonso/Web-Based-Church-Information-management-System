<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php'; 
?>
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
        document.getElementById("modaldetails").style.display = "block";    
        xmlhttp.open("GET","includes/fetch.php?id="+id,true);    
        }
        else if (name === 'arc'){ 
            var divid = document.getElementById('divid').innerHTML;   
        xmlhttp.open("GET","includes/archive.php?id="+divid+name,true);    
        }
        xmlhttp.send();
    }
  
</script>

<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
    <div id="new_register" class="new_register">
    <form id="viewperson" class="new_register-content" name="viewperson">
       <div class="container" style="font-size:18px">
        <h1 style="font-size:30px" id='newreg'>View A Worker's Details</h1>
        <p style="font-size:20px" id="membernote">Search for a Worker by:</p>
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
  </div>
  </div>
</div>
</section>
<?php
include 'includes/modal.php';
include 'includes/script.php';
?>