/* Get stuff on the left working for multable texts
	dont need to be dragable for size basics first
*/
var numberOfItems = 0;
var idSelected = "";
var text = [];


function start () {

	var textInput = document.getElementById("textInput").value;
	document.getElementById("textInput").value = "";

    var txt2 = $("<p id= idOfWord"+numberOfItems.toString()+" class='Test'>"+textInput+" </p>");
    	numberOfItems++;
	$(".box").append(txt2);

	$('.box').mousedown(function(e) {
		if($(event.target).is('.Test')){
			$( '.Test' ).draggable({
    			containment: "parent"
    		});
 		}       	 
	});
	
}
function changes () {

	//Color
	var e = document.getElementById("colorOfText");
	var colorValue = e.value.toString();
	$("#" + idSelected).css("color", colorValue);
	//Font
	e = document.getElementById("styleOfText");
	var styleOfTextValue = e.value.toString();
	$("#" + idSelected).css("font-family", styleOfTextValue);
	//Font Size
	e = document.getElementById("fontSize");
	var fontSizeValue = e.value.toString();
	$("#" + idSelected).css("font-size", fontSizeValue);


	
	

 	

}
function removeText() {
	$("#" + idSelected).remove();
	idSelected = "";
}
function applyChanges() {

	document.getElementById(idSelected.toString()).innerHTML = document.getElementById("textSelected").value;
	
}
function savePicture () {
	
	
	var x = document.getElementById("playGround").querySelectorAll(".Test");
	for (var i = 0; i < x.length; i++) {
		console.log("Text: "+ document.getElementById((x[i].id).toString()).innerHTML);
		console.log("Color: "+ x[i].style.color);
		console.log("Font Size: " + x[i].style.fontSize);
		console.log("Font Family"+  x[i].style.fontFamily);
		console.log("Top: "+x[i].style.top);
		console.log("Left: "+x[i].style.left);
		console.log("-------------");


	};
	
}

$('.box').mousedown(function(e) {
		if($(event.target).is('.Test')){

		idSelected = event.target.id;
		
		document.getElementById("currentID").innerHTML = idSelected;
		document.getElementById("textSelected").value = document.getElementById(idSelected).innerHTML;
	
		
 		}       	 
	});



