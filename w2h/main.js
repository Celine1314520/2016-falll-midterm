var TheTopic, rDate, confirm, topicH1, Ldays, TheDay, bgSlect;
//js的時間單位是毫秒，要自己做出秒和其他時間單位，1秒是1000毫秒

var secondUnit = 1000;
var minuteUnit = secondUnit * 60;
var hourUnit = minuteUnit * 60;
var dayUnit = hourUnit * 24;

var timer;

window.onload = function () {
TheTopic = document.getElementById("setTopic");
topicH1 = document.getElementById("title");
rDate = document.getElementById("setDate");
TheDay = document.getElementById("showTheDay");
Ldays = document.getElementById("leftDays"); 
    //如果在函式裡面宣告為變成區域變數
confirm = document.getElementById("confirmbtn");
bgSlect = document.getElementById("selection");


confirm.addEventListener("click",updateTopicAndTime);//監聽按鈕
bgSlect.addEventListener("change",updateBgImage);
}
;

/*另一種寫法:
function showTopic()
{
}
window.onload=showTopic;
*/


function updateTopicAndTime()
{
    if(TheTopic.value !== "" && rDate.value !== "")     {
    topicH1.innerHTML=TheTopic.value;
    TheDay.innerHTML="距離"+rDate.value;
    //這裡的呼叫是找到html的id還是這份文件的變數呢?
    //id跟變數同名的時候好混亂阿
    end=new Date(rDate.value);
    end.setHours(0);
    timer=setInterval(showRemaining,1000);
    }
	else
		{alert("尚未設定完成!")}
    
}

function showRemaining(){
    
    var now=new Date();
    var timeDifference = end - now;
    //開始計算天時分秒
    var days = Math.floor(timeDifference/dayUnit);
    var hours = Math.floor((timeDifference % dayUnit)/hourUnit);
    var minutes = Math.floor((timeDifference % hourUnit)/minuteUnit);
    var seconds = Math.floor((timeDifference % minuteUnit)/secondUnit);
    if (timeDifference>0)
        {
        Ldays.innerHTML="還剩下"+days+"天 "+hours+"時 "+minutes+"分 "+seconds+"秒";
        }
    else
    {
            timeDifference=now - end;
            //開始計算天時分秒
            days=Math.floor(timeDifference/dayUnit);
            hours=Math.floor((timeDifference % dayUnit)/hourUnit);
            minutes=Math.floor((timeDifference % hourUnit)/minuteUnit);
            seconds=Math.floor((timeDifference % minuteUnit)/secondUnit);
            
            Ldays.innerHTML="已經過了"+days+"天 "+ hours +"時 "+ minutes +"分 "+ seconds +"秒";
            //因為floor的關係，若不重算數字都會多一
        }
    
}

function updateBgImage()
{
    //="url('BirthdayParty.jpg')"
    var tt=document.getElementById("ttable");
	if(bgSlect.value=="camp.jpg")
    {
		tt.style.marginLeft = "auto"; 
		tt.style.marginRight = "auto"; 
		tt.style.marginTop = "15%";
		tt.style.display = "";
		
    }
	else{
		if(bgSlect.value=="readme.jpg")
			{
				tt.style.display = "none";
			}
		else
			{
				tt.style.marginLeft = "";
				tt.style.marginTop = ""; 
				tt.style.display = "";
			}
		
	}
    var pic = "url('" + bgSlect.value + "')";
    //alert(pic);
    document.body.style.backgroundImage = pic ;
}
