 <!-- Navigation starts here -->
<header id="home" class="navbar-fixed scrollspy">
    <nav >
      <div class="nav-wrapper blue darken-4">
        <div class="container">
          <a href="index.php" class="brand-logo">Dominion City <span style="color:rgb(150, 150, 146); font-size:22px;font-weight:bolder;">Okota.</span></a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger" style="font-size: 25px;">&#9776;</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php"><i class=" fa fa-home fa-3x"></i></a></li>
          </ul>
        </div>
        </div>
      </nav>
</header>
<!-- Mobile Navigation -->
<ul id="mobile-nav" class="sidenav">
                <li>
                <div class="user-view">
                <div class="background">
                  <img src="img/p.jpg">
                </div>
                <a href="#user"><img class="circle" src="img/images.jpg"></a>
                <h5>Hello!</h5>
                <p id="loggedin-user" style="font-size:20px;">
                <?php
                if(isset($_SESSION['id'])){
                  $value = $_SESSION['id'];
                  $name = getname($value);
                  echo $name;
                }
                ?>
                </p>
                </div>
                </li>
              <li><div class="divider  lighten-1"></div></li>
              <li style="color:white;"><a href="index.php" ><i class="fa fa-home fa-2x" ></i>Home</a></li>
              <li><div class="divider  lighten-1"></div></li>
              <li style="color:white;"><a href="../DcOkota/loggedout.php" ><i class="fa fa-sign-out fa-2x" ></i>Log Out</a></li>
              <li><div class="divider  lighten-1"></div></li>
</ul> 