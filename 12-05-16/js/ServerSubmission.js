function update_server_data(type, num){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "js/emotesDB.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("q=" + type + "&p=" + num); //+ "&k=" + category);
}
window.onload = function(){
  var category = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
  var index_dot = category.indexOf(".");
  var res = category.substring(0, index_dot);
  //Works out which category the file is
  var category = 0;
  switch(res) {
        case "immigration":
        category = 1;
        break;
        case "sovereignty-and-the-law":
        category = 2;
        break;
        case "trade":
        category = 3;
        break;
        case "jobs":
        category = 4;
        break;
        case "defence":
        category = 5;
        break;
  }

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
