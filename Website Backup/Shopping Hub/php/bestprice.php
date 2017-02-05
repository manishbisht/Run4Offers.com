<?php
$fk = isset($_GET['fk'])?$_GET['fk']:false;

$fkcurl = curl_init($fk);
curl_setopt($fkcurl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 10.10; labnol;) ctrlq.org");
curl_setopt($fkcurl, CURLOPT_FAILONERROR, true);
curl_setopt($fkcurl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($fkcurl, CURLOPT_RETURNTRANSFER, true);
$fkhtml = curl_exec($fkcurl);
curl_close($fkcurl);

$regex = '~<meta itemprop="price" content="(.+?)">~';
preg_match($regex,$fkhtml,$fkprice);

echo '<font size="4" color="#FF0000">Best Price : Rs. '.$fkprice[1].'.00</font><br>';

?>