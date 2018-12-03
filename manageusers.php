<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];
include 'includes/workmenutop.php'; 
?>
<script>
function del(){
        event.preventDefault();
        document.getElementById('confirm').style.display='block'
    }
function showperson(value,name,id){
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

        if (name === "area"){
        xmlhttp.open("GET","includes/loadTable.php?area="+document.viewperson.area.value,true);
        }
        else if (name === "cell"){
        xmlhttp.open("GET","includes/loadTable.php?cell="+document.viewperson.cell.value,true);          
        }
        else if (name === "role"){
        xmlhttp.open("GET","includes/loadTable.php?role="+document.viewperson.role.value,true);          
        }
        else if (name === "all"){
        xmlhttp.open("GET","includes/loadTable.php?all="+document.viewperson.all.value,true);          
        }
        else if (name === "allactive"){
        xmlhttp.open("GET","includes/loadTable.php?allactive="+document.viewperson1.allactive.value,true);          
        }
        else if (name === "allpassive"){
        xmlhttp.open("GET","includes/loadTable.php?allpassive="+document.viewperson1.allpassive.value,true);          
        }
        else if (name === 'view'){
        document.getElementById("modaldetails").style.display = "block";    
        xmlhttp.open("GET","includes/fetch.php?id="+id,true);    
        }
        else if (name === 'deleteuser'){  
        xmlhttp.open("GET","includes/delete.php?deleteuser="+id,true);    
        }
        xmlhttp.send();
}
</script>
<div id="workarea" class="col s12 m8 l10 ">
<div class="card-panel mainwork">
    <span class="black-text right" style='font-size:17px'> 
                <?php
                if(isset ($_GET['deleted']) && empty($_GET['deleted'])){
                echo 'You\'ve Successfully deleted a user';
                }
                else if(isset ($_GET['errordel']) && empty($_GET['errordel'])){
                    echo 'Sorry we couldn\'t successfully the delete the user. Try again';
                }
                ?>
            </span>
    <div class="row">
        <div class="col m6 s12">
            <?php $total = getTotalUser();$active = getActiveUser(); $passive = getPassiveUser();
            $suftot = ($total != 1) ? 's' : ''; $sufact = ($active != 1) ? 's' : ''; $sufpass = ($passive != 1) ? 's' : '';
            ?>
            <h4>All Users</h4>
            <h5>We Currently have <?php echo $total ?> registered user<?php echo $suftot;?>. </h5>
        </div>
        <div class="col m6 s12">
            <div class="row">
                <div class="col s7">
                    <h5><?php echo $active?> Activated user<?php echo $sufact;?>.</h5>
                    <h5><?php echo $passive?> Non-activated user<?php echo $sufpass;?>.</h5>
                </div>

                <div class="col s5">
                   <form id="viewperson1" class="new_register-content" name="viewperson1">
                        <button onclick="showperson(this.value,this.name)" value="allactive" name="allactive" class="all">Active</button>
                        <button onclick="showperson(this.value,this.name)" value="allpassive" name="allpassive" class="all">Not Active</button>                                
                  </form>
                </div>                
            </div>
        </div>
    </div>
    <div id="new_register" class="new_register">
        <form id="viewperson" class="new_register-content" name="viewperson">
            <div class="container" style="font-size:18px">
                <p style="font-size:20px" id="membernote">View Users by:</p>
                <hr>
                <div class="row">  
                    <div class="worker input-field col m3 s12">
                            <button onclick="showperson(this.value,this.name)" value="all" name="all" class="all">All</button>
                    </div>
                    <div class=" worker input-field col m3 s12">
                        <?php $area = getarea();?>
                        <select onchange="showperson(this.value,this.name)" class="browser-default" name="area">
                        <option value=""disabled selected>Area</option>
                        <?php foreach ($area as $option): ?>
                        <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
                        <?php endforeach;?> 
                        </select>  
                    </div> 
                    <div class=" worker input-field col m3 s12">
                        <?php $cell = getCell();?>
                        <select onchange="showperson(this.value,this.name)" class="browser-default" name="cell">
                            <option value=""disabled selected>Cell</option>
                            <?php foreach ($cell as $option):?>
                            <option value="<?php echo $option->cellname;?>"><?php echo $option->cellname;?></option>
                            <?php endforeach;?> 
                        </select>  
                    </div>
                    <div class=" worker input-field col m3 s12">
                        <?php $rol = getrol();?>
                        <select onchange="showperson(this.value,this.name)" class="browser-default" name="role">
                            <option value=""disabled selected>Role</option>
                            <?php foreach ($rol as $option):?>
                            <option value="<?php echo $option->rol;?>"><?php echo $option->rol;?></option>
                            <?php endforeach;?> 
                        </select>  
                    </div>

                </div> 
            </div>
        </form>
        <br>
        <div id="txtHint"></div>
  </div>
</div>
</div>



<div id="modaldetails" class="signup">
        <form class="signup-content" method="post" action=" ">
            <div class="container" style="font-size:15px">
            <span onclick="document.getElementById('modaldetails').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h4 id='newuser'>Personal Details</h4>
            <hr>
            <div id="person_details">

            </div>
            <div class="row">
                <div class="col m4 s6"><button style="font-weight: bold; font-size: 15px;" class="signup">EDIT</button></div>
                <div class="col m4 s6"><button onclick= "del();" style="font-weight: bold; font-size: 15px;" class="signup">DELETE</button></div>                                
                <div class="col m4 s12"><button onmouseover="document.getElementById('modaldetails').style.display='none';" style="font-weight: bold; font-size: 15px;" class="signup">CLOSE</button></div>                
            </div>
          </div>
        </form>
      </div>
</section>
<?php 
include 'includes/script.php'; 
ob_end_flush();
?>