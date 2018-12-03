<!-- Register begins -->
<!-- The Modal (contains the Sign Up form) -->
<div id="signup" class="signup">
        <form class="signup-content" method="post" action="registercheck.php?newuser">
            <div class="container" style="font-size:15px">
            <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1 id='newuser'>New User</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <input type="text" placeholder="Enter Username" name="username" required>

            <input type="text" placeholder="Enter Email" name="email" required>
            
            <input type="text" placeholder="Enter Firstname" name="fname" required>
            
            <input type="text" placeholder="Enter Lastname" name="lname" required>

            <input type="password" placeholder="Enter Password" name="psw" required>
      
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            
            <div class="input-field col s12" >
            <select class="browser-default" name="rol" required>
              <option value="" disabled selected>Select Role</option>
              <option value="Pastor">Administrator</option>
              <option value="Area Cordinator">Area Cordinator</option>
              <option value="Cell Leader">Cell Leader</option>
              <option value="Head Of Department">Head Of Department</option>
              <option value="DCA Staff">DCA Staff</option>
              <option value="Mvp Personnel">Mvp Personnel</option>
            </select>
            </div>
            <div class=" worker input-field col s12">
              <?php $area = getarea();?>
              <select class="browser-default" name="area" required>
                <option value=""disabled selected>Area</option>
                <?php foreach ($area as $option): ?>
                <option value="<?php echo $option->area;?>"><?php echo $option->area;?></option>
                <?php endforeach;?> 
              </select>  
            </div> 
              <div class=" worker input-field col s12">
                  <?php $cell = getCell();?>
                  <select class="browser-default" name="cellname" required>
                      <option value=""disabled selected>Cell</option>
                      <?php foreach ($cell as $option):?>
                      <option value="<?php echo $option->cellname;?>"><?php echo $option->cellname;?></option>
                      <?php endforeach;?> 
                  </select>  
              </div>
      
            <label>
              <input type="checkbox" class="filled-in" name="agree" style="margin-bottom:15px"> <span id="spanreg" >By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</span>
            </label>
            <button type="submit" class="signup">Register</button>
          </div>
        </form>
      </div>
  </section>