// JavaScript Document
function bestprice(params){
    var httpc = new XMLHttpRequest();
    var url = "../php/bestprice.php?fk="+fkurl;
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.onreadystatechange = function() {
    if(httpc.readyState == 4 && httpc.status == 200) {
		document.getElementById('bp').innerHTML=httpc.responseText;
        }
    }
    httpc.send(params);
}
function details(params){
	element=document.getElementById('user');
	var id=element.textContent;
    var httpc = new XMLHttpRequest();
    var url = "../php/productdetailsfk.php?fk="+fkurl+"&id="+id
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.onreadystatechange = function() {
    if(httpc.readyState == 4 && httpc.status == 200) {
		document.getElementById('fk').innerHTML=httpc.responseText;
        }
    }
    httpc.send(params);
}
function amdetails(params){
    var httpc = new XMLHttpRequest();
    var url = "../php/productdetailsam.php?am="+amurl
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.onreadystatechange = function() {
    if(httpc.readyState == 4 && httpc.status == 200) {
		document.getElementById('am').innerHTML=httpc.responseText;
        }
    }
    httpc.send(params);
}
function sddetails(params){
	element=document.getElementById('user');
	var id=element.textContent;
    var httpc = new XMLHttpRequest();
    var url = "../php/productdetailssd.php?sd="+sdurl+"&id="+id
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.onreadystatechange = function() {
    if(httpc.readyState == 4 && httpc.status == 200) {
		document.getElementById('sd').innerHTML=httpc.responseText;
        }
    }
    httpc.send(params);
}

