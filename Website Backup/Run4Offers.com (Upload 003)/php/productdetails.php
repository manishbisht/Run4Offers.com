<?php
include "flipkartapi.php";
$flipkart = new Flipkart("bestshopp", "21719d092a4c47bba14ee26dc9726988", "json");
$pdetails = 'https://affiliate-api.flipkart.net/affiliate/product/json?';
$fkid = isset($_GET['fk'])?$_GET['fk']:false;
$id = isset($_GET['id'])?$_GET['id']:false;
if($pdetails){

		$details = $flipkart->call_url($pdetails.'id='.$fkid); 
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
				$url=$url.'&affExtParam1='.$id;
				$sp=$description['sellingPrice']['amount'];
				$currency=$description['sellingPrice']['currency'];
				$end = 0;
				echo '<div class="col-xs-12" style="margin-top:10px;"><div class="col-xs-5"><a href="'.$url.'"><center><img src="'.$imageUrl.'"/><center></a></div><div class="col-xs-7" style=""><a href="'.$url.'"><font color=red size=3>'.$name."</font></a><br>Color : ".$color." | Brand : ".$brand."<br><strong>Price : ".$sp.'.00 '.$currency.'</strong><br>Cash on Delivery : '.$a.'<br>EMI Available : '.$b.'<br><a href="'.$url.'"><img src="http://img5a.flixcart.com/www/prod/images/buy_btn_3-0b867813.png"></a></div></div>';
			}
		}
		if($count==0){
			echo '<div class="col-md-10">Sorry !! No Results Found</div>';
		}
		exit();
if($end!=1)
	echo '</div></div>';
}
else
echo 'error';
?>