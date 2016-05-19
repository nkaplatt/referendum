function update_server_data(type){
  var xmlhttp = new XMLHttpRequest();
  
  xmlhttp.open("POST", "newfu4.php", true);
    
  var colour = document.getElementsByClassName(type)[0].style.backgroundColor;
  if ((colour == '') || (colour == 'transparent')) {
  document.getElementsByClassName(type)[0].style.backgroundColor = "#7c1";
  } else {
	document.getElementsByClassName(type)[0].style.backgroundColor = "transparent";}


  
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("q=" + type); //+ "&k=" + category);
}
window.onload = function(){

	var options = ["icon-button", "icon-button-2", "icon-button-3", "icon-button-4", "icon-button-5", "icon-button-6"];
		for (var j=0; j<6; j++) {
			var option = options[j];
	  	    var emotes_array = document.getElementsByClassName(option); 		
	 			 		
	        if(emotes_array.length > 0){
	          emotes_array[0].onclick = function(type){
	 			update_server_data(type);
	          }.bind(undefined, options[j]);
	          
	    } 
	}
};
