<?php
ob_start();
 include 'core/init.php';  
 include 'includes/overall/overallmainheader.php'; 
 ?>
 <div class="cellcontainer" style="margin:3px 0px;padding:0px; width:100%;">
      <div class="row" style="margin:0px;padding:0px; width:100%;">
          <div class="col m6" style="font-size:20px;"> 
            <label style="font-size:20px" for="subject">Select a Cell Location of your Interest</label>
            <br>
            <div class="col m6 s12">
                <select class="browser-default" name="area" id="area">
                    <option value="" disabled selected>Select Axis of Interest</option>
                    <option value="Ago 1">Ago (Before Century)</option>
                    <option value="Ago 2">Ago (After Century)</option>
                    <option value="Ago 3">Ago (After Lord's Bustop)</option>
                    <option value="Ajegunle">Ajegunle</option>
                    <option value="Ejigbo">Ejigbo</option>                                    
                    <option value="Ijesha">Ijesha</option>
                    <option value="Ikotun">Ikotun</option> 
                    <option value="Ilasa">Ilasa</option>
                    <option value="Isheri">Isheri</option>
                    <option value="Isolo">Isolo</option>
                    <option value="Jakande">Jakande</option>
                    <option value="Lawanson">Lawanson</option>
                    <option value="Mafoluku">Mafoluku</option>
                    <option value="Oke Afa">Oke Afa</option>
                    <option value="Okota">Okota</option> 
                    <option value="Others">Others</option>
                </select>
            </div>
            <br>
            <br>
            <div class="mapview"></div>
          </div>
        <div class="col m6">
        <form class="new_register-content" action="" method="post">
            <label style="font-size:30px" for="subject">Let's contact you</label>
                <input type="text" id="fname" name="firstname" placeholder="Your Name.." required>

                <input type="number" id="phoneno" name="phone" placeholder="Your Phone Number.." required>

                <input type="text" id="email" name="email" placeholder="Your Email Address..">

                <textarea id="feedback" name="feedback" placeholder="Leave Us A Note...." style="height:100px"></textarea> <br>
                <input type="submit" value="Submit" class="btn large blue">
        </form>
        </div>
    </div>
</div>
<?php
include 'includes/overall/overallfooter.php'; 
include 'includes/script.php'; 
ob_end_flush();
?>
<script>
$('select').change(function(){
    var area = $(':selected').val();
    $.ajax({
     url: "includes/fetch.php",
     type: "POST",
     datatype: "JSON",
     data: {area:area},
     success: function(data){
    $('.mapview').html(data);
     }
    }) 
 });
</script>