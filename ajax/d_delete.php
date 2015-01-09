<div class="modal-dialog">
     
  
            <!-- /modal-header -->
       

              <?php 
                  ///fetch from DB
                  $id = $_GET['id']; 
                   

            require_once('config.php');

            $sql = "SELECT *
FROM action_tbl WHERE `action_id` ='" . $id . "';";
            $query = mysql_query($sql);
            while ($fetch = mysql_fetch_array($query)) {
                    
                    $action_id = $fetch['action_id'];
                    $prn = $fetch['prn'];
                    
            }
            


               ?>

          <!--put the result from DB here--->

         <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete Action against PRN : <?php echo $prn  ?> ACTION ID : <?php echo $id  ?></h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" id="<?php echo $action_id  ?>" name="yes" value="<?php echo $action_id  ?>" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
</div>
<script>
       
          $(document).ready(function(){
   $('.btn-success').click(function(){
       
        var id = $(this).attr('id');
       
        //alert(id);
        $.ajax({
            url: "ajax/d_deleteajax.php",
            type: "POST",
            data: {"delete": id},
            success: function(data){
                $('#myModal').modal('hide');
            }
        });
    });


});
 </script>