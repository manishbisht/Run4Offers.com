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
<title>Welcome to Run4Offers.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/header.css" rel="stylesheet">
<link href="css/homepage.css" rel="stylesheet">
<link href="css/js-image-slider.css" rel="stylesheet">
<link rel="icon" 
      type="image/png"
      href="images/logo.png"
      sizes="32x32">
</head>
<body> 
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
            <li><a href="shop now.php">Shop Now</a></li>
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

<div class="container top" align="center">
   <div class="col-md-2 tablet" style="padding:0">
      <div style="margin-right:5px">
         <a id="topleftlink" href="http://tracking.icubeswire.com/aff_c?offer_id=681&aff_id=11617&aff_sub=<?php echo $_SESSION['number'] ?>">
         <img src="images/Paytm300X600.jpg" class="img-responsive">
         </a>
      </div>
   </div>
   <div class="col-md-8" style="padding:0;">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
   </ol>
   <div class="carousel-inner" role="listbox" style="max-height:370px;">
      <div class="item active">
         <a id="sliderimage1link" href="http://dl.flipkart.com/dl/?affid=bestshopp&affExtParam1=<?php echo $_SESSION['number'] ?>">
         <img class="first-slide" src="images/img01.jpg" alt="First slide">
         </a>
      </div>
      <div class="item">
         <a id="sliderimage2link" href="http://www.amazon.in/ref=as_li_ss_tl?_encoding=UTF8&camp=3626&creative=24822&linkCode=ur2&tag=shoppinghub-21">
         <img class="second-slide" src="images/img02.jpg" alt="Second slide">
         </a>
      </div>
      <div class="item">
         <a id="sliderimage3link" href="http://tracking.icubeswire.com/aff_c?offer_id=2&aff_id=11617&aff_sub=<?php echo $_SESSION['number'] ?>">
         <img class="third-slide" src="images/img03.jpg" alt="Third slide">
         </a>
      </div>
      <div class="item">
         <a id="sliderimage4link" href="http://www.snapdeal.com?utm_source=aff_prog&utm_campaign=afts&offer_id=17&aff_id=27286&aff_sub=<?php echo $_SESSION['number'] ?>">
         <img class="second-slide" src="images/img04.jpg" alt="fourth slide">
         </a>
      </div>
      <div class="item">
         <a id="sliderimage5link" href="http://tracking.icubeswire.com/aff_c?offer_id=681&aff_id=11617&aff_sub=<?php echo $_SESSION['number'] ?>">
         <img class="second-slide" src="images/img05.jpg" alt="Fifth slide">
         </a>
      </div>
   </div>
   <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
   </a>
   <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
   </a>
</div>
   </div>
   <div class="col-md-2 tablet" style="padding:0">
      <div style="margin-left:5px;">
         <a id="toprightlink" href="http://tracking.icubeswire.com/aff_c?offer_id=2&aff_id=11617&aff_sub=<?php echo $_SESSION['number'] ?>">
         <img src="images/300x600copycopy.JPG" class="img-responsive">
         </a>
      </div>
   </div>
</div>

<div class="container" style="margin-top:5px">
   <div class="col-md-3 tablet" style="padding:0;">
      <div style="margin-right:5px">
      <a id="bottomleftlink" href="http://www.amazon.in/ref=as_li_ss_tl?_encoding=UTF8&camp=3626&creative=24822&linkCode=ur2&tag=shoppinghub-21">
      <img src="images/Amazon300x250.jpg" class="img-responsive"/>
      </a>
      </div>
   </div>
   <div class="col-md-6 tablet" style="padding:0;">
      <a id="leaderboard1link" href="http://dl.flipkart.com/dl/?affid=bestshopp&affExtParam1=<?php echo $_SESSION['number'] ?>">
      <img src="images/leaderboard01.jpg" class="img-responsive" style="margin-top:10px"/>
      </a>
      <a id="leaderboard2link" href="http://www.amazon.in/ref=as_li_ss_tl?_encoding=UTF8&camp=3626&creative=24822&linkCode=ur2&tag=shoppinghub-21">
      <img src="images/leaderboard02.jpg" class="img-responsive" style="margin-top:5px"/>
      </a>
      <a id="leaderboard3link" href="http://tracking.icubeswire.com/aff_c?offer_id=681&aff_id=11617&aff_sub=<?php echo $_SESSION['number'] ?>">
      <img src="images/leaderboard03.jpg" class="img-responsive" style="margin-top:5px"/>
      </a>
   </div>
   <div class="col-md-3 tablet" style="padding:0;">
      <div style="margin-left:5px">
      <a id="bottomrightlink" href="http://dl.flipkart.com/dl/?affid=bestshopp&affExtParam1=<?php echo $_SESSION['number'] ?>">
      <img src="images/Flipkart300x250.jpg" class="img-responsive"/>
      </a>
      </div>
   </div> 
