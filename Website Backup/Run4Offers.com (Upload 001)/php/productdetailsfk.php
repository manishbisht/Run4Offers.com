<?php
$fk = isset($_GET['fk'])?$_GET['fk']:false;
$id = isset($_GET['id'])?$_GET['id']:false;

$fkcurl = curl_init($fk);
curl_setopt($fkcurl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 10.10; labnol;) ctrlq.org");
curl_setopt($fkcurl, CURLOPT_FAILONERROR, true);
curl_setopt($fkcurl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($fkcurl, CURLOPT_RETURNTRANSFER, true);
$fkhtml = curl_exec($fkcurl);
curl_close($fkcurl);

$regex = '~<meta itemprop="price" content="(.+?)">~';
preg_match($regex,$fkhtml,$fkprice);

$regex = '~<meta name="Keywords" content="(.+?)"/>~';
preg_match($regex,$fkhtml,$fktitle);

$regex = '~<span class="rating-out-of-five fk-inline-block fk-bg-green">(.+?)~';
preg_match($regex,$fkhtml,$fkrating);

$fk=$fk.'&affExtParam1='.$id;

echo '<font size="3">'.$fktitle[1].'</font><br>';
echo '<font size="4">Price : Rs. '.$fkprice[1].'.00<br></font>';
echo '<font size="3">Rating : '.$fkrating[1].' out of 5 stars<br><font>';
echo '<a href="'.$fk.'"><img src="http://img5a.flixcart.com/www/prod/images/buy_btn_3-0b867813.png"></a>';

?>