<?php require('php/config.php'); 

//if not logged in starts Guest Sesssion
if(!$user->is_logged_in()){ 
   $_SESSION['email']="Guest";
   $_SESSION['number']="9876543210"; 
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Now | Grab your Free Recharge | Login to Continue | Run4Offers.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/header.css" rel="stylesheet">
<link href="css/shopnow.css" rel="stylesheet">
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
         <a class="navbar-brand" href="index.php"><font face="logo" style="font-size:30px;">Run<font style="font-family:coming">4</font>Offers.com</font></a> 
      </div> 
      <div class="collapse navbar-collapse" id="example-navbar-collapse"> 
         <ul class="nav navbar-nav"> 
            <li><a href="search.php">Search</a></li>
            <li class="active"><a href="shop now.php">Shop Now</a></li>
            <li><a href="Gifts">Gifts Store</a></li>
            <li><a href="Books">Book Store</a></li>
            <li><a href="About Us.php">About Us</a></li>
         </ul>
         <div align="right" style="margin-top:5px;margin-bottom:5px;color:#777;margin-right:10px">
         Logged in as <div class="user"><?php echo $_SESSION['email'] ?></div><br>
         <a href="login/register.php">Register</a> | <a href="login">Login</a> | <a href="login/logout.php">Logout</a>
         </div>
      </div>
   </div>
</nav>
</header>
  
<div class="row featurette">
   <div class="container">
      <div class="col-md-7">
         <h2 class="featurette-heading">Enter Your Mobile Number(+91)</h2>
         <div class="col-md-7 textfield">
            <input type="text" id="mobile" class="form-control" placeholder="Enter 10 Digit Mobile Number" required autofocus>
         </div>
         <div class="col-md-5 links">
            <button class="btn btn-lg btn-primary btn-block" type="submit" onClick="changelogin();">Show My Links</button>
         </div>
         <div id="info" class="alert alert-info note">
            You are logged in as <?php echo $_SESSION['number'] ?><br>
            NOTE : Recharges will be provided if your Mobile Number is valid
         </div>
         <div class="col-lg-12 linkbuttons" align="center">
            <a id="flipkart" class="userlink" href="http://dl.flipkart.com/dl/?affid=bestshopp&affExtParam1=<?php echo $_SESSION['number'] ?>">
            <button id="flipkart" class="btn btn-lg btn-info btn-block" type="submit">Shop on Flipkart.com</button>
            </a>
         </div>
         <div class="col-lg-12 linkbuttons" align="center">
            <a id="amazon" class="userlink" href="http://www.amazon.in/ref=as_li_ss_tl?_encoding=UTF8&camp=3626&creative=24822&linkCode=ur2&tag=shoppinghub-21">
            <button class="btn btn-lg btn-info btn-block" type="submit">Shop on Amazon.in</button>
            </a>
         </div>
         <div class="col-lg-12 linkbuttons" align="center">
            <a id="jabong" class="userlink" href="http://tracking.icubeswire.com/aff_c?offer_id=2&aff_id=11617&aff_sub=<?php echo $_SESSION['number'] ?>">
            <button class="btn btn-lg btn-info btn-block" type="submit">Shop on Jabong.com</button>
            </a>
         </div>
         <div class="col-lg-12 linkbuttons" align="center">
            <a id="snapdeal" class="userlink" href="http://www.snapdeal.com?utm_source=aff_prog&utm_campaign=afts&offer_id=17&aff_id=27286&aff_sub=<?php echo $_SESSION['number'] ?>">
            <button class="btn btn-lg btn-info btn-block" type="submit">Shop on Snapdeal.com</button>
            </a>
         </div>
         <div class="col-lg-12 linkbuttons" align="center">
            <a id="paytm" class="userlink" href="http://tracking.icubeswire.com/aff_c?offer_id=681&aff_id=11617&aff_sub=<?php echo $_SESSION['number'] ?>">
            <button class="btn btn-lg btn-info btn-block" type="submit">Shop on Paytm.com</button>
            </a>
         </div>
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
   </div>  
      </div>
   </div>
</div>


<footer class="footer">
   <div class="container">
      <p class="text-muted"><strong>Keep in Touch with Us</strong></p>
      <a href="http://fb.me/run4offers">
      <img src="images/fb2.jpg">
      </a>
      <p class="text-muted"><strong>Email : <a href="mailto:support@run4offers.com">support@run4offers.com</a><br>
      &copy; 2015 Run4Offers.com &middot; All Rights Reserved</strong></p>
   </div>
</footer>


</center>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="js/login.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
