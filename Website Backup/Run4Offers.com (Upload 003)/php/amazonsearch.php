<?php
// Tell the browser it is going to receive an XML document.
/* DON'T FORGET to replace the string '[Your Access Key ID]' with your
Access Key ID in the following line */
$url = 'http://webservices.amazon.com/onca/xml?Service=AWSECommerceService&AWSAccessKeyId=AKIAJGD57DVMCH47YPIA&Operation=ItemLookup&ItemId=0679722769&ResponseGroup=ItemAttributes,Offers,Images,Reviews&Version=2013-08-01';
echo file_get_contents($url);
?>