<div class="modal-dialog">
     
  
            <!-- /modal-header -->
       

              <?php 
                  ///fetch from DB
                  $id = $_GET['id']; //to test it works with php GET

               ?>

          <!--put the result from DB here--->

         <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete <?php echo $id ?> </h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete <?php echo $id ?> Account?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" id="<?php echo $id ?>" name="yes" value="<?php echo $id ?>" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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
            url: "ajax/deleteajax.php",
            type: "POST",
            data: {"delete": id},
            success: function(data){
                
            }
        });
    });


});
 </script>