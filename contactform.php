
<?php
 include 'core/init.php';  
 include 'includes/overall/overallsubheader.php'; 
 ?>
 <div class="container">
      <div class="row">
          <div class="col m8"> 
            <form action="" method="POST">
              <input type="text" id="fname" name="firstname" placeholder="Your Firstname.." required>

              <input type="text" id="lname" name="lastname" placeholder="Your Lastname..">

              <input type="number" id="phoneno" name="phone" placeholder="Your Phone Number.." required>

              <input type="number" id="phoneno2" name="phone2" placeholder="Another Phone Number if any..">

              <input type="text" id="email" name="email" placeholder="Your Email Address..">

              <label for="subject">Leave us a Note (Prayer Point, Suggestion, Feedback, Testimony)</label>
              <textarea id="feedback" name="feedback" placeholder="Write Us a Feedback or Prayer Point...." style="height:200px"></textarea>
              <input type="submit" value="Submit" class="btn large blue">
            </form>
          </div>

          <div class="col m4">
            <img src="img/p.jpg" alt="display" style="width:100%; height:500px">
          </div>
      </div>
</div>


<?php
 include 'includes/overall/overallfooter.php'; 
 ?>