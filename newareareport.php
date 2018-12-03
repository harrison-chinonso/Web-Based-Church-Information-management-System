<?php 
ob_start(); 
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

if (empty($_POST) === false && empty($errors) === true ){
    $required_fields = array ('date','nocells','cellheld','target','tmem','newcell','premvp','cellattend','sundayattend','newmvp','2ndtimer','workforce','outreach','basic','mat','enc','dli','visit');
    foreach ($_POST as $key => $value){
      if (empty ($value) && in_array($key, $required_fields)=== true){
        $errors[] = 'Fill in all required fields';        
      }
    }
    if(date_exists($_POST['date'],'area_tb') === true){
        $errors[] = 'Report Date Already exists';
    }
      if (empty($_POST) === false && empty($errors) === true ){
          $register_data = array(
              'reportdate'       => $_POST['date'],
              'target'           => $_POST['target'],
              'totalmember'      => $_POST['tmem'],
              'number_of_cells'  => $_POST['nocells'],
              'cellheld'         => $_POST['cellheld'],
              'newcell'          => $_POST['newcell'],
              'cellattend'       => $_POST['cellattend'],
              'sundayattend'     => $_POST['sundayattend'],
              'premvp'           => $_POST['premvp'],
              'newmvp'           => $_POST['newmvp'],
              '2ndtimer'         => $_POST['2ndtimer'],
              'workforce'        => $_POST['workforce'],
              'outreach'         => $_POST['outreach'],
              'dcabasic'         => $_POST['basic'],
              'mat'              => $_POST['mat'], 
              'enc'              => $_POST['enc'],
              'dli'              => $_POST['dli'],
              'visit'            => $_POST['visit'],
              'calls'            => $_POST['calls'],
              'referral'   => $name 
          );
          register($register_data);
          header('Location: newareareport.php?success');
          exit();
  }else if(empty($errors) === false){
    ?>
    <section id="error" class="card-panel lighten-5 scrollspy">
      <div class="row">
        <div class="col s12 m8 center-align" style="font-size:15px;">
            <?php
            echo output_error($errors);
            ?>
        </div>
      </div>
    </section>
    <?php
  }
}
include 'includes/workmenutop.php'; 
?>
<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
      <span class="black-text right" style='font-size:17px'> 
      <?php
        if(isset ($_GET['success']) && empty ($_GET['success']) ){
          echo 'You\'ve Successfully Created an Area report';
        }
        ?>
      </span>
      <div id="new_register" class="new_register">
                        <form class="new_register-content" method="post" action="">
                            <div class="report" style="font-size:25px">
                                <h1 style="font-size:38px" id='newreg'>New Area Report</h1>
                                <p style="font-size:18px" id="membernote">Please fill in this form to prepare an area report</p>
                                <hr>
                                <div class="row">
                                    <div class="input-field col s12">
                                    <input type="text" class="datepicker" placeholder="Enter Area Report Date" name="date" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Total Membership Target" name="target" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Total Membership" name="tmem" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                    <input type="number" placeholder="Enter Number Of Cells In Area " name="nocells" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Cells Held" name="cellheld" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Newly Planted Cells" name="newcell" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Cell Attendance" name="cellattend" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Sunday Attendance" name="sundayattend" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Previous MVP" name="premvp" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter New MVP" name="newmvp" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter 2nd Timers" name="2ndtimer" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="How Many Joined Workforce" name="workforce" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="How Many Went On Outreach" name="outreach" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder=" Attendance - (DCA Basic)" name="basic" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Attendance - (DCA Maturity)" name="mat" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Attended - (Encounter)" name="enc" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Attended - (DLI)" name="dli" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="No. Of Members Visited" name="visit" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="No. Of Members Called" name="calls" required>
                                    </div>
                                </div>
                                <button type="submit" class="new_register">Register</button>
                            </div>
                        </form>
        </div>
  </div>
</div>
</section>
<?php
include 'includes/script.php';
  ob_end_flush();
?>