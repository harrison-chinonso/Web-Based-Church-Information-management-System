<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];


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
      if(email_exists($_POST['email'],'mvp_tb') === true) {
        $errors[] = 'Sorry, the email \'' . $_POST['email'].'\' is already taken';
        }
      if(name_exists($_POST['fname'],$_POST['lname'],'mvp_tb') === true) {
        $errors[] = 'Sorry, the firstname \'' . $_POST['fname'].'\' and the lastname \'' . $_POST['lname'].'\' combination is already taken';
      }
      if(phone_exists($_POST['phone'],'mvp_tb') === true) {
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
            'address'    => $_POST['address'],
            'cell'       => $_POST['cell'],
            'area'       => $_POST['area'],
            'marital'    => $_POST['marital'],
            'age'    => $_POST['age'],
            'birthday'   => $_POST['birthday'],            
            'mvpdate'    => $_POST['mvpdate'],
            '2ndtime'    => $_POST['2ndtime'],  
            '3rdtime'       => $_POST['3rdtime'],
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
            'address'    => $_POST['address'],
            'cell'       => $_POST['cell'],
            'area'       => ($area),
            'marital'    => $_POST['marital'],
            'age'    => $_POST['age'],
            'birthday'   => $_POST['birthday'],            
            'mvpdate'    => $_POST['mvpdate'],
            '2ndtime'    => $_POST['2ndtime'],  
            '3rdtime'       => $_POST['3rdtime'],
            'referral'   => $name  
            );}
          register($register_data);
          header('Location: newmvp.php?success');
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
      echo 'You\'ve Successfully Registered an MVP';
     }
    ?>
  </span>
  <div id="new_register" class="new_register">
    <form class="new_register-content" method="post" action="">
        <div class="container" style="font-size:25px">
            <h1 style="font-size:52px" id='newreg'>New MVP</h1>
            <p style="font-size:27px" id="membernote">Please fill in this form to register an MVP</p>
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
            </div>
            <div class="row">
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
                <div class="input-field col m6 s12" >
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
                <div class=" worker input-field col m6 s12">
                    <?php $area = getarea();?>
                    <select onchange="showall(this.value,this.name)" class="browser-default" name="area" required>
                    <option value=""disabled selected>Area</option>
                    <?php foreach ($area as $option): ?>
                    <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
                    <?php endforeach;?> 
                    </select>  
                </div> 
            </div> 
            <div class="row">                   
                <div class="input-field col m6 s12" >
                <input type="text" class="datepicker" name="birthday" placeholder="Click to select Birth Date" required>
                </div>
                <div class="input-field col m6 s12" >
                <input type="text" class="datepicker" name="mvpdate" placeholder="Click to select Date Of 1st Attendance" required>
                </div>
            </div> 
            <div class="row">                   
                <div class="input-field col m6 s12">
                <input type="text" class="datepicker" name="2ndtime" placeholder="Click to select Date Of 2nd Attendance">
                </div>
                <div class="input-field col m6 s12" >
                <input type="text" class="datepicker" name="3rdtime" placeholder="Click to select Date Of 3rd Attendance">
                </div>
            </div>   
                <button style="font-size:25px" type="submit" class="new_register">Register</button>
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