// JavaScript Document
function userlogin(){
	var x=document.cookie;
	if(x==""){
	document.cookie="Guest";
    document.getElementById('user').innerHTML="Guest";
	document.getElementById('usernumber').innerHTML="Guest";
	document.getElementById('flipkart').href=flipkartlink;
	document.getElementById('amazon').href=amazonlink;
	document.getElementById('snapdeal').href=snapdeallink;
	}
	else{
	document.getElementById('user').innerHTML=x;
	document.getElementById('usernumber').innerHTML=x;
	document.getElementById('flipkart').href=flipkartlink+"&affExtParam1="+x;
	document.getElementById('amazon').href=amazonlink;
	document.getElementById('snapdeal').href=snapdeallink+"&aff_sub="+x;
	}
}

function logout(){
	document.cookie="Guest";
	userlogin();
}

function changelogin(){
	var MobileNumber=document.getElementById('mobile').value;
	var digitchk=/^[7-9]{1}[0-9]{9}/;
	if(MobileNumber==''||MobileNumber.length!=10||digitchk.test(MobileNumber)==false)
	{
		document.getElementById('info').innerHTML="Enter Valid Mobile Number<br> *Contains only 10 digits<br> *No characters are allowded<br> *Mobile Number should not start with 0";
		document.getElementById('mobile').focus();
	}
	else{
         document.cookie=MobileNumber;
		 userlogin();
		 document.getElementById('info').innerHTML='You are Logged in as : +91-'+MobileNumber+'<br>Note : All Recharges will be given to +91-'+MobileNumber;	
	}
}
function searchResults(params) {
	document.getElementById('result').innerHTML="<img src=images/image_873771.gif >";;
	var id=document.cookie;
    var httpc = new XMLHttpRequest();
	var list=document.getElementById('item').value;
    var url = "flipkart.php?query="+list+"&id="+id;
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.onreadystatechange = function() {
    if(httpc.readyState == 4 && httpc.status == 200) {
		document.getElementById('result').innerHTML=httpc.responseText;
        }
    }
    httpc.send(params);
}