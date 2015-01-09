
<div class="modal-dialog">

   
        
   
       

       <?php
            ///fetch from DB
            $id = $_GET['id']; //to test it works with php GET

            require_once('config.php');

            $sql = "SELECT *
FROM action_tbl WHERE `action_id` ='" . $id . "';";
            $query = mysql_query($sql);
            while ($fetch = mysql_fetch_array($query)) {
                    
                    $action_id = $fetch['action_id'];
                    $prn = $fetch['prn'];
                    $name = $fetch['name'];
                    $department = $fetch['department'];
                    $h_prn = $fetch['enqhead_prn'];
                    $h_name = $fetch['enqhead_name'];
                    $staff_prn = $fetch['faculty_prn'];
                    $staff_name = $fetch['faculty_name'];
                    $action = $fetch['action'];
                    $reason = $fetch['reason'];
                    $fine = $fetch['fine'];
                    $fine_payment_date = $fetch['fine_payment_date'];
                    $fine_payment_date = date('d-m-Y', strtotime( $fine_payment_date));
                    $incident_date = $fetch['incident_date'];
                    $incident_date = date('d-m-Y', strtotime( $incident_date));
                    $action_taken_date = $fetch['action_taken_date'];
                    $action_taken_date = date('d-m-Y', strtotime($action_taken_date));
                    $punishment_duration = $fetch['duration_days'];
                    $location = $fetch['location'];
                    $witnesses = $fetch['witnesses'];
                    $status = $fetch['status'];
                    $addedtime = $fetch['addedtime'];
            }
            
        ?>
            
            
               <div class="modal-dialog">
                   <div class="modal-content">
                 
                        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Edit Detail of Disciplinary Action against PRN : <?php echo $prn; ?> </h4>
     
                       

                  </div>

                    <div class="modal-body">

               <!-- form start -->
                        <form  class="form" id="damform" action="ajax/dupdate_class.php" method="post">

                         
                                <div class="form-group">
                                    <label for="e_prn" >Enquiry Head's PRN</label>

                                    <input type="text" class="form-control" placeholder="<?php echo $h_prn; ?>" id="e_prn" name="h_prn" />

                                </div>

                                <div class="form-group">

                                    <label for="login_input_hname" >Enquiry Head's Name</label>

                                    <input type="text" class="form-control" placeholder="<?php echo $h_name; ?>" id="login_hname" name="h_name" />

                                </div>
                                <div class="form-group">
                                    <label for="action" >Disciplinary Action</label>

                                    <input type="text" class="form-control" placeholder="<?php echo $action; ?>" id="action" name="action" />

                                </div>
                                <div class="form-group">
                                    <label for="reason" >Reason</label>

                                    <input type="text" class="form-control" placeholder="<?php echo $reason; ?>" id="fine" name="reason" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fine</label>
                                    <div class="inputContainer">
                                        <input class="form-control" name="fine" placeholder="<?php echo $fine; ?>" type="number" data-bv-integer-message="The value is not an integer" />
                                    </div>
                                </div>   


                           

                                <div class="form-group">
                                    <label class="control-label">Fine payment date</label>
                                    <div class="dateContainer">
                                        <div class="input-group date" id="datetimePicker">
                                            <input type="text" id="cal" class="form-control" name="fine_payment_date" placeholder="<?php echo $fine_payment_date; ?>" />
                                            <span class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Incident Date</label>
                                    <div class="dateContainer">
                                        <div class="input-group date" id="datetimePicker">
                                            <input type="text" id="cal" class="form-control" name="incident_date" placeholder="<?php echo $incident_date; ?>" />
                                            <span class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Action taken date</label>
                                    <div class="dateContainer">
                                        <div class="input-group date" id="datetimePicker">
                                            <input type="text" id="cal" class="form-control" name="action_taken_date" placeholder="<?php echo $action_taken_date; ?>" />
                                            <span class="input-group-addon"><span  class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>





                                <div class="form-group">
                                    <label for="action_taken_date" >Punishment duration (optional)</label>

                                    <input type="text" class="form-control" placeholder="<?php echo $punishment_duration; ?> days" id="action_taken_date" name="punishment_duration" />

                                </div>
                                <div class="form-group">
                                    <label for="location" >location</label>

                                    <input type="text" class="form-control" placeholder="<?php echo $location; ?>" id="location" name="location" />

                                </div>
                                <div class="form-group">
                                    <label for="witnesses" >witnesses </label>
                                    <input type="text" class="form-control" placeholder="<?php echo $witnesses; ?>" id="location" name="witnesses" />

                                </div>

                                <div class="form-group">
                                    <label for="login_input_status">Status (currently <?php echo $status; ?>)</label>


                                    <select class="form-control" placeholder="User Status" id="status" name="status"  >
                                        <option value='pending' >Pending</option>
                                        <option value='enquiry' >Enquiry</option>
                                        <option value='completed' >Completed</option>
                                    </select>

                                </div>
                          
 <input type="hidden" name="action_id" value='<?php echo $action_id; ?>' />
 <input type="hidden" name="prn" value='<?php echo $prn; ?>' />
                          
                          
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary btn-group-justified" name="register" id="multi-post" >Update</button>
                                </div>
 
                        </form><!-- /student -->


       <div id="multi-msg"></div>
           
        </div>
        </div>
       
    </div>

<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script-->
    
    
    <script type="text/javascript">
$(function() {
    var temp="<?php echo $status; ?>"; 
    $("#status").val(temp);
});



      




    </script>
    
<script>
    $(document).ready(function()
    {
         

        function getDoc(frame) {
            var doc = null;

            // IE8 cascading access check
            try {
                if (frame.contentWindow) {
                    doc = frame.contentWindow.document;
                }
            } catch (err) {
            }

            if (doc) { // successful getting content
                return doc;
            }

            try { // simply checking may throw in ie8 under ssl or mismatched protocol
                doc = frame.contentDocument ? frame.contentDocument : frame.document;
            } catch (err) {
                // last attempt
                doc = frame.document;
            }
            return doc;
        }

        $("#damform").submit(function(e)
        {
            $("#multi-msg").html("<img src='ajax/ajax-loader.gif'/>");

            var formObj = $(this);
            var formURL = formObj.attr("action");
                      
            if (window.FormData !== undefined||false)  // for HTML5 browsers
//	if(false)
            {

                var formData = new FormData(this);
                $.ajax({
                    url: "ajax/dupdate_class.php",
                    type: 'POST',
                    data: formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR)
                    {
                        $("#multi-msg").html('<pre><code>' + data + '</code></pre>');
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $("#multi-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus=' + textStatus + ', errorThrown=' + errorThrown + '</code></pre>');
                    }
                });
                e.preventDefault();
                e.unbind();
            }
            else  //for olden browsers
            {
                //generate a random id
                var iframeId = 'unique' + (new Date().getTime());

                //create an empty iframe
                var iframe = $('<iframe src="javascript:false;" name="' + iframeId + '" />');

                //hide it
                iframe.hide();

                //set form target to iframe
                formObj.attr('target', iframeId);

                //Add iframe to body
                iframe.appendTo('body');
                iframe.load(function(e)
                {
                    var doc = getDoc(iframe[0]);
                    var docRoot = doc.body ? doc.body : doc.documentElement;
                    var data = docRoot.innerHTML;
                    $("#multi-msg").html('<pre><code>' + data + '</code></pre>');
                });

            }

        });


        $("#multi-post").click(function()
        {

            $("#damform").submit();

        });
        

    });

</script>