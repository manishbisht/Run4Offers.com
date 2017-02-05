<?php
include "flipkartapi.php";

$flipkart = new Flipkart("bestshopp", "21719d092a4c47bba14ee26dc9726988", "json");

$search = 'https://affiliate-api.flipkart.net/affiliate/search/json?resultCount=10';
$query = isset($_GET['query'])?$_GET['query']:false;
$id = isset($_GET['id'])?$_GET['id']:false;
$query = preg_replace('/\s+/', '+', $query);
if($search){

		$details = $flipkart->call_url($search.'&query='.$query); 
		if(!$details){
			echo 'Error: Could not retrieve DOTD.';
			exit();
		}
		$details = json_decode($details, TRUE);
		$list = $details['productInfoList'];
		$count = 0;
		$end = 1;
		if(count($list) > 0){
			foreach ($list as $item) {
				$count++;
				$main = $item['productBaseInfo'];
				$description = $main['productAttributes'];
				$name=$description['title'];
				$url = $description['productUrl'];
				$url = $url.'&affExtParam1='.$id;
				$imageUrl = $description['imageUrls']['275x275'];
				$sp=$description['sellingPrice']['amount'];
				$currency=$description['sellingPrice']['currency'];
				$brand=$description['productBrand'];
				$color=$description['color'];
				$cod=$description['codAvailable'];
				$emi=$description['emiAvailable'];
				if($cod=='true')
				$a='Yes';
				else
				$a='No';
				if($emi=='true')
				$b='Yes';
				else
				$b='No';
				$end = 0;
				echo '<br>';
				echo '<div class="col-xs-12 search" style="margin-top:10px">';
				echo '<div class="col-xs-4 search">';
				echo '<center><a href="'.$url.'"><img class="img-responsive" src="'.$imageUrl.'"></a></center>';
				echo '</div>';
				echo '<div class="col-xs-8" style="padding-right:0">';
				echo '<a href="'.$url.'">'.$name.'</a><br>';
				echo 'Color : '.$color.' | Brand : '.$brand.'<br>';
				echo '<strong>Price : '.$sp.'.00 '.$currency.'</strong><br>';
				echo 'Cash on Delivery : '.$a.'<br>';
				echo 'EMI Available : '.$b.'<br>';
				echo '<a href="'.$url.'"><img src="http://img5a.flixcart.com/www/prod/images/buy_btn_3-0b867813.png"></a>';
				echo '</div>';
				echo '</div>';
				echo '<br><br><br><br><br><br><br><br><br><br>';
			}
		}
		if($count==0){
			echo '<div class="col-md-10">Sorry !! No Results Found<br>Please Try Again</div>';
		}
		exit();
if($end!=1)
	echo '</div></div>';
}
else
echo 'error';
?>