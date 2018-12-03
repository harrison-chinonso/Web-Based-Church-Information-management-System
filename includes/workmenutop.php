<?php
$id = $_SESSION['id'];
$namearray = referal($id);
$rol = $namearray[1];
 ?>
<section class="usercontainer">
    <div class="contain row">
      <div class="col s12 m4 l2">
        <div class="card-panel">
            <ul id="work_menu" class="work_menu">
              <li><a class='dropdown-trigger' href='#' data-target='dropdown1'><i class=" fa fa-group fa-2x"></i> <span>Membership</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown2'><i class=" fa fa-gift fa-2x"></i> <span>Mvp</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown3'><i class=" fa fa-trophy fa-2x"></i> <span>New Believer</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a href='discipleshipwork.php'><i class=" fa fa-gears fa-2x"></i> <span>Discipleship</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown5'><i class=" fa fa-user fa-2x"></i> <span>Worker</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown6'><i class=" fa fa-group fa-2x"> </i><span>Cell</span> </a></li>
              <li><div class="divider  lighten-1"></div></li> 
              <li><a class='dropdown-trigger' href='#' data-target='dropdown7'><i class=" fa fa-group fa-2x"> </i><span>Area</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>  
              <li><a class='dropdown-trigger' href='#' data-target='dropdown9'><i class=" fa fa-file fa-2x"> </i><span>Administrator</span> </a></li>
              <li><div class="divider  lighten-1"></div></li> 
              <li><a id="register"  onclick="document.getElementById('signup').style.display='block'" href="#"><i class=" fa fa-plus fa-2x"></i><span>Register User</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='work.php'><i class=" fa fa-home fa-2x"></i> <span>Portal Home</span> </a></li>
          </ul>    
        </div>
      </div>


               <ul id='dropdown1' class='subworkmenu dropdown-content'>
             <?php if($rol == "Administrator"){ ?>
                      <li><a href="newmem.php">New Member</a></li> 
                      <li class="divider" tabindex="-1"></li>
          <?php } ?>  <li><a href="viewmem.php">View Members</a></li>
                      <li class="divider" tabindex="-1"></li>
                      <li><a href="allmem.php">All members</a></li>
                      <li class="divider" tabindex="-1"></li>
                      <li><a href="arcmem.php">Archieved Members</a></li>
                </ul>

                 <ul id='dropdown2' class='subworkmenu dropdown-content'>
                 <?php if($rol == "Administrator" || $rol == "Mvp Personnel") { ?>
                    <li><a href="newmvp.php">New Mvp</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="mvpreport.php">Mvp Report</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <?php } ?>
                    <li><a href="viewmvp.php">View Mvp</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="allmvp.php">All Mvp</a></li>
                </ul>

                <ul id='dropdown3' class='subworkmenu dropdown-content'>
                <?php if($rol == "Administrator"){ ?>          
                    <li><a href="newbeliever.php">New Beliver</a></li> 
                    <li class="divider" tabindex="-1"></li>
                    <?php } ?>   
                    <li><a href="viewnewbeliever.php">View New Beliver</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="allnewbeliever.php">All New Beliver</a></li>
                </ul>
              
              <ul id='dropdown5' class='subworkmenu dropdown-content'>
                <?php if($rol == "Administrator"){ ?> 
                <li><a href="newworker.php">New Worker</a></li> 
                <li class="divider" tabindex="-1"></li>
                <?php } ?>  
                <li><a href="viewworker.php">View Worker</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="allworker.php">All Workers</a></li>
                <?php if($rol == "Administrator") { ?>
                <li class="divider" tabindex="-1"></li>
                <li><a href="newdepartment.php">New Department</a></li>
                <?php } ?>
              </ul>


             <ul id='dropdown6' class='subworkmenu dropdown-content'>
                <li><a href="newcellreport.php">New Cell Report</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="viewcellreport.php">View Cell Report</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="allcellreport.php">All Cell Reports</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="cellmem.php">Cell Members</a></li>
              </ul>


              <?php if($rol == "Area Cordinator" || $rol == "Administrator"){?>
                <ul id='dropdown7' class='subworkmenu dropdown-content'>
                <li><a href="newareareport.php">New Area Report</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="24Hoursreport.php">24 Hours Area Reports</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="7daysreport.php">7 Days Area Report</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="month.php">Monthly Area Report</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="year.php">Yearly Area Report</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="viewareareport.php">View Area Report</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="allareareport.php">All Area Reports</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="registercell.php">Register Cell</a></li>
                <?php} if($rol == "Administrator"){ ?>
                <li class="divider" tabindex="-1"></li>
                <li><a href="newarea.php">New Area</a></li>
                </ul>
              <?php }?>


              <?php if($rol == "Administrator"){ ?>  
              <ul id='dropdown9' class='subworkmenu dropdown-content'>
                <li><a href="Membership.php">Membership</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="Mvp.php">Mvp</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="Newbelievers.php">New Believers</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="followup.php">Follow Up</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="consolidation.php">Consolidation</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="manageusers.php">Manage Users</a></li>
              </ul>
              <?php }?>
              


             
