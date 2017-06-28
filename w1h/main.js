var Name;
var dice;
var Awards;
function showAnswer()
 { 
    Name = document.getElementById("myText").value;
    Awards = document.getElementsByTagName("li");
    dice = Math.floor(Math.random()*Awards.length);
    document.getElementsByTagName("h1")[0].innerHTML = Name + "的" + Awards[dice].innerHTML+"去倒垃圾~" ;
 }
