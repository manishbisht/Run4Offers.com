<?php

$az = isset($_GET['am'])?$_GET['am']:false;

$azcurl = curl_init($az);
curl_setopt($azcurl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 10.10; labnol;) ctrlq.org");
curl_setopt($azcurl, CURLOPT_FAILONERROR, true);
curl_setopt($azcurl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($azcurl, CURLOPT_RETURNTRANSFER, true);
$azhtml = curl_exec($azcurl);
curl_close($azcurl);

$regex = '~<td class="a-span12"><span id="priceblock_saleprice" class="a-size-medium a-color-price"><span class="currencyINR">&nbsp;&nbsp;</span>(.+?)</span>~';
preg_match($regex,$azhtml,$azprice);

$regex = '~<meta name="keywords" content="(.+?)" />~';
preg_match($regex,$azhtml,$aztitle);

$regex = '~<div id="averageCustomerReviewRating" class="txtnormal clearboth">(.+?)</div>~';
preg_match($regex,$azhtml,$azrating);

$azprice[1] = strtok($azprice[1],' ');
$aztitle[1] = strtok($aztitle[1],')');

echo '<font size="3">'.$aztitle[1].')</font><br>';
echo '<font size="4">Price : Rs. '.$azprice[1].'</font><br>';
echo '<font size="3">Inclusive of all Taxes</font><br>';
echo '<font size="3">Rating : '.$azrating[1].'</font><br>';
echo '<a href="'.$az.'"><img src="../images/buyamazon.png"></a>';


?>