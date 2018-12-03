<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];

if (empty($_POST) === false){
    $required_fields = array ('cellname','celladdress','phone','cellleader','gender','hostname','area','marital','hostphone');
    foreach ($_POST as $key => $value){
      if (empty ($value) && in_array($key, $required_fields)=== true){
        $errors[] = 'Fill in all required fields';
      }
    }
    if(cell($_POST['cellname'],'newcell_tb') === true){
      $errors[] = 'Cell Already exists';}
          if(strlen($_POST['phone']) < 11){
            $errors[] = 'A Valid Phone Number is required';
          }
          if(empty($_POST['hostphone']) === false && strlen($_POST['hostphone']) < 11){
            $errors[] = 'A Valid Phone Number is required on the second phone number field';
          }
          if (empty($_POST) === false && empty($errors) === true ){
            if ($rol === "Administrator"){
              $register_data = array(
                'cellname'  => $_POST['cellname'],
                'celladdress'   => $_POST['celladdress'],
                'map'   => $_POST['map'],
                'cellleader'     => $_POST['cellleader'],
                'phone'     => $_POST['phone'],
                'gender'      => $_POST['gender'],
                'marital'     => $_POST['marital'],
                'hostname'       => $_POST['hostname'],
                'hostphone'    => $_POST['hostphone'],
                'area'       => $_POST['area'],
                'referal'   => $name   
              );}
              else{
                $register_data = array(
                  'cellname'  => $_POST['cellname'],
                  'celladdress'   => $_POST['celladdress'],
                  'map'   => $_POST['map'],
                  'cellleader'     => $_POST['cellleader'],
                  'phone'     => $_POST['phone'],
                  'gender'      => $_POST['gender'],
                  'marital'     => $_POST['marital'],
                  'hostname'       => $_POST['hostname'],
                  'hostphone'    => $_POST['hostphone'],
                  'area'        => ($area),
                  'referal'   => $name   
            );}
              register($register_data);
              header('Location: registercell.php?success');
              exit();
          }
    else if(empty($errors) === false){ ?>
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
    <span class="black-text right" style='font-size:20px'> 
    <?php
        if(isset ($_GET['success']) && empty ($_GET['success']) ){
        echo 'You\'ve Successfully Registered a Cell';
        }
        ?>
    </span>
    <div id="new_register" class="new_register">
  <form class="new_register-content" method="post" action="">
    <div class="container" style="font-size:18px">
        <h1 style="font-size:40px" id='newreg'>New Cell</h1>
        <p style="font-size:20px" id="membernote">Please fill in this form to register a New Cell</p>
        <hr>
        <div class="row">
          <div class=" worker input-field col s12">
            <input type="text" placeholder="Enter Name Of Cell" name="cellname" required>
          </div>
          <div class=" worker input-field col s12">
            <input type="text" placeholder="Enter Cell Address" name="celladdress" required>
          </div>
        </div>
        <div class="row">
          <div class=" worker input-field col s12">
            <input type="text" placeholder="Enter Cell Map" name="map">
          </div>
        </div>
        <div class="row">
          <div class=" worker input-field col s12">
            <input type="text" placeholder="Enter Name Of Cell Leader" name="cellleader" required>
          </div>
          <div class=" worker input-field col s12">
            <input type="number" placeholder="Enter Cell Leader's Phone Number" name="phone" required>
          </div>
        </div>
        <div class="row">
          <div class="worker input-field col s12" >
            <select class="browser-default" name="gender" required>
            <option value="" disabled selected>Select Gender Of Cell Leader</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            </select>
          </div>
          <div class="input-field col s12" >
            <select class="browser-default" name="marital" required>
            <option value="" disabled selected>Marital Status Of Cell Leader</option>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
            <option value="separated">Separated</option>
            </select>
          </div>
          <div class=" worker input-field col s12">
            <input type="text" placeholder="Enter Name Of Cell Host" name="hostname" required>
          </div>
          
        </div>
        <div class="row">
            <div class="worker input-field col s12">
              <input type="text" placeholder="Enter Phone Number Of Cell Host" name="hostphone" required>
            </div>
            <div class="worker input-field col s12">
              <?php $area = getarea();?>
              <select class="browser-default" name="area" required>
              <option value=""disabled selected>Area</option>
              <?php foreach ($area as $option): ?>
              <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
              <?php endforeach;?> 
              </select>  
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