function update_server_data(type, num){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "http://localhost/latest/js/emotesDB.php?q=" + type + "&p=" + num, true);
  /*xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        };*/
  alert("emotesDB.php?q=" + type + "&p=" + num);
  xmlhttp.send();
}

window.onload = function(){

var emoticons = ["anger", "shock", "indifferent", "happy", "delighted"];

  num = 100;
  for(var i=0; i<num; i++)
  {
    for(var j=0; j<5; j++) {

       var string = emoticons[j] + "-" + i;

       if(i == 0){
          string = emoticons[j];
       }

  	   var emotes_array = document.getElementsByClassName(string);

       if(emotes_array.length > 0){
         emotes_array[0].onclick = function(type, num){

           update_server_data(type, num);

         }.bind(undefined, emoticons[j], i);
      }
    }
  		///do fun things in here
  }
};
