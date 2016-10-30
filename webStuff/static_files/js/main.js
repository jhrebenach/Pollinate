var hello = true
function mobileFirst () {
	if(hello){
		document.getElementById("navBar").className = "mobile";
	} else {
		document.getElementById("navBar").className = "desktop";
	}
	hello = !hello;
}