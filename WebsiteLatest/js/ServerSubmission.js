window.onload = function(){

  num = 100;
  for(var i=0; i<num; i++)
  {
    var emoticons = ["anger", "shock", "indifferent", "happy", "delighted"];

    for(var j=0; j<5; j++)
    {
  	   var emotes_array = document.getElementsByClassName(emoticons[j]+"-" + i);

        if(emotes_array.length > 0){
            emotes_array[0].onclick = function(type, num){
             alert(type + num);
         }.bind(undefined, emoticons[j], i);
      }
    }

  		///do fun things in here, onclick will be called with i, the number of the kind of thing you've pressed
  }
};
