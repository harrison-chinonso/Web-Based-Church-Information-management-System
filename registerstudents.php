<?php 
include 'includes/overall/overallworkheader.php';
include 'includes/discipleshiptopmenu.php';
?> 

<div id="workarea" class="col s12 m8 l10 ">
  <div class="card-panel mainwork">
    <div id="new_register" class="new_register">
    <form id="viewperson" class="new_register-content" name="viewperson">
       <div class="container" style="font-size:18px">
        <h1 style="font-size:30px" id='newreg'>View all DOMINION CITY ACADEMY Under-Gradutes</h1>
        <hr>   
        <div class="row">
          <div class="worker input-field col m3 s12">
                 <button onclick="showall(this.value,this.name)" value="allbasic" name="allbasic" class="all">Basic</button>
          </div>
          <div class="worker input-field col m3 s12">
                 <button onclick="showall(this.value,this.name)" value="allmat" name="allmat" class="all">Maturity</button>
          </div>
        </div>
      </div>
    </form>
    <br>
    <div id="txtHint"></div> 
  </div>
  </div>
</div>
</section>
<?php 
include 'includes/modaldiscipleship.php';
include 'includes/script.php'; ?>   

<script>
       $(document).ready(function(){
        var count = 1;
$(document).on('click','#save', function(){
        var names = [];
        var phone = [];
        var area = [];
        var reg_no = [];
        var regdate = [];
        var field = $('.regdate').attr('id');


        $('.names').each(function(){
            names.push(
                $(this).text());
        });
        $('.phone').each(function(){
            phone.push(
                $(this).text());
        });
        $('.area').each(function(){
            area.push(
                $(this).text());
        });
        $('.reg_no').each(function(){
            reg_no.push(
                $(this).text());
        });
        $('.regdate').each(function(){
            regdate.push(
                $(this).text());
        });
        $.ajax({
            url: "includes/insert.php",
            method:"POST",
            data:{names:names,phone:phone,area:area,reg_no:reg_no,regdate:regdate,field:field},
            success: function(data){
                alert(data);
            $("td[contenteditable='true']").text("");
            for (var i=2; i<= count; i++){
                $('tr#'+i+'').remove();
            }
            if(field != '' && field == 'basic_start'){
            showall('allbasic','allbasic');}
            else if (field != '' && field == 'mat_start'){
            showall('allmat','allmat');}
            }
        });
    });
});

function showall(value,name,id) {
    event.preventDefault();
    if (name ==="") {
        document.getElementById("txtHint").innerHTML = " ";
        document.getElementById("txtHint").style.display = "none";        
        return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && id == undefined ) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText; 
            }
            else if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && value == undefined ) {
                document.getElementById("person_details").innerHTML = xmlhttp.responseText; 
            }
        };

        if (name === "allbasic"){
        xmlhttp.open("GET","includes/loadTable.php?allbasic="+document.viewperson.allbasic.value,true);          
        }
        if (name === "allmat"){
        xmlhttp.open("GET","includes/loadTable.php?allmat="+document.viewperson.allmat.value,true);          
        }
        else if (name === 'view'){
        xmlhttp.open("GET","includes/fetch.php?id="+id,true);    
        }
        xmlhttp.send();
}
</script>
