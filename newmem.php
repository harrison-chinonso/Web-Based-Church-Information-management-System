<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];

if (empty($_POST) === false){
    $required_fields = array ('fname','lname','phone','gender','address','cell','area','marital','birthday','mvpdate');
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
      if(email_exists($_POST['email'],'member_tb') === true) {
        $errors[] = 'Sorry, the email \'' . $_POST['email'].'\' is already taken';
        }
      if(name_exists($_POST['fname'],$_POST['lname'],'member_tb') === true) {
        $errors[] = 'Sorry, the firstname \'' . $_POST['fname'].'\' and the lastname \'' . $_POST['lname'].'\' combination is already taken';
      }
      if(phone_exists($_POST['phone'],'member_tb') === true) {
        $errors[] = 'Sorry, the phonenumber \'' . $_POST['phone'].'\' is already taken';
        }
     
      if (empty($_POST) === false && empty($errors) === true ){
        if ($rol === "Administrator"){
          $register_data = array(
            'firstname'  => $_POST['fname'],
            'lastname'   => $_POST['lname'],
            'phone'     => $_POST['phone'],
            'phone2'     => $_POST['phone2'],
            'email'      => $_POST['email'],
            'gender'     => $_POST['gender'],
            'dept'       => $_POST['dept'],
            'address'    => $_POST['address'],
            'cell'       => $_POST['cell'],
            'area'       => $_POST['area'],
            'marital'    => $_POST['marital'],
            'age'    => $_POST['age'],
            'birthday'   => $_POST['birthday'],            
            'mvpdate'    => $_POST['mvpdate'],
            '2ndtime'    => $_POST['2ndtime'],
            'dcabasic'      => $_POST['basic'],
            'mat'        => $_POST['mat'],
            'enc'        => $_POST['enc'],            
            'discipleship'       => $_POST['disciple'],
            'school_of_ministry' => $_POST['som'],
            'dli'                => $_POST['dli'],
            'referral'   => $name   
          );}
          else{
            $register_data = array(
            'firstname'  => $_POST['fname'],
            'lastname'   => $_POST['lname'],
            'phone'     => $_POST['phone'],
            'phone2'     => $_POST['phone2'],
            'email'      => $_POST['email'],
            'gender'     => $_POST['gender'],
            'dept'       => $_POST['dept'],
            'address'    => $_POST['address'],
            'cell'       => $_POST['cell'],
            'area'        => ($area),
            'marital'    => $_POST['marital'],
            'age'    => $_POST['age'],
            'birthday'   => $_POST['birthday'],            
            'mvpdate'    => $_POST['mvpdate'],
            '2ndtime'    => $_POST['2ndtime'],
            'dcabasic'      => $_POST['basic'],
            'mat'        => $_POST['mat'],
            'enc'      => $_POST['enc'],            
            'discipleship'       => $_POST['disciple'],
            'school_of_ministry' => $_POST['som'],
            'dli'                => $_POST['dli'],
            'referral'   => $name   
        );}
          register($register_data);
          header('Location: newmem.php?success');
          exit();
      }else if(empty($errors) === false){ ?>
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
            echo 'You\'ve Successfully Registered a Member';
            }
            ?>
            </span>
          <div id="new_register" class="new_register">
<form class="new_register-content" method="post" action="">
    <div class="container" style="font-size:15px">
        <h1 id='newreg'>New Member</h1>
        <p id="membernote">Please fill in this form to register a member</p>
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
            <div class="input-field col m6 s12">
                <input type="text" placeholder="Enter Email" name="email">
            </div>
            <div class="col m6 s12">
                <input type="text" class="row" placeholder="Enter Address" name="address" required>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m4 s12" >
                <select class="browser-default" name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
            </div>
            <div class="input-field col m4 s12" >
                <select class="browser-default" name="marital" required>
                <option value="" disabled selected>Marital Status</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
                <option value="separated">Separated</option>
                </select>
            </div>
            <div class="input-field col m4 s12" >
                <select class="browser-default" name="age" required>
                <option value="" disabled selected>Age Range</option>
                <option value="single">1year - 10years</option>
                <option value="married">11years - 19years </option>
                <option value="divorced">20years - 30years</option>
                <option value="separated">31years - 40years</option>
                <option value="divorced">41years - 60years</option>
                <option value="separated">61years and above</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class=" worker input-field col m6 s12">
                <?php $dept = getdept();?>
                <select class="browser-default" name="dept" >
                <option value=""disabled selected>Department</option>
                <?php foreach ($dept as $option): ?>
                <option value="<?php echo $option->dept;?>"><?php echo $option->dept;?></option>
                <?php endforeach;?> 
                </select>  
            </div>
            <div class=" worker input-field col m6 s12">
            <?php $cell = getCell();?>
            <select class="browser-default" name="cell" required>
                <option value=""disabled selected>Cell</option>
                <?php foreach ($cell as $option):?>
                <option value="<?php echo $option->cellname;?>"><?php echo $option->cellname;?></option>
                <?php endforeach;?> 
            </select>   
            </div>     
        </div>
        <div class="row">
            <div class=" worker input-field col m6 s12">
            <?php $area = getarea();?>
            <select class="browser-default" name="area" required>
            <option value=""disabled selected>Area</option>
            <?php foreach ($area as $option): ?>
            <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
            <?php endforeach;?> 
            </select>  
            </div>
            <div class="col m6 s12">
            <input type="text" class="datepicker" name="birthday" placeholder="Enter Birth Date" required>
            </div> 
        </div>  
        <div class="row">                   
            <div class="input-field col m6 s12" >
            <input type="text" class="datepicker mmmm" name="mvpdate" placeholder="Enter Date Of 1st Attendance" required>
            </div>
            <div class="input-field col m6 s12" >
            <input type="text" class="datepicker" name="2ndtime" placeholder="Enter Date Of 2nd Attendance">
            </div>
        </div> 
        <div class="row">                   
            <div class="input-field col m4 s12">
            <input type="text" class="datepicker" name="basic" placeholder="Date Graduted From DCA Basic">
            </div>
            <div class="input-field col m4 s12" >
            <input type="text" class="datepicker" name="mat" placeholder="Date Graduted From DCA Maturity">
            </div>
            <div class="input-field col m4 s12" >
            <input type="text" class="datepicker" name="dli" placeholder="Date Graduted From Dli">
            </div>
        </div> 
        <div class="row">    
            <div class="input-field col m4 s12">
            <input type="text" class="datepicker" name="enc" placeholder="Date attended Encounter">
            </div>               
            <div class="input-field col m4 s12">
            <input type="text" class="datepicker" name="disciple" placeholder="Date Graduted From Discipleship">
            </div>
            <div class="input-field col m4 s12" >
            <input type="text" class="datepicker" name="som" placeholder="Date Graduted From School Of Ministry">
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