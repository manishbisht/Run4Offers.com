<?php
/**
 * Demo Code
 * PHP Wrapper for Flipkart API (unofficial)
 * PHPWDN: https://www.phpwdn.com/flipkart-products-in-php-using-api
 * Demo:  http://demos.phpwdn.com/flipkart-api-demo/?
 * License: Free
 *
 * @author PHPWDN.COM
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Envor HTML5/CSS3 Template">
    <meta name="author" content="Suono Libero ( @rivathemes.com )">
    <link rel="shortcut icon" href="favicon.ico">
<title>PHP Wrapper for Flipkart API</title>
<!--
    * Google Fonts
    //-->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link href="https://www.kctsindia.com/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="https://www.kctsindia.com/assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="https://www.kctsindia.com/assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="https://www.kctsindia.com/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://www.kctsindia.com/assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="https://www.kctsindia.com/assets/css/header/h1.css" rel="stylesheet" type="text/css">
    <link href="https://www.kctsindia.com/assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="https://www.kctsindia.com/assets/css/color1.css" rel="stylesheet" type="text/css" id="envor-site-boxed-color">
        <link href="https://www.kctsindia.com/assets/css/rivathemes.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="envor-content">
    
<section class="envor-section">
        <div class="container">
            
            
 <div class="col-lg-3 pull-right">
    <img class="img-responsive" src="http://demos.phpwdn.com/arch/sturt.png" /><br />
    <h4>Edwin F Sturt</h4>
    <h6>Computer Programmer</h6>
</div>          
                                
                               
                              
                                
                                <div class="col-lg-9" style="padding-left: 0 !important;padding-right: 0 !important;">
                                
                                <h1 class="well">FlipKart Api Demo phpwdn.com  <br><br>
                                Click on a category link to show available products from that category.
                                </h1>
                                <div class="cfmonitor">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Category - 2 (www.phpwdn.com) -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9108791790083597"
     data-ad-slot="8882877064"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php

include "flipkart-api.php";

//Replace <affiliate-id> and <access-token> with the correct values
$flipkart = new \phpflipkart\Flipkart("<affiliate-id>", "<access-token>", "json");

//To view category pages, API URL is passed as query string.
$url = isset($_GET['url'])?$_GET['url']:false;
if($url){
	//URL is base64 encoded to prevent errors in some server setups.
	$url = base64_decode($url);

	//This parameter lets users allow out-of-stock items to be displayed.
	$hidden = isset($_GET['hidden'])?false:true;

	//Call the API using the URL.
	$details = $flipkart->call_url($url);

	if(!$details){
		echo 'Error: Could not retrieve products list.';
		exit();
	}

	//The response is expected to be JSON. Decode it into associative arrays.
	$details = json_decode($details, TRUE);

	//The response is expected to contain these values.
	$nextUrl = $details['nextUrl'];
	$validTill = $details['validTill'];
	$products = $details['productInfoList'];

	//The navigation buttons.
	echo '<h2><a class="btn btn-default btn-lg" href="?">Back to Product Category</a> | <a class="btn btn-primary btn-lg" href="?url='.base64_encode($nextUrl).'">NEXT >></a></h2>';

	//Message to be displayed if out-of-stock items are hidden.
	if($hidden)
		echo '<div class="alert alert-info" role="alert">
Products that are out of stock are hidden by default.</div><a class="btn btn-warning" href="?hidden=1&url='.base64_encode($url).'">SHOW OUT-OF-STOCK ITEMS</a>';

	//Products table
	echo "<table class='table table-bordered'>";
	$count = 0;
	$end = 1;

	//Make sure there are products in the list.
	if(count($products) > 0){
	echo '<table class="table table-bordered" id="product-table">
							<tbody><tr>';
		foreach ($products as $product) {

			//Hide out-of-stock items unless requested.
			$inStock = $product['productBaseInfo']['productAttributes']['inStock'];
			if(!$inStock && $hidden)
				continue;
			
			//Keep count.
			$count++;

			//The API returns these values nested inside the array.
			//Only image, price, url and title are used in this demo
			$productId = $product['productBaseInfo']['productIdentifier']['productId'];
			$title = $product['productBaseInfo']['productAttributes']['title'];
			$productDescription = $product['productBaseInfo']['productAttributes']['productDescription'];

			//We take the 200x200 image, there are other sizes too.
			$productImage = array_key_exists('200x200', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['200x200']:'';
			$sellingPrice = $product['productBaseInfo']['productAttributes']['sellingPrice']['amount'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];
			$productBrand = $product['productBaseInfo']['productAttributes']['productBrand'];
			$color = $product['productBaseInfo']['productAttributes']['color'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];

			//Setting up the table rows/columns for a 3x3 view.
			$end = 0;
			if($count%3==1)
				echo '<tr>';
			else if($count%3==2)
				echo '</td>';
			else{
				echo '</td>';
				$end =1;
			}
			
			
					echo '<td width="25%" class="product-col">
							<table border="0" class="item-table">
							<tr><td colspan="2" class="item-title"><h3>'.$title.'</h3></td></tr>
							<tr><td colspan="2" class="item-image"><a href="'.$productUrl.'" target="_blank"><img src="'.$productImage.'" alt="'.$title.'"</a></td></tr>
							<tr><td class="btn btn-primary">Rs. ' . $sellingPrice .'</td></tr>
							<tr><td colspan="2" class="item-view"><a href="'.$productUrl.'" target="_blank" class="btn btn-block btn-success">View on Flipkart</a>
							
							</td></tr>
							</table>
							</td>';

			
			if($end)
				echo '</tr>';

		}
	}

	//A message if no products are printed.	
	if($count==0){
		echo '<tr><td>The retrieved products are not in stock. Try the Next button or another category.</td><tr>';
	}

	//A hack to make sure the tags are closed.	
	if($end!=1)
		echo '</td></tr>';

	echo '</table>';

	//Next URL link at the bottom.
	echo '<h2><a class="btn btn-primary btn-lg" href="?url='.base64_encode($nextUrl).'">NEXT >></a></h2>';

	//That's all we need for the category view.
	exit();
}

//If the control reaches here, the API directory view is shown.

//Query the API
$home = $flipkart->api_home();

//Make sure there is a response.
if($home==false){
	echo 'Error: Could not retrieve API homepage';
	exit();
}

//Convert into associative arrays.
$home = json_decode($home, TRUE);

$list = $home['apiGroups']['affiliate']['apiListings'];
?>


<?php
echo '';

//Create the tabulated view for different categories.
echo '<table class="table table-bordered">';
$count = 0;
$end = 1;
foreach ($list as $key => $data) {
	$count++;
	$end = 0;

	//To build a 3x3 table.
	if($count%3==1)
		echo '<tr><td>';
	else if($count%3==2)
		echo '</td><td>';
	else{
		echo '</td><td>';
		$end =1;
	}

	echo "<strong>".str_replace("_"," ",$key)."</strong>";
	echo "<br>";
	//URL is base64 encoded when sent in query string.
	echo '<a class="btn btn-success" href="?url='.base64_encode($data['availableVariants']['v0.1.0']['get']).'">View Products &raquo;</a>';
}

if($end!=1)
	echo '</td></tr>';
echo '</table>';
?>
</div>


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://www.kctsindia.com/assets/js/vendor/jquery-1.11.0.min.js"></script>
<script src="https://www.kctsindia.com/assets/js/vendor/core-1.0.5.js"></script>
    <script src="https://www.kctsindia.com/assets/js/bootstrap.min.js"></script>


 </body>
</html>