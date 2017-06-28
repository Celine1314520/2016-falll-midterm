var count,currentImageNumber,timeLabel;
window.onload=function()
{
    timeLabel=document.getElementById("timeLabel");
    updateTimeLabel();//解決第一秒
    setInterval(updateTimeLabel,1000);
  
    count=0;
	changeAppearence();/*解決前五秒*/
    setInterval(changeAppearence,5000);
	
    
}
;


function updateTimeLabel()
{
    //大小寫很重要! function的F打成大寫就跑不了
    var now = new Date();
    timeLabel.innerHTML = 
        timeFormat(now.getHours()) + ":" +
        timeFormat(now.getMinutes()) + ":" +
        timeFormat(now.getSeconds()) ;
}

function changeAppearence()
{
    changeBGImage();
    changeClock();    
}

//建立物件模板
function TimeStyle(upper,go_right,fontSize,color,Angle)
{
    this.top="calc(50vh - "+upper+"vw)";//就算名字不同還是要寫this
    this.left=go_right+"%";
    this.fontSize=fontSize+"vw";
    this.color=color;
    this.Angle="rotate("+Angle+"deg)";
}

var Clock = new Array() ;
Clock[0] =new TimeStyle("10","44.2","4","gray",-10);
Clock[1] =new TimeStyle("0","23","7.8","red",3);
Clock[2] =new TimeStyle("10","40","7.8","black",-1);
Clock[3] =new TimeStyle("20","30","6.3","hotpink",0);
Clock[4] =new TimeStyle("10","34","7.8","deepskyblue",25);

/*老師的寫法:
var LabelStyle0 = TimeStyle("400px","500px","80px","gray",10);
var LabelStyle1 = TimeStyle("350px","415px","100px","red",13);
var LabelStyle2 = TimeStyle("370px","620px","160px","broen",358);
var LabelStyle3 = TimeStyle("240px","500px","180px","green",2);
var LabelStyle4 = TimeStyle("380px","600px","100px","deeppink",0);

var ClockArray=[LabelStyle0,LabelStyle1,LabelStyle2,LabelStyle3,LabelStyle4];
*/


function changeBGImage()
{
    currentImageNumber=count%5;
	/*currentImageNumber=4;*/
    var bgImage = "url('images/Board" + currentImageNumber + ".jpg')";
    document.body.style.backgroundImage=  bgImage ;
    count++;
}

function timeFormat(timeString)
{
    timeString="0"+timeString;//將丟進來的字串前面加上0
    return timeString.slice(-2);//只取後兩位
}

function changeClock()
{
    //alert(currentImageNumber);
    timeLabel.style.top =Clock[currentImageNumber].top;
    timeLabel.style.left =Clock[currentImageNumber].left;
    timeLabel.style.fontSize = Clock[currentImageNumber].fontSize;
    timeLabel.style.color = Clock[currentImageNumber].color;
    timeLabel.style.transform = Clock[currentImageNumber].Angle;
}