

        
   
      

        <?php
            ///fetch from DB
            $id = $_GET['id']; //to test it works with php GET

            require_once('config.php');

            $sql = "SELECT *
FROM action_tbl WHERE `action_id` ='" . $id . "';";
            $query = mysql_query($sql);
            while ($fetch = mysql_fetch_array($query)) {
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


           <!-- Main content -->
                <section class="content invoice col-centered">
                   
                    <!-- title row -->
                    <div class="row col-centered">
                        <div class="col-xs-12 ">
                            <h2 class="page-header">
                                <i class="fa fa-envelope-o"></i> Disciplinary Action Details Of PRN : <?php echo $prn; ?>
                                <button type="button" class="close no-print" data-dismiss="modal" aria-hidden="true">×</button>
                             </h2>
                        </div><!-- /.col -->
                    </div>
                

                    <!-- Table row -->
                    <div class="row col-centered">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Fields</th>
                                        <th>Details</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Student's Name</td>
                                        <td><?php echo $name;?></td>
                                       
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td><?php echo $department;?></td>
                                       
                                    </tr>
                                    
                                  
                  
                   
                                    
                                    
                                    <tr>
                                        <td>Enquiry Head </td>
                                        <td><?php echo "PRN  : ".$h_prn."  <br>NAME : ".$h_name."</br>";?></td>
                                       
                                    </tr>
                                  
                                    <tr>
                                        <td>Details Submitted by </td>
                                        <td><?php echo "PRN/USERNAME  : ".$staff_prn."  <br>NAME : ".$staff_name."</br>";?></td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td>Disciplinary Action</td>
                                        <td><?php echo $action;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Reason</td>
                                        <td><?php echo $reason;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Fine Amount</td>
                                        <td><?php echo $fine;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Fine Payment Date</td>
                                        <td><?php echo $fine_payment_date;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Incident Date</td>
                                        <td><?php echo $incident_date;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Action Taken Date</td>
                                        <td><?php echo $action_taken_date;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Punishment Duration</td>
                                        <td><?php echo $punishment_duration;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Punishment Duration(days)</td>
                                        <td><?php echo $punishment_duration;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td><?php echo $location;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Witness</td>
                                        <td><?php echo $witnesses;?></td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td>Current Status</td>
                                        <td><?php echo $status;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Added Date and Time</td>
                                        <td><?php echo $addedtime;?></td>
                                        
                                    </tr>
                
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <button class="btn btn-danger pull-right" data-dismiss="modal" ></i> Close</button>
                            
                        </div>
                    </div>
                </section><!-- /.content -->
       
           

        </div>
       
    </div>
</div>

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

        $("#regform").submit(function(e)
        {
            $("#multi-msg").html("<img src='loading.gif'/>");

            var formObj = $(this);
            var formURL = formObj.attr("action");
                      
            if (window.FormData !== undefined)  // for HTML5 browsers
//	if(false)
            {

                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
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

            $("#regform").submit();

        });
        

    });

</script>