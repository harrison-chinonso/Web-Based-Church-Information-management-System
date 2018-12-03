
<!-- Login begins -->
<div id="login" class="login">
  <form class="login-content animate" method="post" action="logincheck.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/avatar2.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
      <input type="text" placeholder="Enter Username" name="uname" required>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <button class="submit" type="submit">Login</button>
      <?php
       echo output_error($errors);
      ?>
      <label>
      <input type="checkbox" class="filled-in"  name="remember"><span id="spanreg">Remember me</span>
      <span class="psw">Forgot <a href="#">password?</a></span>
      </label>
    </div>
    </div>
  </form>
</div>

