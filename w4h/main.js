var myVideo,playButton,videoURL,fullScreenButton,timeDisplay,progressSlider,volumeBt,volumeSlider,volumeIcon,fastPlay,rewindBt,take_picBt,ReplayBt;
window.onload=function()
{
	myVideo=document.getElementById("myVideo");
	

	playButton=document.getElementById("playButton");
	
	
	playButton.onclick=playOrPause;
	//myVideo.onended=function(){playButton.value="Play!";};
	myVideo.onended=replayOrNot;
	videoURL=document.getElementById("videoURL");
	//顯示影片網址
    videoURL.size=myVideo.src.length;
    videoURL.value=myVideo.src;
	
	fullScreenButton=document.getElementById("fullScreenButton");
	fullScreenButton.onclick=fullScreen;
	
	timeDisplay=document.getElementById("timeDisplay");
	
	progressSlider=document.getElementById("progressSlider");
	progressSlider.oninput=changeProgress;/*試試看onchange和oninput*/
	
	myVideo.addEventListener("timeupdate",updateProgress);/*影片進度顯示*/    
    
	setTimeout(play,11000);
	setTimeout(show_hidden,11000);
	
	
	
	volumeBt=document.getElementById("volum");
	volumeBt.onclick=volumOrMuted;
	
	volumeSlider=document.getElementById("volumeControl");
	volumeSlider.oninput=changeVolume;
	
	volumeIcon=document.getElementById("volumeStatus");
	
	fastPlay=document.getElementById("fastPlay");
	fastPlay.onchange=playspeed;
	
	rewindBt=document.getElementById("rewind");
	rewindBt.onmousedown=playBack;
	rewindBt.onmouseup=stopRewind;
	
	take_picBt=document.getElementById("take_pic");
	take_picBt.onclick=frame;
	
	ReplayBt=document.getElementById("Replay");
	ReplayBt.onclick=replayOrNot_value;
}
;
function replayOrNot_value()
{
	
	if(ReplayBt.value=="停止重播")
	{	
		ReplayBt.value="重複播放";
	}
	else
	{
		ReplayBt.value="停止重播";
	}
}
function replayOrNot()
{
	playButton.value="Play!";
	if(ReplayBt.value=="停止重播")//要重播
	{
		playOrPause();//
	}
}

function show_hidden()
{
	take_picBt.style.visibility="visible";
	fastPlay.style.visibility="visible";
	rewindBt.style.visibility="visible";
}
function frame() 
{ 
	var c=document.getElementById("canvas");
	c.width=854;
	c.height=480;
	var context = c.getContext("2d"); 
    context.drawImage(myVideo, 0, 0); 
}
var Interval_id;
function stopRewind()
{
	clearInterval(Interval_id);
}
function playBack()
{
	if(myVideo.paused)
    {
       Interval_id=setInterval(goback,100);
    }
	else
	{
		playOrPause();
		Interval_id=setInterval(goback,100);
	}
	
	
}
function goback()
{
	myVideo.currentTime=myVideo.currentTime-0.1;
	progressSlider.value=myVideo.currentTime;
}
function playspeed()
{
	myVideo.playbackRate=fastPlay.value;
}
	

function playOrPause()
{
	//alert("Hello,測試呼叫function");
    //alert(myVideo.src);
    //決定影片播放或暫停
    //如果影片目前是暫停的，就呼叫播放的方法
    //要不然就呼叫暫停的方法
    //記得改按鈕上的文字
	show_hidden();
	if(myVideo.paused)
    {
       play();
    }
	else
    {
        myVideo.pause();
        playButton.value="Play!";
    }
	
	
		
}
function play()
{
	 myVideo.play();/*現在是暫停的，按下按鈕是想要撥放*/
     playButton.value="Pause!";/*改按鈕文字*/
	 progressSlider.max=myVideo.duration;
}


function updateProgress()
{
    timeDisplay.innerHTML=
        Math.floor(myVideo.currentTime)+"/"+
        Math.floor(myVideo.duration)+"秒";
    progressSlider.value=myVideo.currentTime;
}

function changeProgress()
{
    myVideo.currentTime=progressSlider.value;
}

function fullScreen()
{
    myVideo.webkitEnterFullscreen();
}

function volumOrMuted()
{
	if(myVideo.muted)
		{
			myVideo.muted = false;
			myVideo.volume = volumeSlider.value;
			volumeBt.value = "關閉聲音";
			volumeIcon.className='fa fa-volume-up fa-2x';
		}
	else
		{
			myVideo.muted = true;/*這個就可以靜音*/
			/*myVideo.volume = 0.0;*/
			volumeBt.value = "開啟聲音";
			volumeIcon.className='fa fa-volume-off fa-2x';
		}
}
function changeVolume()
{
	if(!myVideo.muted)
	{
	myVideo.volume =volumeSlider.value;
	}
	
}

