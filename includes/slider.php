<section style="min-height:500px;" id= "pixs">
            <div class="slide-container">
                <div class="mySlides fade"></div>
            </div>
</section>

<script>
  window.onload = showSlides();
var usedSlides = new Array(10);
function showSlides() {
var i;
var slideIndex=0;

var pix = new Array ("img/bg1.jpg","img/bg2.jpg","img/bg3.jpg","img/bg4.jpg","img/bg5.jpg","img/bg6.jpg","img/bg7.jpg","img/bg8.jpg","img/bg9.jpg");
var dots = document.getElementsByClassName("dot");

       for (i = 0; i < pix.length; i++) {
        var apix = Math.floor(Math.random() * pix.length);
        document.getElementById("pixs").style.background = "url("+pix[apix]+")";  
        document.getElementById("pixs").style.backgroundRepeat = "no-repeat";
        document.getElementById("pixs").style.backgroundSize = "cover";
        document.getElementById("pixs").style.backgroundPosition = "center";
    }
    setTimeout(showSlides, 4000); //Change image every 2 seconds
}
</script>
