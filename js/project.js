
$(document).ready(function(){
    $('.datepicker').datepicker();
    $('.timepicker').timepicker();
    $('.materialboxed').materialbox();
    $('.scrollspy').scrollSpy();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.modal').modal();
});

// Get the modal
var login = document.getElementById('login');
var signup = document.getElementById('signup');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == login) {
        login.style.display = "none";
    }
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == signup) {
       signup.style.display = "none";
    }
}
// document.addEventListener('DOMContentLoaded', function() {
//     var elems = document.querySelectorAll('.dropdown-trigger');
//     var instances = M.Dropdown.init(elems, options);
//   });
$(document).ready(function(){
 $('.dropdown-trigger').dropdown();
});







  
  




