var player;
var playButton;
var $ = document.querySelector.bind(document);
var iframe;
var video_Id="DDDSbW9dJbM";
var videoURL ;
var fullScreenButton ;
var timeDisplay ;
var progressSlider ;
var volumeBt ;
var volumeSlider ;
var volumeIcon ;
var fastPlay ;
var rewindBt ;
var ReplayBt;
var start_time=16;/*全域變數，應該是秒數=2分鐘*/
var end_time=258;
var panel_width=1280;
var panel_height=720;
window.onload=function()
{
	videoURL=document.getElementById("videoURL");
	
	fullScreenButton=document.getElementById("fullScreenButton");
	fullScreenButton.onclick=fullScreen;
	
	timeDisplay=document.getElementById("timeDisplay");
	
	progressSlider=document.getElementById("progressSlider");
	progressSlider.oninput=changeProgress;/*試試看onchange和oninput*/
	
	update_intvl=setInterval(updateProgress,1000);/*影片進度顯示*/    
    
	volumeBt=document.getElementById("volum");
	volumeBt.onclick=volumOrMuted;
	
	volumeSlider=document.getElementById("volumeControl");
	volumeSlider.max=100;
	volumeSlider.oninput=changeVolume;
	
	volumeIcon=document.getElementById("volumeStatus");
	
	fastPlay=document.getElementById("fastPlay");
	fastPlay.onchange=playspeed;
	
	rewindBt=document.getElementById("rewind");
	rewindBt.onmousedown=playBack;
	rewindBt.onmouseup=stopRewind;
	
	ReplayBt=document.getElementById("Replay");
	ReplayBt.onclick=replayOrNot_value;
}
;


function onYouTubeIframeAPIReady()/*函數名稱請照抄*/
{
    player = new YT.Player('player_div',
						   {
							height:panel_height,
							width:panel_width,
							videoId:video_Id,
							playerVars:
										{
											'autoplay':0,/*0或1*/
											'controls':0,
											'start':start_time,
											'end':end_time,
											'showinfo':0,/*標題文字*/
											'rel':0,/*片尾推薦相關影片*/
											'iv_load_policy':3,/*影片的連結*/
										},
							events:
									{
										'onReady':onPlayerReady,
										'onStateChange':onPlayerStateChange
									}
							});
	
}

function onPlayerReady(event)/*一定要先寫出這個函數名稱，才能跑?*/
{
	playButton=document.getElementById("playOrPauseButton");
	playButton.onclick=playOrPauseHandler;
	iframe = $('#player_div');
	//顯示影片網址
    videoURL.value="https://www.youtube.com/watch?v="+video_Id;
	progressSlider.max=player.getDuration();
	
}

function onPlayerStateChange(event)/*一定要先寫出這個函數名稱，才能跑?*/
{
	console.log(event.data);/*event.data即PlayerState的代號*/
	//console.log(typeof(event.data));
	switch(event.data)
	{
		case 1://playing
				playButton.value="Pause!";
				console.log("已撥放");
			break;
		case 2://paused			
				playButton.value="Play!";
				console.log("已暫停");
			break;
		case 0://ended
				console.log("已結束");
				playButton.value="Play!";
				replayOrNot();
			break;
		default:
			//console.log(event.data);
			break;
	}
}

function playOrPauseHandler()
{
	switch(player.getPlayerState())
	{

		case 1://playing
			player.pauseVideo();
			break;
		case 2://paused
			player.playVideo();
			break;
		case 3://buffering
			break;
		case -1://unstaeted
			break;
		case 5://video cued
			player.playVideo();
			break;
		case 0://ended
			break;
		case 4:
			alert("State 4");
			break;
		default:
			alert("other State");
			break;
	}
		
}

function fullScreen()
{
  //player.playVideo();//won't work on mobile
  
  var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
  if (requestFullScreen) {
    requestFullScreen.bind(iframe)();
  }
}

function updateProgress()
{
    timeDisplay.innerHTML=
        Math.floor(player.getCurrentTime())+"/"+
        Math.floor(player.getDuration())+"秒";
    progressSlider.value=player.getCurrentTime();
}

function changeProgress()
{
    player.seekTo(progressSlider.value);
	updateProgress();
}

function volumOrMuted()
{
	if(player.isMuted())
		{
			console.log("即將開啟聲音");
			player.unMute();
			player.setVolume(volumeSlider.value);
			volumeBt.value = "關閉聲音";
			volumeIcon.className='fa fa-volume-up fa-2x';
		}
	else
		{
			console.log("即將關閉聲音");
			player.mute();/*這個就可以靜音*/
			/*player.volume = 0.0;*/
			volumeBt.value = "開啟聲音";
			volumeIcon.className='fa fa-volume-off fa-2x';
		}
}
function changeVolume()
{
	if(!player.isMuted())
	{
	player.setVolume(volumeSlider.value);
	}
	
}

function playspeed()
{
	player.setPlaybackRate(fastPlay.value);
}

function playBack()
{
	if(!player.paused)
    {
       playOrPauseHandler();
    }
	Interval_id=setInterval(goback,100);
}
function goback()
{
	player.seekTo(player.getCurrentTime()-0.15);/*seekTo會自動撥放*/
	player.pauseVideo();;/*別自動撥放，不然就沒辦法倒帶了*/
	progressSlider.value=player.getCurrentTime();
}

function stopRewind()
{
	clearInterval(Interval_id);
}
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
	if(ReplayBt.value=="停止重播")//要重播
	{
		player.seekTo(start_time);
	}
}

/*
請使用上課的練習進行延伸，最好能實作出上課沒有提到自己又想要做的功能。
(請看google document)
重複播放某個片段、撥放速度、peggo
五個影片的各自幾秒串起來
js拿掉那堆連結、廣告
拿掉推薦影片
另外，製作一個頁面，包含有：
主題介紹
程式說明!! 說出你的用心如正數倒數
學習心得 
*/
