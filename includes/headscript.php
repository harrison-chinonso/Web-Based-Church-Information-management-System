<script src="js/jquery.min.js"></script>
<script src="js/project.js"></script>
<script src="js/discipleship.js"></script>
<script src="js/materialize.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/filter.js"></script>
    
<script>
    new WOW().init();
//Display work menu return button When Logged in
    var link = document.getElementById('worklink');
    var links = document.getElementById('worklinks');
    var cm = document.getElementById('text').innerText;
    var inn = "Logged in";
    var out = "Not logged in";

    if (cm === inn) {
       link.style.display = "block";
       links.style.display = "block";
    }
    else
    {
        link.style.display = "none";
        links.style.display = "none";
    }
</script> 

