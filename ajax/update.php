
<div class="modal-dialog">

    <div class="modal-content">
        
   <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Edit <?php $_GET['id'] ?> Detail</h4>
        </div>
        <div class="modal-body">

        <?php
            
            if (version_compare(PHP_VERSION, '5.3.7', '<')) {
   exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {

   require_once("libraries/password_compatibility_library.php");
}
            
            
            
            
            ///fetch from DB
            $id = $_GET['id']; //to test it works with php GET

            require_once('config.php');

            $sql = "SELECT *
FROM users WHERE prn='" . $id . "';";
            $query = mysql_query($sql);
            while ($fetch = mysql_fetch_array($query)) {
                $sel = $fetch["actype"];
            }
            if ($sel == 'admin') {
                $tbl = "admin_tbl";

                $sql = "SELECT *
FROM " . $tbl . " WHERE prn='" . $id . "';";
                $query = mysql_query($sql);
                while ($fetch = mysql_fetch_array($query)) {
                    $fname = $fetch["fname"];
                    $lname = $fetch["lname"];
                    $email = $fetch["email"];
                    $desg = $fetch["designation"];
                }
                include("admin.php");
            } else if ($sel == 'Student') {
                $tbl = "student_tbl";

                $sql = "SELECT *
FROM " . $tbl . " WHERE prn='" . $id . "';";
                $query = mysql_query($sql);
                while ($fetch = mysql_fetch_array($query)) {
                    $fname = $fetch["fname"];
                    $lname = $fetch["lname"];
                    $email = $fetch["email"];
                    $dep = $fetch["department"];
                    $adyear = $fetch["admission_year"];
                }
                include("student.php");
            } else if ($sel == 'Staff') {
                $tbl = "staff_tbl";

                $sql = "SELECT *
FROM " . $tbl . " WHERE prn='" . $id . "';";
                $query = mysql_query($sql);
                while ($fetch = mysql_fetch_array($query)) {
                    $fname = $fetch["fname"];
                    $lname = $fetch["lname"];
                    $email = $fetch["email"];
                    $dep = $fetch["department"];
                    $desg = $fetch["designation"];
                }
                include("staff.php");
            }
        ?>


       <div id="multi-msg"></div>
           

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
            $("#multi-msg").html("<img src='ajax/ajax-loader.gif'/>");

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