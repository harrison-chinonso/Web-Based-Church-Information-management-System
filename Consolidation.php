<?php 
ob_start();
include 'includes/overall/overallworkheader.php';
$id = $_SESSION['id'];
$namearray = referal($id);
$name = $namearray[0];
$rol = $namearray[1];
$area = $namearray[2];
?>
<div id="workarea" class="col s12">
<a href="work.php"><i class=" fa fa-reply fa-2x"></i></a>
    <br>
    <br>
      <div class="row">
            <div class="col m1 s4">
                <form style="margin:0px; padding:0px;" action="get">
                    <?php $newarea = getarea();?>
                    <?php foreach ($newarea as $option): ?>
                    <p style="margin:0.5px;">
                        <label style:"margin:0px; padding:0px;">
                            <input value="<?php echo $option->area;?>" class="with-gap" name="area" type="radio"/>
                            <span><?php echo $option->area;?></span>
                            <?php endforeach;?>
                        </label>
                    </p>
                </form>   
            </div>
            <div class="col m11 s8">
               <div style="margin:0px;" class="mainwork">
                   <div style="width:100%; margin-bottom:0px;" class="usercontainer">   
                      <h4 align="center">MVP Consolidation Report</h4>
                      <table id="crud_table" style='overflow:auto;margin-top:0px;' class='striped responsive-table'></table>
                   </div>
              </div>
            </div>
 </div>
 </div>
</section>
<?php 
include 'includes/script.php'; 
ob_end_flush();
?>
<script>
$(document).on('change','input[name="area"]:checked', function(){
    var area = $(this).val();
    $.ajax({
     url: "includes/loadTable.php",
     type: "POST",
     datatype: "JSON",
     data: {area:area},
     success: function(data){
    $('#crud_table').html(data);
     }
    }) 
 });
</script>