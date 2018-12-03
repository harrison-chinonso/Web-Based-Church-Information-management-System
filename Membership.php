<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

if(isset($_GET['selectedarea'])){
    $selectedarea = $_GET['selectedarea'];
}
include 'includes/workmenutop.php'; 
?>
<script>
function sendarea(){
    event.preventDefault();
    var area = document.querySelector('input[name="area"]:checked').value;                   
    location = "?selectedarea="+area;
}

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

        if (name === "cell"){
        xmlhttp.open("GET","includes/loadTable.php?cell="+document.viewperson.cell.value,true);          
        }
        else if (name === "all"){
        xmlhttp.open("GET","includes/loadTable.php?all="+document.viewperson1.all.value,true);          
        }
        else if (name === "allarea"){
        xmlhttp.open("GET","includes/loadTable.php?allarea="+document.viewperson.allarea.value,true);          
        }
        else if (name === "marital"){
        xmlhttp.open("GET","includes/loadTable.php?marital="+document.viewperson.marital.value+'/'+'<?php if(isset($_GET['selectedarea'])){echo $selectedarea = $_GET['selectedarea'];}?>',true);          
        }
        else if (name === "age"){
        xmlhttp.open("GET","includes/loadTable.php?age="+document.viewperson.age.value+'/'+'<?php if(isset($_GET['selectedarea'])){echo $selectedarea = $_GET['selectedarea'];}?>',true);          
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
        <div class="row">
            <div class="col s12">
                <?php $total = getTotalMember();
                $suftot = ($total != 1) ? 's' : '';
                ?>
                <h4 style="margin:1px 1px;">All Members</h4>
                <div style="margin:0px;" class="worker input-field col s9">
                    <h5>We Currently have <?php echo $total ?> registered Member<?php echo $suftot;?>. </h5>          
                </div> 
                <div class="worker input-field col s3">
                    <form id="viewperson1" name="viewperson1">
                        <button onclick="showperson(this.value,this.name)" value="all" name="all" class="all">All</button>
                    </form>
                </div> 
            </div>
        </div>

        <div id="new_register" class="new_register">
            <form id="viewperson" class="new_register-content" name="viewperson">
                <div class="container" style="font-size:18px;">
                    <p style="font-size:20px;" id="membernote">Please select an Area to View Members by:</p>
                    <hr>
                    <div class="row"> 
                        <div class="col m2 s4">
                            <div id="selectareacell" style="display:none"></div>
                            <form style="margin:0px; padding:0px;" action="get">
                                <?php $newarea = getarea();?>
                                <?php foreach ($newarea as $option): ?>
                                <p style="margin:0.5px;">
                                    <label style:"margin:0px; padding:0px;">
                                        <input id="selectarea" onchange ="sendarea();" value="<?php echo $option->area;?>" class="with-gap" name="area" type="radio"/>
                                        <span><?php echo $option->area;?></span>
                                        <?php endforeach;?>
                                    </label>
                                </p>
                            </form>   
                        </div>
                        
                        <div class="col m10 s8">
                            <div class="worker input-field col m3 s10">
                                <button onclick="showperson(this.value,this.name)" value="<?php echo $selectedarea ?>" name="allarea" class="all">All</button>
                            </div> 
                            <div class=" worker input-field col m3 s10">
                                <?php if(empty($selectedarea)=== false){$cell = getAreaCell($selectedarea);}?>
                                <select onchange="showperson(this.value,this.name)" class="browser-default" id="areacell" name="cell">
                                    <option value=""disabled selected>Cell</option>
                                    <?php foreach ($cell as $option):?>
                                    <option value="<?php echo $option->cellname;?>"><?php echo $option->cellname;?></option>
                                    <?php endforeach;?> 
                                </select> 
                            </div>
                            <div class="input-field col m3 s10" >
                                    <select onchange="showperson(this.value,this.name)" class="browser-default" name="marital" required>
                                    <option value="" disabled selected>Marital Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="separated">Separated</option>
                                    </select>
                                </div>
                                <div class="input-field col m3 s10" >
                                    <select onchange="showperson(this.value,this.name)" class="browser-default" name="age" required>
                                    <option value="" disabled selected>Age Range</option>
                                    <option value="single">1year - 10years</option>
                                    <option value="married">11years - 19years </option>
                                    <option value="divorced">20years - 30years</option>
                                    <option value="separated">31years - 40years</option>
                                    <option value="divorced">41years - 60years</option>
                                    <option value="separated">61years and above</option>
                                    </select>
                                </div>
                            <br>
                            <br>
                            <div class="col s12" id="txtHint"></div> 
                        </div>
                    </div> 
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<?php 
include 'includes/modal.php';
include 'includes/script.php'; 
ob_end_flush();
?>