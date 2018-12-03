<?php 
ob_start(); 
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

if (empty($_POST) === false){

    $required_fields = array ('fname','lname','phone','gender','address','cell','area','marital','birthday','decisiondate','mvpdate');
    foreach ($_POST as $key => $value){
      if (empty ($value) && in_array($key, $required_fields)=== true){
        $errors[] = 'Fill in all required fields';        
      }
    }
    if(strlen($_POST['phone']) < 11){
        $errors[] = 'A Valid Phone Number is required';
      }
      if(empty($_POST['phone2']) === false && strlen($_POST['phone2']) < 11){
        $errors[] = 'A Valid Phone Number is required on the second phone number field';
      }
      if (empty($_POST['email']) === false && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
          $errors[]= 'A Valid email address is required';
      }
      if(email_exists($_POST['email'],'newbeliever_tb') === true) {
        $errors[] = 'Sorry, the email \'' . $_POST['email'].'\' is already taken';
        }
      if(name_exists($_POST['fname'],$_POST['lname'],'newbeliever_tb') === true) {
        $errors[] = 'Sorry, the firstname \'' . $_POST['fname'].'\' and the lastname \'' . $_POST['lname'].'\' combination is already taken';
      }
      if(phone_exists($_POST['phone'],'newbeliever_tb') === true) {
        $errors[] = 'Sorry, the phonenumber \'' . $_POST['phone'].'\' is already taken';
        }

      if (empty($_POST) === false && empty($errors) === true ){
          $register_data = array(
            'firstname'  => $_POST['fname'],
            'lastname'   => $_POST['lname'],
            'phone'      => $_POST['phone'],
            'phone2'     => $_POST['phone2'],
            'email'      => $_POST['email'],
            'address'    => $_POST['address'],
            'birthday'   => $_POST['birthday'], 
            'gender'     => $_POST['gender'],
            'marital'    => $_POST['marital'],
            'decisiondate'      => $_POST['decisiondate'],
            'mvpdate'    => $_POST['mvpdate'],
            '2ndtime'    => $_POST['2ndtime'],
            'area'       => $_POST['area'],
            'cell'       => $_POST['cell'],
            'referral'   => $name
          );
          register($register_data);
          header('Location: newbeliever.php?success');
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
      </section> <?php
      }
  }
include 'includes/workmenutop.php'; 
?>
<div id="workarea" class="col s12 m8 l10 ">
<div class="card-panel mainwork">
  <span class="black-text right" style='font-size:17px'> 
  <?php
    if(isset ($_GET['success']) && empty ($_GET['success']) ){
      echo 'You\'ve Successfully Registered a New Believer';
     }
    ?>
  </span>
    <div id="new_register" class="new_register">
    <form class="new_register-content" method="post" action="">
                            <div class="container" style="font-size:25px">
                                <h1 style="font-size:52px" id='newreg'>New Believer</h1>
                                <p style="font-size:30px" id="membernote">Please fill in this form to register a New Believer</p>
                                <hr>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input type="text" placeholder="Enter Firstname" name="fname" required>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input type="text" placeholder="Enter Lastname" name="lname">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                    <input type="number" placeholder="Enter Phone Number" name="phone" required>
                                    </div>
                                    <div class="input-field col m6 s12">
                                    <input type="number" placeholder="Enter Another Phone Number if any..." name="phone2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" placeholder="Enter Email" name="email">
                                    </div>
                                    <div class="col s12">
                                        <input type="text" class="row" placeholder="Enter Address" name="address" required>
                                    </div>
                                    <div class="input-field col m6 s12" >
                                        <select class="browser-default" name="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="input-field col m6 s12" >
                                        <select class="browser-default" name="marital" required>
                                        <option value="" disabled selected>Marital Status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="separated">Separated</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class=" worker input-field col m6 s12">
                                        <?php $cell = getCell();?>
                                        <select class="browser-default" name="cell" required>
                                            <option value=""disabled selected>Cell</option>
                                            <?php foreach ($cell as $option):?>
                                            <option value="<?php echo $option->cellname;?>"><?php echo $option->cellname;?></option>
                                            <?php endforeach;?> 
                                        </select>  
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <?php $area = getarea();?>
                                        <select class="browser-default" name="area" required>
                                        <option value=""disabled selected>Area</option>
                                        <?php foreach ($area as $option): ?>
                                        <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
                                        <?php endforeach;?> 
                                        </select>
                                    </div>
                                </div>  
                                <div class="row">                   
                                    <div class="input-field col m6 s12" >
                                    <input type="text" class="datepicker" name="birthday" placeholder="Enter Birth Date" required>
                                    </div>
                                    <div class="input-field col m6 s12" >
                                    <input type="text" class="datepicker" name="decisiondate" placeholder="Enter Date Of Decision" required>
                                    </div>
                                </div> 
                                <div class="row">                   
                                    <div class="input-field col m6 s12">
                                    <input type="text" class="datepicker" name="mvpdate" placeholder="Enter Date Of 1st Attendance" required>
                                    </div>
                                    <div class="input-field col m6 s12" >
                                    <input type="text" class="datepicker" name="2ndtime" placeholder="Enter Date Of 2nd Attendance">
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