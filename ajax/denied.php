<div class="modal-dialog">
     
  
            
              <?php 
                  ///fetch from DB
                  $id = $_GET['id']; //to test it works with php GET
                  $type = $_GET['type']; //to test it works with php GET

               ?>

          

         <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading"> <?php echo "USERNAME:".$id ?>   </h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> You are not authorised to perform this action<?php echo "<p><br>USERNAME: ".$id."</br><br> ACTION TYPE: ".$type."</br></p> "?> </div>
       
      </div>
        <div class="modal-footer ">
        
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
      </div>
        </div>
		</div>
