<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

if (empty($_POST) === false){
    $required_fields = array ('date','ncell','cellleader','target','cellpop','start','end','cellattend','sundayattend','2ndtimer','churchmvp','cellmvp','offering','basic','mat','enc','dli','visit');
    foreach ($_POST as $key => $value){
      if (empty ($value) && in_array($key, $required_fields)=== true){
        $errors[] = 'Fill in all required fields';        
      }
    }
    if(date_exists($_POST['date'],'cell_tb') === true){
        $errors[] = 'Report Date Already exists';
    }
    $offset = 0; $find=",";$find_len = strlen($find);$mvp;$cellperson = "";
    $cellperson  = $_POST['cellmvps'];
    $mem = $_POST['cellmember'];
    foreach ($mem as $selected)
        $cellperson .= ",".$selected;

      if (empty($_POST) === false && empty($errors) === true ){
          $register_data = array(
              'reportdate'     => $_POST['date'],
              'name_of_cell'      => $_POST['name_of_cell'],
              'cellleader'    => $_POST['cellleader'],
              'target'  => $_POST['target'],
              'cellpop'   => $_POST['cellpop'],
              'start'       => $_POST['start'],
              'end'       => $_POST['end'],
              'cellattend'    => $_POST['cellattend'],
              'sundayattend' => $_POST['sundayattend'],
              '2ndtimer'       => $_POST['2ndtimer'],
              'churchmvp'   => $_POST['churchmvp'],
              'cellmvp'       => $_POST['cellmvp'],
              'offering'  => $_POST['offering'],
              'dcabasic'   => $_POST['basic'],
              'mat'       => $_POST['mat'],
              'enc'       => $_POST['enc'],
              'dli'    => $_POST['dli'],
              'visit'  => $_POST['visit'],
              'cellperson' => $cellperson,
              'referral'   => $name 
          );}
          register($register_data);
          header('Location: newcellreport.php?success');
         exit();
      }
else if(empty($errors) === false){
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
include 'includes/workmenutop.php'; 
?>
<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
    <span class="black-text right" style='font-size:17px'> 
    <?php
      if(isset ($_GET['success']) && empty ($_GET['success']) ){
        echo 'You\'ve Successfully Created a Cell Report';
      }
      if(isset ($_GET['error']) && empty ($_GET['error']) ){
        echo 'We couldn\'t Successfully Create your Cell Report, please try again.';
      }
      ?>
    </span>
    <div id="new_register" class="new_register">
                        <form class="new_register-content" method="post" action="">
                            <div class="report" style="font-size:25px">
                                <h1 style="font-size:40px" id='newreg'>New Cell Report</h1>
                                <p style="font-size:15px" id="membernote">Please fill in this form to prepare an cell report</p>
                                <hr>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                    <input type="text" class="datepicker" name="date" placeholder="Enter Cell Report Date" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="text" placeholder="Enter Name Of Cell" name="ncell" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                    <input type="text" placeholder="Enter Name Of Cell Leader" name="cellleader" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Membership Target" name="target" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Cell Population" name="cellpop" required>
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
                                        <input type="text" placeholder="Enter Start Time" name="start" class="timepicker" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                    <input type="text" placeholder="Enter End Time" name="end" class="timepicker" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter 2nd Timers" name="2ndtimer" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Church MVP" name="churchmvp" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Cell MVP" name="cellmvp" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Enter Cell Offering" name="offering" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder=" Attendance - (DCA Basic)" name="basic" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Attendance - (DCA Maturity)" name="mat" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Attended - (Encounter)" name="enc" required>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="Attended - (DLI)" name="dli" required>    
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input type="number" placeholder="No. Of Members Visited" name="visit" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" worker input-field col m5 s12">
                                        <?php $cellmember = getCellMembers();?>
                                        <select multiple id="cellatt" name="cellmember[]" required>
                                            <option value=""disabled selected>Select Cell Members Attendance</option>
                                            <?php foreach ($cellmember as $option):?>
                                            <option value="<?php echo $option->firstname.' '.$option->lastname;?>"><?php echo $option->firstname.' '.$option->lastname;?></option>
                                            <?php endforeach;?> 
                                        </select> 
                                    </div>
                                    <div class="input-field col m7 s12">
                                        <input type="text" placeholder="Enter Cell attendants not in check list (separated by Comma)" name="cellmvps">
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