<?php require('../php/config.php'); 

//if not logged in starts Guest Sesssion
if(!$user->is_logged_in()){ 
   $_SESSION['email']="Guest";
   $_SESSION['number']="9876543210"; 
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Books Store | Run4Offers.com | Launching Soon</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/header.css" rel="stylesheet">
<link href="../css/shopnow.css" rel="stylesheet">
<link rel="icon" 
      type="image/png"
      href="../images/logo.png"
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
            <li class="active"><a href="">Book Store</a></li>
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
  
<div class="row featurette">
   <div class="container">
      <div class="col-md-7" style="text-align:center;margin-top:50px;">
         <p class="lead">
         Page Under Construction
         </p>
      </div>
      <div class="col-md-5">
         <div class="col-md-12 desktop">
            <ins class="adsbygoogle"
               style="display:inline-block;width:300px;height:250px"
               data-ad-client="ca-pub-8270523779988697"
               data-ad-slot="5526676361"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
         </div>
         <div class="col-md-12">
            <ins class="adsbygoogle"
               style="display:inline-block;width:300px;height:250px"
               data-ad-client="ca-pub-8270523779988697"
               data-ad-slot="5526676361"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
         </div>
         <div class="col-md-12 desktop">
            <ins class="adsbygoogle"
               style="display:inline-block;width:300px;height:250px"
               data-ad-client="ca-pub-8270523779988697"
               data-ad-slot="5526676361"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
         </div>
      </div>
   </div>
</div>
</center>

<center>
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

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="../js/login.js"></script>
<script src="../js/jquery.min.js"></script> 
<script src="../js/bootstrap.min.js"></script>
<script src="../js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
