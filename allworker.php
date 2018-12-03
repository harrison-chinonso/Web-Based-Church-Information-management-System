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
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && id == undefined && id == undefined) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
            else if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && value == undefined ) {
                document.getElementById("person_details").innerHTML = xmlhttp.responseText; 
            }
        };
        if (name === "gender"){
        xmlhttp.open("GET","includes/loadTable.php?gender="+document.viewperson.gender.value,true);
        }
        else if (name === "dept"){
        xmlhttp.open("GET","includes/loadTable.php?dept="+document.viewperson.dept.value,true);          
        }
        else if (name === "area"){
        xmlhttp.open("GET","includes/loadTable.php?area="+document.viewperson.area.value,true);          
        }
        else if (name === "worker"){
        xmlhttp.open("GET","includes/loadTable.php?worker="+document.viewperson.worker.value,true);          
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
        <h1 style="font-size:30px" id='newreg'>View All Workers</h1>
        <p style="font-size:20px" id="membernote">Search for all Workers by:</p>
        <hr>   
        <div class="row">
          <div class=" worker input-field col m3 s12">
          <select onchange="showperson(this.value,this.name)" class="browser-default" name="gender">
            <option value="" disabled selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            </select>
          </div>
          <div class=" worker input-field col m3 s12">
            <?php $dept = getdept();?>
            <select onchange="showperson(this.value,this.name)" class="browser-default" name="dept" >
            <option value=""disabled selected>Department</option>
            <?php foreach ($dept as $option): ?>
            <option value="<?php echo $option->dept;?>"><?php echo $option->dept;?></option>
            <?php endforeach;?> 
            </select>     
          </div> 
          <div class="input-field col m3 s12">
            <?php $area = getarea();?>
            <select  onchange="showperson(this.value,this.name)" class="browser-default" name="area" required>
            <option value=""disabled selected>Area</option>
            <?php foreach ($area as $option): ?>
            <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
            <?php endforeach;?> 
            </select>  
            </div> 
            <div class="worker input-field col m3 s12">
              <button onclick="showperson(this.value,this.name)" value="all" name="worker" class="all">All</button>
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
include 'includes/script.php'; ?>   



 