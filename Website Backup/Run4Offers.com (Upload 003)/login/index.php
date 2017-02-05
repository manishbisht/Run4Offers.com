<?php
//include config
require_once("../php/config.php");

//if not logged in starts Guest Sesssion
if(!$user->is_logged_in()){ 
   $_SESSION['email']="Guest";
   $_SESSION['number']="9876543210"; 
}

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: ../index.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if($user->login($email,$password)){ 
		$_SESSION['email'] = $email;
		header('Location: ../index.php');
		exit;
	
	} else {
		$error[] = 'Wrong email or password or your account has not been activated.';
	}

}//end if submit

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to Continue | Run4Offers.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/header.css" rel="stylesheet">
<link href="../css/shopnow.css" rel="stylesheet">
<link rel="icon" 
      type="image/png"
      href="images/logo.png"
      sizes="32x32">
</head>

<body"> 
<center>
<header>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
   <div class="container navpad"> 
      <div class="navbar-header"> 
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
            <span class="sr-only">Toggle navigation</span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
         </button> 
         <a class="navbar-brand" href="../index.php"><font face="logo" style="font-size:30px;">Run<font style="font-family:coming">4</font>Offers.com</font></a> 
      </div> 
      <div class="collapse navbar-collapse" id="example-navbar-collapse"> 
         <ul class="nav navbar-nav"> 
            <li><a href="../search.php">Search</a></li>
            <li><a href="../shop now.php">Shop Now</a></li>
            <li><a href="../Gifts">Gifts Store</a></li>
            <li><a href="">Book Store</a></li>
            <li><a href="../About Us.php">About Us</a></li>
         </ul>
         <div align="right" style="margin-top:5px;margin-bottom:5px;color:#777;margin-right:10px">
         Logged in as <div class="user"><?php echo $_SESSION['email'] ?></div><br>
         <a href="../login/register.php">Register</a> | <a href="../login">Login</a> | <a href="../login/logout.php">Logout</a>
         </div>
      </div>
   </div>
</nav>
</header>
  
<div class="container">
	    <div class="col-md-6">
			<form role="form" method="post" action="" autocomplete="off" style="margin-bottom:150px;">
				<h2>Please Login</h2>
				<p><a href='../'>Back to home page</a></p>
				<hr>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				if(isset($_GET['action'])){
					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
							break;
					}

				}	
				?>
				<div class="form-group">
					<input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
			    <div class="col-md-12" style="padding:0" align="left">
				   <a href='reset.php'>Forgot your Password?</a>
				</div>
				<hr>
				<div class="col-md-6" style="padding:2px">
                   <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5">
				</div>
                <div class="col-md-6" style="padding:2px">
                   <a href="register.php" style="text-decoration:none">
                   <input type="register" name="register" value="Register Now" class="btn btn-primary btn-block btn-lg" tabindex="5"></a>
				</div>
			</form>
		</div>
</div>

<footer class="footer">
   <div class="container">
      <p class="text-muted"><strong>Keep in Touch with Us</strong></p>
      <a href="http://fb.me/run4offers">
      <img src="../images/fb2.jpg">
      </a>
      <p class="text-muted"><strong>Email : <a href="mailto:support@run4offers.com">support@run4offers.com</a><br>
      &copy; 2015 Run4Offers.com &middot; All Rights Reserved</strong></p>
   </div>
</footer>


</center>

<script src="../js/login.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
