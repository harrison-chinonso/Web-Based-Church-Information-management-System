<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php'; 
?>

<script type="text/javascript">
function showperson(value,name,id) {
    event.preventDefault();
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
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && id == undefined) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
            else if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && value == undefined ) {
                document.getElementById("person_details").innerHTML = xmlhttp.responseText; 
            }
        };
        if (name === "gender"){
        xmlhttp.open("GET","includes/loadTable.php?gender="+document.viewperson.gender.value,true);
        }
        else if (name === "marital"){
        xmlhttp.open("GET","includes/loadTable.php?marital="+document.viewperson.marital.value,true);          
        }
        else if (name === "newbeliever"){
        xmlhttp.open("GET","includes/loadTable.php?newbeliever="+document.viewperson.newbeliever.value,true);          
        }
        else if (name === "stday"){
        xmlhttp.open("GET","includes/loadTable.php?stday="+document.viewperson.stday.value,true);          
        }
        else if (name === "stmonth"){
        xmlhttp.open("GET","includes/loadTable.php?stmonth="+document.viewperson.stmonth.value,true);          
        }
        else if (name === "styear"){
        xmlhttp.open("GET","includes/loadTable.php?styear="+document.viewperson.styear.value,true);          
        }
        else if (name === 'view'){
        document.getElementById("modaldetails").style.display = "block";    
        xmlhttp.open("GET","includes/fetch.php?id="+id,true);    
        }
        xmlhttp.send();
    }
</script>

<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
    <div id="new_register" class="new_register">
    <form id="viewperson" class="new_register-content" name="viewperson">
       <div class="container" style="font-size:18px">
        <h1 style="font-size:30px" id='newreg'>View All New Believers</h1>
        <p style="font-size:20px" id="membernote">Search for all New Believers by:</p>
        <hr>
        <div class="row">
            <div class="worker input-field col m3 s12">
              <div class="row">
                    <div style="margin-top:17px" class="worker input-field col m12 s12">
                            <button onclick ="showperson(this.value,this.name)" value="all" name="newbeliever" class="all">All</button>
                    </div>

                    <div style="margin-top:35px" class=" worker input-field col m12 s12">
                    <select onchange="showperson(this.value,this.name)" class="browser-default" name="gender">
                            <option value="" disabled selected>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            </select>
                    </div>
                    <div style="margin-top:35px" class=" worker input-field col m12 s12">
                    <select onchange="showperson(this.value,this.name)" class="browser-default" name="marital">
                            <option value="" disabled selected>Marital Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="separated">Separated</option>
                            </select>
                    </div>
                    <div style="margin-top:35px" class="col m12 s12">
                            <input type="text" onchange="showperson(this.value,this.name)" class="datepicker" name="stday" placeholder="Date Of Decision">
                    </div>
                    <div style="margin-top:35px" class="col m12 s12">
                            <label for="1stmonth">Month and Year Of Decision</label>
                            <input type="month" onchange="showperson(this.value,this.name)"  name="stmonth" placeholder="Enter Month and Year">
                    </div>
                    <div style="margin-top:35px" class="col m12 s12">     
                            <input type="number" onkeyup="showperson(this.value,this.name)"  name="styear" placeholder="Year Of Decision">
                    </div>
              </div>
            </div>
            <div class="worker input-field col m9 s12">
            <div id="txtHint"></div> 
            </div>
      </div>
    </form>
  </div>
  </div>
</div>
</section>
<?php
include 'includes/modal.php';
include 'includes/script.php'; ?>   
