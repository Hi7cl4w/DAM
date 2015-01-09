
<html>
<head>
<title>Disciplinary Action Management</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<noscript>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-wide.css" />
<link rel="stylesheet" href="css/style-noscript.css" />
</noscript>
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.dropotron.min.js"></script>
<script src="js/jquery.scrolly.min.js"></script>
<script src="js/jquery.scrollgress.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-layers.min.js"></script>
<script src="js/init.js"></script>
</head><body class="index">

<!-- Header -->
<header id="header" class="alt">
  <h1 id="logo"><a href="index.php">Home </a></h1>
  <nav id="nav">
    <ul>
      <li class="current"><a href="index.html">Welcome</a></li>     
    </ul>
  </nav>
</header>

<!-- Banner -->
<section id="banner"> 
  
 
  <div class="inner">
   <div class="errormsg" >
  <?php

	if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
		
            echo $error;
		
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
		$msg="errormsg";
		
            echo $message;
			
        }
    }
}
?>
</div>
     
    
    <div class="btn_style bg">
      <h4>log in</h4>
    </div>
    <div class="login_form"> <a>
      <form name="form1" method="post" action="index.php" >
        <span>PRN or Username</span>
        <input id="login_input_username" class="login_input" type="text" name="prn" value="PRN or Username" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'PRN or Username';}"  required />
        <span class="top"  >password</span>
		 <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
        
        <div class="buttons">
          <button class="bg1" type="submit" name="login" value="Log in" >Log in</button>
		  
        </div>
		
      </form>
    </div>
    
  </div>
 
</section>
</body></html>