</div>

<div class="container marketing">
   <div class="col-xs-12 partnerhead" align="center">
   How to get your Free Recharge
   </div>
   <div class="row offers">
      <div class="col-md-4">
         <img src="images/search.png" class="img-circle" alt="Generic placeholder image" width="140" height="140">
         <h2>Search</h2>
         <p>Now search any product using our search tool and follow the provided links to buy the product</p>
         <p><a class="btn btn-default" href="search.html" role="button">Search Now &raquo;</a></p>
      </div>
      <div class="col-md-4">
         <img src="images/order.png" class="img-circle" alt="Generic placeholder image" width="140" height="140">
         <h2>Order</h2>
         <p>Just provide your mobile number and we will give you special links to buy. Only Valid after clicking on those links</p>
         <p><a class="btn btn-default" href="shop now.html" role="button">Shop Now &raquo;</a></p>
      </div>
      <div class="col-md-4">
         <img src="images/recharge.jpg" class="img-circle" alt="Generic placeholder image" width="140" height="140">
         <h2>Grab Your Recharge</h2>
         <p>We will provide your free recharge automatically. If you have queries in between drop a mail at <a href="mailto:support@run4offers.com">support@run4offers.com</a></p>
         <p><a class="btn btn-default" href="Check Status.html" role="button">Check your Status &raquo;</a></p>
      </div>
   </div>
</div>
</center>

<div class="container">
   <div class="col-md-4 desktop">
     <ins class="adsbygoogle"
        style="display:inline-block;width:300px;height:250px"
        data-ad-client="ca-pub-8270523779988697"
        data-ad-slot="5526676361"></ins>
     <script>
     (adsbygoogle = window.adsbygoogle || []).push({});
     </script>
   </div>
   <div class="col-md-4">
     <ins class="adsbygoogle"
        style="display:inline-block;width:300px;height:250px"
        data-ad-client="ca-pub-8270523779988697"
        data-ad-slot="5526676361"></ins>
     <script>
     (adsbygoogle = window.adsbygoogle || []).push({});
     </script>
   </div>
   <div class="col-md-4 desktop">
     <ins class="adsbygoogle"
        style="display:inline-block;width:300px;height:250px"
        data-ad-client="ca-pub-8270523779988697"
        data-ad-slot="5526676361"></ins>
     <script>
     (adsbygoogle = window.adsbygoogle || []).push({});
     </script>
   </div>
</div>

<div class="container tablet" style="margin-top:30px;margin-bottom:30px;">
   <div class="col-xs-12 partnerhead" align="center">
   Our Partners
   </div>
   <div class="col-md-12" align="center">
   <img src="images/p01.png">
   <img src="images/p02.png">
   <img src="images/p03.png">
   <img src="images/p04.png">
   </div>
   
</div>

<footer class="footer">
   <div class="container">
      <div class="col-md-4">
      
      </div>
      <div class="col-md-4" align="center">
      <p class="text-muted"><strong>Keep in Touch with Us</strong></p>
      <a href="http://fb.me/run4offers">
      <img src="images/fb2.jpg">
      </a>
      <p class="text-muted"><strong>Email : <a href="mailto:support@run4offers.com">support@run4offers.com</a><br>
      &copy; 2015 Run4Offers.com &middot; All Rights Reserved</strong></p>
      </div>
      <div class="col-md-4">
      
      </div>
   </div>
</footer>

<script src="js/jquery.min.js"></script> 
<script src="js/homelinks.js"></script>  
<script src="js/bootstrap.min.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
