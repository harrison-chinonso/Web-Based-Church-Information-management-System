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
        if (name === "cellname"){
        xmlhttp.open("GET","includes/loadTable.php?cellname="+document.viewperson.cellname.value,true);
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
        <h1 style="font-size:30px" id='newreg'>View Cell Members</h1>
        <p style="font-size:20px" id="membernote">Search for Cell Members by:</p>
        <hr>   
        <div class="row">
        <div class=" worker input-field col m5 s12">
          <?php $cell = getCell();?>
            <select onchange= "showperson(this.value, this.name)" class="browser-default" name="cellname" required>
               <option value=""disabled selected>Cell</option>
               <?php foreach ($cell as $option):?>
               <option value="<?php echo $option->cellname;?>"><?php echo $option->cellname;?></option>
               <?php endforeach;?> 
          </select>  
        </div>
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
