<?php
$sd = isset($_GET['sd'])?$_GET['sd']:false;
$id = isset($_GET['id'])?$_GET['id']:false;

$sdcurl = curl_init($sd);
curl_setopt($sdcurl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 10.10; labnol;) ctrlq.org");
curl_setopt($sdcurl, CURLOPT_FAILONERROR, true);
curl_setopt($sdcurl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($sdcurl, CURLOPT_RETURNTRANSFER, true);
$sdhtml = curl_exec($sdcurl);
curl_close($sdcurl);

$regex = '~<span class="payBlkBig" itemprop="price">(.+?)</span>~';
preg_match($regex,$sdhtml,$sdprice);

$regex = '~<span class="active-bread" title="(.+?)">~';
preg_match($regex,$sdhtml,$sdtitle);

$regex = '~<div ratings="(.+?)">~';
preg_match($regex,$sdhtml,$sdrating);

$sd=$sd.'?utm_source=aff_prog&utm_campaign=afts&offer_id=17&aff_id=27286&aff_sub='.$id;

echo '<font size="3">'.$sdtitle[1].'</font><br>';
echo '<font size="4">Price : Rs. '.$sdprice[1].'.00</font><br>';
echo '<font size="3">Rating : '.$sdrating[1].' out of 5 stars</font><br>';
echo '<a href="'.$sd.'">Buy Now from Snapdeal.com</a>';

?>