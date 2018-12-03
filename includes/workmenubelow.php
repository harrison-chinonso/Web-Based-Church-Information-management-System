  <?php
if(logged_in()){
  $profilepix = get_image();   
 }
 ?>
 
 <div id="profilepage" class="col s12 m12 l2  profile">
    <div class="card">
        <div class="card-image">
          <img style="height:250px;" alt="profile picture" <?php echo"src='img/".$profilepix."'"?>>
        </div>
        <div class="card-content">
          <h5 style="margin-top:5px;">Hello!</h5>
          <p id="loggedin-user" style="font-size:20px; ">
          <?php
          if(isset($_SESSION['id'])){
            $value = $_SESSION['id'];
            $name = getname($value);
            echo $name;
            }
          ?>
          </p>
        </div>
        <div class="card-action white" style="font-weight:bold; padding:20px 0px 5px 15px;">
          <a id="userupdatelink" onclick="document.getElementById('userdetail').style.display='block'">Update User Profile</a>  
        </div>
        <div class="card-action white" style="font-weight:bold; padding:20px 0px 5px 15px;">
          <a id="userpassordlink" onclick="document.getElementById('changepassword').style.display='block'">Change Password</a>  
        </div>
        <div class="card-action white" style="font-weight:bold; padding:20px 0px 5px 15px;">
          <a id="userpixlink" onclick="document.getElementById('changepicture').style.display='block'">Update User Photo</a>  
        </div>
        <div class="card-action white" style="font-weight:bold;padding:15px 0px 5px 60px;">
        <a href="../DcOkota/loggedout.php">Log Out</a>
        </div>
        
  </div>
</div>

        <?php
          if(isset($_SESSION['id'])){
            $value = $_SESSION['id'];
            $user = referal($value);
            $fname = $user[0];
            $lname = $user[3];
            $email = $user[5];
            $rol = $user[1];
            $area = $user[2];
            $pass = $user[4];
            }
          ?>

<div id="userdetail" class="signup" style="height:72%;  margin-top:40px; background:white;left: 24.2%;">
        <form class="signup-content" method="post" action="registercheck.php?upuser" id="userdetailschange">
            <div class="container" style="font-size:15px">
            <span onclick="document.getElementById('userdetail').style.display='none'" class="close" title="Close Modal">&times;</span>              
            <h1 id='newuser'>User Details</h1>
            <p>Please alter content of field you wish to update</p>
            <hr>
            <input id="picture" type="text" placeholder="Enter Firstname" name="fname" required value="<?php echo $fname?>">
            
            <input type="text" placeholder="Enter Lastname" name="lname" required value="<?php echo $lname?>">


            <input type="text" placeholder="Enter Email" name="email" required value="<?php echo $email?>">
           
            <div class=" worker input-field col s12">
              <?php $area = getarea();?>
              <select class="browser-default" name="area" required>
              <option value=""disabled selected>Area</option>
              <?php foreach ($area as $option): ?>
              <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
              <?php endforeach;?> 
              </select>  
              </div>
            <button id="update" style="font-weight:bolder; font-size:20px;" type="submit" class="signup">Update</button>
          </div>
        </form>
      </div>

      <div id="changepassword" class="signup" style="height:57%; margin-top:40px; background:white;left: 24.2%;">
        <form class="signup-content" method="post" action="registercheck.php?changepass" id="userpasschange">
            <div class="container" style="font-size:15px">
            <span onclick="document.getElementById('changepassword').style.display='none'" class="close" title="Close Modal">&times;</span>              
            <h1 id='newuser'>Change Password</h1>
            <p>Please provide details in field to change password.</p>
            <hr>
            <input type="password" placeholder="Enter Current Password" name="cpsw" required>
            <input type="password" placeholder="Enter New Password" name="psw" required>
      
            <input type="password" placeholder="Repeat New Password" name="psw-repeat" required>
      
            <button id="pass" style="font-weight:bolder; font-size:20px;" type="submit" class="signup">Change</button>
          </div>
        </form>
      </div>


      <div id="changepicture" class="signup" style="height:40.5%; margin-top:40px; background:white;left: 24.2%;">
        <form class="signup-content" method="post" action="registercheck.php?uppix" enctype="multipart/form-data" id="userpixchange">
            <div class="container" style="font-size:15px">
            <span onclick="document.getElementById('changepicture').style.display='none'" class="close" title="Close Modal">&times;</span>              
            <h1 id='newuser'>Change Profile Picture</h1>
            <p>Please select a jpeg picture.</p>
            <hr>
            <input id="pix" type="file" placeholder="Select a picture" name="dp" required>
      
            <button style="font-weight:bolder; font-size:20px;" type="submit" class="signup">Upload</button>
          </div>
        </form>
      </div>
  </section>

<script>
function myFunction(x) {
    if (x.matches) { // If media query matches
        document.getElementById('profilepage').style.display = "none";
    } else{
        document.getElementById('profilepage').style.display = "block";
    }
}

var x = window.matchMedia("(max-width: 990px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes


</script>


  