<?php require('../php/config.php'); 

//if not logged in starts Guest Sesssion
if(!$user->is_logged_in()){ 
   $_SESSION['email']="Guest";
   $_SESSION['number']="9876543210"; 
}

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: ../index.php'); } 

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM members WHERE resetToken = :token');
$stmt->execute(array(':token' => $_GET['key']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//if no token from db then kill the page
if(empty($row['resetToken'])){
	$stop = 'Invalid token provided, please use the link provided in the reset email.';
} elseif($row['resetComplete'] == 'Yes') {
	$stop = 'Your password has already been changed!';
}

//if form has been submitted process it
if(isset($_POST['submit'])){

	//basic validation
	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		try {

			$stmt = $db->prepare("UPDATE members SET password = :hashedpassword, resetComplete = 'Yes'  WHERE resetToken = :token");
			$stmt->execute(array(
				':hashedpassword' => $hashedpassword,
				':token' => $row['resetToken']
			));

			//redirect to index page
			header('Location: login.php?action=resetAccount');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Reset Account';
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pssword Reset | Account Reset | Login to Continue | Run4Offers.com</title>
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
	    	<?php if(isset($stop)){

	    		echo "<p class='bg-danger'>$stop</p>";

	    	} else { ?>

				<form role="form" method="post" action="" autocomplete="off">
					<h2>Change Password</h2>
					<hr>

					<?php
					//check for any errors
					if(isset($error)){
						foreach($error as $error){
							echo '<p class="bg-danger">'.$error.'</p>';
						}
					}

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
					}
					?>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1">
					</div>
					<div class="form-group">
						<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="1">
					</div>
					<hr>
					<div class="col-md-6" style="padding:0">
                       <input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
					</div>
				</form>

			<?php } ?>
		</div>
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
