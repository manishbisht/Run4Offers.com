<?php require('../php/config.php'); 

//if not logged in starts Guest Sesssion
if(!$user->is_logged_in()){ 
   $_SESSION['email']="Guest";
   $_SESSION['number']="9876543210"; 
}

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: ../index.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	//very basic validation
	if(strlen($_POST['number']) < 10){
		$error[] = 'Enter correct Mobile Number.';
	} else {
		$stmt = $db->prepare('SELECT number FROM members WHERE number = :number');
		$stmt->execute(array(':number' => $_POST['number']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['number'])){
			$error[] = 'Mobile Number provided is already in use.';
		}
			
	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}
			
	}


	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		//$activasion = md5(uniqid(rand(),true));
		$activasion=Yes;

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO members (name,password,email,number,active) VALUES (:name, :password, :email,:number, :active)');
			$stmt->execute(array(
				':name' => $_POST['name'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':number' => $_POST['number'],
				':active' => $activasion
			));
			$id = $db->lastInsertId('memberID');

			//send email
			$to = $_POST['email'];
			$subject = "Registration Confirmation";
			$body = "Thank you for registering at demo site.\n\n To activate your account, please click on this link:\n\n ".DIR."activate.php?x=$id&y=$activasion\n\n Regards Site Admin \n\n";
			$additionalheaders = "From: <".SITEEMAIL.">\r\n";
			$additionalheaders .= "Reply-To: ".SITEEMAIL."";
			mail($to, $subject, $body, $additionalheaders);

			//redirect to index page
			header('Location: index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Demo';
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Now | Login to Continue | Run4Offers.com</title>
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
	<div>
	    <div class="col-md-6">
			<form role="form" method="post" action="" autocomplete="off" style="margin-bottom:150px;">
				<h2>Please Sign Up</h2>
				<p>Already a member? <a href='login.php'>Login</a></p>
				<hr>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}
				?>
                <div class="form-group">
					<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Full Name" value="<?php if(isset($error)){ echo $_POST['name']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>
                <div class="form-group">
					<input type="text" name="number" id="number" class="form-control input-lg" placeholder="Mobile Number" value="<?php if(isset($error)){ echo $_POST['number']; } ?>" tabindex="3">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				<div class="form-group">
					<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
				</div>
				<div class="col-md-6" style="padding:0">
                <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
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
