<section class="usercontainer">
    <div class="row">
     <div class="col s12 m4 l2 ">
        <div class="card-panel">
            <ul id="work_menu" class="work_menu">
              <li><a class='dropdown-trigger' href='#' data-target='dropdown41'><i class=" fa fa-cog fa-2x"></i> <span>DCA Basic</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown42'><i class=" fa fa-cog fa-2x"></i> <span>DCA Maturity</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown45'><i class=" fa fa-gears fa-2x"> </i><span>Encounter</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown43'><i class=" fa fa-gears fa-2x"></i> <span>Discipleship Class</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li><a class='dropdown-trigger' href='#' data-target='dropdown44'><i class=" fa fa-gears fa-2x"></i> <span>School Of Ministry</span> </a></li>
              <li><div class="divider  lighten-1"></div></li> 
              <li><a class='dropdown-trigger' href='#' data-target='dropdown46'><i class=" fa fa-gears fa-2x"> </i><span>DLI</span> </a></li>
              <li><div class="divider  lighten-1"></div></li> 
              <li><a class='dropdown-trigger' href='#' data-target='dropdown8'><i class=" fa fa-file fa-2x"> </i><span>Administrator</span> </a></li> 
              <li><div class="divider  lighten-1"></div></li>
              <li><a href="work.php"><i class=" fa fa-reply fa-2x"></i><span>Back</span> </a></li>
              <li><div class="divider  lighten-1"></div></li>
          </ul>    
        </div>
      </div>
      <ul id='dropdown41' class='subworkmenu dropdown-content'>
              <li><a href="UpdateDCABasic.php">Update DCA Basic</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a id="basic"  href="AllAttendDCABasic.php">All Attended DCA Basic</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="AllNotAttendDCABasic.php">All Not Attended DCA Basic</a></li>
          </ul>
          <ul id='dropdown42' class='subworkmenu dropdown-content'>
              <li><a  href="UpdateDCAMat.php">Update DCA Maturity</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a id="upmat" href="AllAttendDCAMat.php">All Attended DCA Maturity</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="AllNotAttendDCAMat.php">All Not Attended Maturity</a></li>
           </ul>
          <ul id='dropdown43' class='subworkmenu dropdown-content'>
              <li><a  href="UpdateDisci.php">Update Discipleship</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a id="updisci" href="AllAttendDisci.php">All Attended Discipleship</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="AllNotAttendDisci.php">All Not Attended Discipleship</a></li>
          </ul>
          <ul id='dropdown44' class='subworkmenu dropdown-content'>
              <li><a  href="UpdateSOM.php">Update School Of Ministry</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a id="upsom" href="AllAttendSOM.php">All Attended</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="AllNotAttendSOM.php">All Not Attended</a></li>
           </ul>
          <ul id='dropdown45' class='subworkmenu dropdown-content'>
              <li><a  href="UpdateEnc.php">Update Encounter</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a id="upenc" href="AllAttendEnc.php">All Attended Encounter</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="AllNotAttendEnc.php">All Not Attended Encounter</a></li>
           </ul>

          <ul id='dropdown46' class='subworkmenu dropdown-content'>
              <li><a id="updli" href="UpdateDli.php">Update DLI</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="AllAttendDli.php">All Attended DLI</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="AllNotAttendDli.php">All Not Attended DLI</a></li>
           </ul>

            <?php if($rol == "DCA Staff" || $rol == "Administrator"){ ?>
                  <ul id='dropdown8' class='subworkmenu dropdown-content'>
                  <li><a href="registerstudents.php">Register Students</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li><a href="dcabasic.php">DCA Basic</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li><a href="dcamat.php">DCA Maturity</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li><a href="enc.php">Encounter</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li><a href="disciple.php">Discipleship Class</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li><a href="som.php">School Of Ministry</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li><a href="dli.php">DLI</a></li>
                </ul>
                <?php } ?>

