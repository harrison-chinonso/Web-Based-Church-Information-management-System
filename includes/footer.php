<!-- Footer begins -->
<footer id="contact" class="page-footer blue darken-4">
    <div class="container ">
      <div class="row  ">
        <div class="col l6 s12 contact">
          <h3 class="white-text">Dominion City, Okota.</h3>
          <p class="-text text-lighten-4"><i class=" fa fa-home fa-2x"></i> 148 Okota Road, Beside UBA, Opposite Macrich Gas, Cele Bustop, Okota,Lagos.</p>
          <p class="-text text-lighten-4"><i class=" fa fa-phone fa-2x"></i> 08135462841, 09082215906</p>
          <p class="-text text-lighten-4"><i class=" fa fa-envelope fa-2x"></i> info@stpmedia.net </p>
        </div>
        <div class="col l4 offset-l2 s12 contact">
          <h5 class="white-text">Follow Us on Social media:</h5>
          <ul>  
            <li><a class="-text text-lighten-3 fa fa-whatsapp fa-3x li" href="#!"></a></li>
            <li><a class="-text text-lighten-3 fa fa-instagram fa-3x in" href="#!"></a></li>
            <li><a class="-text text-lighten-3 fa fa-twitter fa-3x tw" href="#!"></a></li>
            <li><a class="-text text-lighten-3 fa fa-facebook fa-3x g" href="#!"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container right">
      © Beuhier.org 2018. All rights reserved.
      <p class="right" id="text" style="font-size:5px">
      <?php 
            if(isset ($_SESSION['id'])){
                 echo 'Logged in';
                }else{
                   echo 'Not logged in';
          } ?>
      </p>
      </div>
    </div>
  </footer>