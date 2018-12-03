<?php  
include 'includes/overall/overallworkheader.php';
include 'includes/workmenutop.php';
$month = ['January','February','March','April','May','June','July','August','September','October','November','December']; 
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
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && id == undefined ) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText; 
            }
            else if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && value == undefined ) {
                document.getElementById("person_details").innerHTML = xmlhttp.responseText; 
            }
        };
        if (name === "cellreport"){
        xmlhttp.open("GET","includes/loadTable.php?cellreport="+document.viewperson.cellreport.value,true);          
        }
        else if (name === "day"){
        xmlhttp.open("GET","includes/loadTable.php?day="+document.viewperson.day.value,true);          
        }
        else if (name === "month"){
        xmlhttp.open("GET","includes/loadTable.php?month="+document.viewperson.month.value,true);          
        }
        else if (name === "monthyear"){
        xmlhttp.open("GET","includes/loadTable.php?monthyear="+document.viewperson.monthyear.value,true);          
        }
        else if (name === "year"){
        xmlhttp.open("GET","includes/loadTable.php?year="+document.viewperson.year.value,true);          
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
        <h1 style="font-size:30px" id='newreg'>View All Cell Reports</h1>
        <p style="font-size:20px" id="membernote">Search for all Cell Reports by:</p>
        <hr>
        <div class="row">
            <div class="worker input-field col m3 s12">
              <div class="row">
                    <div style="margin-top:25px" class="worker input-field col m12 s12">
                            <button onclick ="showperson(this.value,this.name)" value="all" name="cellreport" class="all">All</button>
                    </div>
                    <div style="margin-top:50px" class="col m12 s12">
                            <input type="text" onchange="showperson(this.value,this.name)" class="datepicker" name="day" placeholder="Date Of Cell Report">
                    </div>
                    <div style="margin-top:50px" class=" worker input-field col s12">
                        <select  onchange="showperson(this.value,this.name)" class="browser-default" name="month" >
                        <option value=""disabled selected>Month Of Report</option>
                        <?php foreach ($month as $option): ?>
                        <option value="<?php echo $option?>"><?php echo $option?></option>
                        <?php endforeach;?> 
                        </select> 
                  </div>
                  <div style="margin-top:50px" class="col m12 s12">
                            <label for="1stmonth">Month and Year Of Of Report</label>
                            <input type="month" onchange="showperson(this.value,this.name)"  name="monthyear" placeholder="Month and Year Of Cell Report">
                  </div>
                  <div style="margin-top:50px" class="col m12 s12">     
                            <input type="number" onkeyup="showperson(this.value,this.name)"  name="year" placeholder="Year Of Cell Report">
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
