<form  name="regform" id="regform" action="ajax/staff_update.php" method="post">
    <input type="hidden" name="prn" value='<?php echo $id; ?>' />
    <div class="form-group">
        <label for="login_input_fname" >First Name</label>
        <input type="text" class="form-control" placeholder="<?php echo $fname; ?> " id="login_input_fname" name="fname" />
    </div>
    <div class="form-group">
        <label for="login_input_lname" >Last Name</label>
        <input type="text" class="form-control" placeholder="<?php echo $lname; ?> " id="login_input_lname" name="lname" />
    </div>
    <div class="form-group">
        <label for="login_input_password">Reset Password</label>
        <input type="password" class="form-control" placeholder="Enter new password here...." id="login_input_password"  name="password_new" />
        <span class="help-block validMessage"></span>
    </div>


    <div class="form-group">
        <span class="help-block validMessage"></span>
        <label for="login_input_password_repeat">Retype password</label>
        <input type="password" class="form-control" placeholder="Confirm password....." id="login_input_password_repeat"  name="confirm_password" />

    </div>
    <div class="form-group">
        <label for="login_input_designation" >Designation</label>
        <input type="text" class="form-control" placeholder="<?php echo $desg ; ?> " id="login_input_designation" name="des" />
    </div>
    
    <div class="form-group">
        <label for="login_input_email" >Email</label>
        <input class="form-control" id="login_input_email" placeholder="<?php echo $email; ?> " name="email" type="text" />
    </div>
    <div class="footer">
        <div class="box-footer"> <button type="submit" class="btn btn-primary btn-group-justified" name="register" id="multi-post" >Update</button>	  </div>
    </div>
</form>
<div id="multi-msg"></div>

