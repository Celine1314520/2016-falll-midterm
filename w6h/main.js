//與課堂的交集，自己做了什麼，學到什麼，為什麼這麼做
var c;
var ctx;
var map= new Array(3);//[0,1,1,0,0,0,3,1,2];//0可走,1山,3敵人,2終點
for (var x=0;x<=2;x++)
	{
		map[x]=new Array(3);//二維陣列製作方式
		for(var y=0;y<=2;y++)
			{
				map[x][y]=0;//用二維陣列來記可以對應其X,Y
			}
	}
map[1][0]=1;
map[2][0]=1;
map[0][1]=3;
map[0][2]=1;
map[1][2]=1;
map[2][2]=2;

var talkbox;
var talkbox2;
var currentMainX=0,currentMainY=0;
var imgMain;
var length;
var level=1;

var spriteSheet_p = [0,0,80,130];//等級一的主角正面參數
var spriteSheet_b=[350,0,80,130];//等級一的主角背面
var spriteSheet_l=[175,0,80,130];//等級一的主角往左
var spriteSheet_r=[530,0,80,130];//等級一的主角往右

var level2_p=[196,0,25,36];//等級2的主角正面參數mario.png196 221
var level2_b=[196,35,25,36];//等級2的主角
var level2_l=[123,0,25,36];
var level2_r=[270,0,25,36];

var level3_p=[0,0,162,309];
var level3_b=[462,0,141,309];
var level3_l=[571,311,167,291];
var level3_r=[564,607,173,291];

var level1=[spriteSheet_p,spriteSheet_b,spriteSheet_l,spriteSheet_r];
var level2=[level2_p,level2_b,level2_l,level2_r];
var level3=[level3_p,level3_b,level3_l,level3_r];

var lv_parameter=[level1,level2,level3];
var main_pic_parameter;
/*畫面捲動馬力歐 小精靈 射擊遊戲 改善程式碼 使用者決定零件位置 用timer 去移動主角或配角*/
window.onload=function()
{
	c=document.getElementById("myCanvas");
	length=c.width/3;//使程式有較佳的彈性做修改
	ctx=c.getContext("2d");
	talkbox=document.getElementById("talkbox");
	talkbox2 = document.getElementById("talkbox2");
	talkbox2.innerHTML="目前等級:"+level;
	drawMain();
	//window.onkeydown=move;
	window.addEventListener("keydown",move,true);
}
;

function drawMain()
{
	for (var x=0;x<=2;x++)
	{		
		for(var y=0;y<=2;y++)
			{				
				switch(map[x][y])
				{
					case 1:
							Mountain(x,y);
							break;
					case 2:							
							NextPart(x,y);
							break;	
					case 3:
							Enemy(x,y);
							break;
					
					default:
							break;
				}
			}
	}
	//主角
	imgMain = new Image();
	if(level==1)
	{
		imgMain.src = "spriteSheet.png";
		imgMain.onload=function()
		{
		main_pic_parameter=lv_parameter[0][0];
		ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
		};
	}
	else if(level==2)
	{
		imgMain.src = "mario.png";
		imgMain.onload=function()
		{
		main_pic_parameter=lv_parameter[1][0];
		ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
		};
	}
	else if(level==3)
	{
		imgMain.src = "black_wind.png";
		imgMain.onload=function()
		{
		main_pic_parameter=lv_parameter[2][0];
		ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
		};
	}
}

function Mountain(X,Y)
{
	//山
	var img = new Image(); 
	img.src="illust2872.png";//material.png
	img.onload=function()
	{
		ctx.drawImage(img,length*X,length*Y,length,length);
		//ctx.drawImage(img,32,65,32,32,length*X,length*Y,length,length);
		//context.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
	};
}

function Enemy(X,Y)
{
	//路人
	var imgEnemy = new Image();
	imgEnemy.src="Enemy.png";
	imgEnemy.onload=function()
	{
		ctx.drawImage(imgEnemy,7,40,104,135,length*X,length*Y,length,length);
	};		
}
function NextPart(X,Y)
{
	var boxImg = new Image(); 
	boxImg.src="material.png";
	boxImg.onload=function()
	{
		ctx.drawImage(boxImg,287,0,32,32,length*X,length*Y,length,length);
	};
}

function move(e)
{
	e.preventDefault();
	switch(e.keyCode)
		{
			case 38://往上
			{
				ctx.clearRect(currentMainX*length,currentMainY*length,length,length);				
				CanGoAndWhat(currentMainX,currentMainY -1);
				main_pic_parameter=lv_parameter[level-1][1];
				ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
				break;
			}
			case 40://往下
			{
				ctx.clearRect(currentMainX*length,currentMainY*length,length,length);
				CanGoAndWhat(currentMainX,currentMainY+1);				
				main_pic_parameter=lv_parameter[level-1][0];
				ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
				break;
			}
			case 39://往右
			{
				ctx.clearRect(currentMainX*length,currentMainY*length,length,length);				
				CanGoAndWhat(currentMainX+1,currentMainY);
				main_pic_parameter=lv_parameter[level-1][3];
				ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
				break;
			}
			case 37://往左
			{
				ctx.clearRect(currentMainX*length,currentMainY*length,length,length);				
				CanGoAndWhat(currentMainX-1,currentMainY);
				main_pic_parameter=lv_parameter[level-1][2];
				ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
				break;
			}
			default:
				break;
			
		}
}
var enemyX,enemyY;
function CanGoAndWhat(X,Y)
{
	if(Y>=0 && Y<=2 && X>=0 && X<=2)//界線內
	{
		if(0==map[X][Y]||2==map[X][Y])
		{						
			currentMainY=Y;	
			currentMainX=X;	
			//talkbox.innerHTML= (2==map[X][Y] ? "恭喜你成為家族馬桶守護者!!" :"");
			if(2==map[X][Y])
				{
					talkbox.innerHTML= "恭喜你成為家族馬桶守護者!新關卡解鎖!";
					level=3;
					talkbox2.innerHTML= "目前等級:"+level;
					ctx.clearRect(X*length,Y*length,length,length);//清掉寶藏圖
					imgMain.src = "black_wind.png";
					ctx.clearRect(currentMainX*length,currentMainY*length,length,length);
					imgMain.onload=function()
					{
					main_pic_parameter=lv_parameter[level-1][0];
					ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
					};
					document.getElementById("next").style.visibility="visible";
					document.getElementById("autoButton").style.visibility="hidden";
				}
			else//==0
				{
					talkbox.innerHTML= "";
				}
		}
		else
		{
			if(3==map[X][Y])
				{
					talkbox.innerHTML="遇上敵人了，請小心迎戰吧!";
					enemyX=X;
					enemyY=Y;
					start_hidden_game();
					
				}
			else//==2
				{
					talkbox.innerHTML="等級不足無法上山";
				}
		}
	}
	else
	{
		talkbox.innerHTML="都到邊界了，還想走去哪兒阿";
	}
}
var paper,scissors,stone;
var player_action;
var computer_action;
var action_list=["scissors","paper","stone"];
function start_hidden_game()
{
	paper=document.getElementById("paper");
	scissors=document.getElementById("scissors");
	stone=document.getElementById("stone");
	paper.style.visibility="visible";
	scissors.style.visibility="visible";
	stone.style.visibility="visible";/*也可以把整個畫面洗掉做猜拳遊戲再回來*/
}
function do_scissors()
{
	player_action="scissors";
	computer_action=finger_guessing();//其實也可以直接在這裡random數字 節省許多效能 但是可讀性會下降
	switch(computer_action)
		{
			case "scissors":
				talkbox.innerHTML="敵人也出剪刀，平手,再來一拳";
				break;
			case "stone":
				talkbox.innerHTML="唉呀，被敵人石頭揍了一拳，請再加油";
				break;
			case "paper":
				talkbox.innerHTML="敵人出布，恭喜獲勝!等級提升";
				finger_win();
				break;
		}
}
function do_paper()
{
	player_action="paper";
	computer_action=finger_guessing();
	switch(computer_action)
		{
			case "scissors":
				talkbox.innerHTML="敵人出了剪刀，請再加油";
				break;
			case "stone":
				talkbox.innerHTML="敵人出石頭，恭喜獲勝!等級提升";
				finger_win();
				break;
			case "paper":
				talkbox.innerHTML="敵人也出布，平手,再來一拳";				
				break;
		}
}
function do_stone()
{
	player_action="stone";
	computer_action=finger_guessing();
	switch(computer_action)
		{
			case "scissors":
				talkbox.innerHTML="敵人出剪刀，恭喜獲勝!等級提升";
				finger_win();				
				break;
			case "stone":
				talkbox.innerHTML="敵人也出石頭，平手,再來一拳";				
				break;
			case "paper":
				talkbox.innerHTML="敵人出布，請再加油";
				break;
		}
}
function finger_guessing()
{
	dice = Math.floor(Math.random()*3);
	return action_list[dice];
}
function finger_win()
{
	level=2;
	talkbox2.innerHTML = "目前等級:"+level ;
	paper.style.visibility="hidden";
	scissors.style.visibility="hidden";
	stone.style.visibility="hidden";
	ctx.clearRect(enemyX*length,enemyY*length,length,length);
	map[enemyX][enemyY]=0;
	document.getElementById("autoButton").style.visibility="visible";
	imgMain.src = "mario.png";
	ctx.clearRect(currentMainX*length,currentMainY*length,length,length);
	imgMain.onload=function()
	{
	main_pic_parameter=lv_parameter[1][0];
	ctx.drawImage(imgMain,main_pic_parameter[0],main_pic_parameter[1],main_pic_parameter[2],main_pic_parameter[3],currentMainX*length,currentMainY*length,length,length);
	};
}

function autoMove()
{
	var e={keyCode:40,preventDefault:function(){}};//打贏敵人幫他往下走一格 互動效果比較好 但是這樣會刷掉talkbox的文字
	move(e);
	window.setTimeout("a2()",500);
}
function a2()
{
	var e={keyCode:39,preventDefault:function(){}};
	move(e);
	window.setTimeout("a3()",500);
}
function a3()
{
	var e={keyCode:39,preventDefault:function(){}};
	move(e);
	window.setTimeout("a4()",500);
}
function a4()
{
	var e={keyCode:40,preventDefault:function(){}};
	move(e);
}
/**********************************************************************************************/
var isSelected= new Array(3);
for (var i=0;i<=2;i++)
	{
		isSelected[i]= new Array(3);//二維陣列製作方式
	}
var currentPlayer;//由第一個人開始，就不用每次按了都要CHECK是不是0，比較有時間效率
var adj;
var count;//平手的終止
var computer_step=1;//從第一步開始
var money=0;
var mood;
function Next_game()
{
	isSelected= new Array(3);
	for (var i=0;i<=2;i++)
	{
		isSelected[i]=new Array(3);//二維陣列製作方式
		for(var j=0;j<=2;j++)
			{
				isSelected[i][j]=0;//用二維陣列來記可以對應其X,Y，要判斷輸贏也比較好使用
			}
	}
	currentPlayer=1;//由第一個人開始，就不用每次按了都要CHECK是不是0，比較有時間效率	
	count=0;//平手的終止
	computer_step=1;//從電腦的計步器初始化
	window.removeEventListener("keydown",move,true);//停止監聽鍵盤事件
	adj = 0.4*length/1.207;//(原本想讓長度=圓的半徑)，但是畫出來視覺效果比圓小，那改成1~1.414(根號2近似值)的中間
	ctx.strokeStyle="black";
	ctx.lineWidth="30";
	//c.onmousedown=selecting;
	document.getElementById("myCanvas").addEventListener("mousedown",selecting,true);
	drawpanel();
	if(money>=100)
		{
			mood="憤怒";
		}
	else
	{
		console.log(money);
		mood="普通";
	}
}
function drawpanel()
{
	var bgImg = new Image(); 
	bgImg.src="grasses68.gif";//這個是跟著html位置
	bgImg.onload=function()
	{
		ctx.drawImage(bgImg,0,0,600,600,0,0,600,600);
		//c.style.backgroundImage="grasses68.gif";//這個是跟著js檔位置 //失敗~
		talkbox.innerHTML="";
		document.getElementById("next").value="再來一局";
		document.getElementById("next").style.visibility="hidden";		
		for(var i=length;i<c.width;i+=length)
		{
			ctx.beginPath();//- begins a path
			ctx.moveTo(i,0);/*鉛垂線*/
			ctx.lineTo(i,c.height);
			ctx.moveTo(0,i);
			ctx.lineTo(c.width,i);
			ctx.lineWidth="2";
			ctx.strokeStyle="black";
			ctx.closePath();
			ctx.stroke();				
		}
	};
}

function selecting(event)
{
	var X=Math.floor(event.offsetX/length);
	/*****用變數存起來，不用每次都運算，比較有效率，code也比較好閱讀，是較佳的coding style******/
	/*而length用變數其實較無效率(且佔記憶體?)，但可使程式碼較有彈性，也較可reuse*/
	var XCenter=(X+0.5)*length;
	//下面會用到很多次，算一次就好，存起來用(其實我不確定存取比較貴還是乘法運算比較貴OAO)
	
	var Y=Math.floor(event.offsetY/length);
	var YCenter=(Y+0.5)*length;
	if(0==isSelected[X][Y])//正在習慣把==比較運算倒過來寫，避免打錯時執行過程將變數設值 #Yoda Conditions
		{				
			if(1==currentPlayer)
				{	
					ctx.beginPath();//- begins a path
					ctx.arc(XCenter,YCenter,0.4*length,0,Math.PI*2);
					ctx.closePath();					
				}
			else
				{					
					ctx.beginPath();
					ctx.moveTo(XCenter-adj,YCenter-adj);//調整到左上
					ctx.lineTo(XCenter+adj,YCenter+adj);//畫到右下
					ctx.moveTo(XCenter+adj,YCenter-adj);//畫桿拉到右上
					ctx.lineTo(XCenter-adj,YCenter+adj);//畫到左下
					ctx.closePath();
				}
			ctx.stroke();
			
			isSelected[X][Y]=currentPlayer;	
			count++;			
			//最快要從第五個才會獲勝，大於四再開始檢查比較有效率
			if(count>4)
				{//下面判斷win，要利用按下這一刻會發生勝利的特性，這部分就不用檢查是不是0==0的情形了
					var A=0;
					var B=0;					
					for(var i=0;i<=2;i++)
					{
						if(currentPlayer==isSelected[i][Y])//isSelected[X][Y]==isSelected[i][Y]
						{
							A++;
						}
						if(currentPlayer==isSelected[X][i])
						{
							B++;
						}						
					}
					if(3==A || 3==B)
					{
						end();						
						return;
					}
					else 
					{
						var center=isSelected[1][1];
						if(center==currentPlayer)//斜線就要檢查不是0 ,要透過斜線贏一定要是拿到中間的玩家
							{
								if(isSelected[0][0]==center && center==isSelected[2][2])//左上右下斜線
									{
										end();
										return;
									}
								else if(isSelected[2][0]==center && center==isSelected[0][2])//右上左下
									{
										end();
										return;
									}
								else if(9==count)
									{
										alert("平手");
										if(money>=100)
										{
											mood="憤怒";
										}
										else
										{
											console.log(money);
											mood="普通";
										}
										talkbox2.innerHTML="目前等級:3  |  ＄="+money+"  |  "+"魔王狀態："+mood;
										document.getElementById("myCanvas").removeEventListener("mousedown",selecting,true);
										document.getElementById("next").style.visibility="visible";	
										return;
										
									}
							}
						else if(9==count)
									{
										alert("平手");
										if(money>=100)
										{
											mood="憤怒";
										}
										else
										{
											console.log(money);
											mood="普通";
										}
										talkbox2.innerHTML="目前等級:3  |  ＄="+money+"  |  "+"魔王狀態："+mood;
										document.getElementById("myCanvas").removeEventListener("mousedown",selecting,true);
										document.getElementById("next").style.visibility="visible";	
									}
						
					}
				}			
			currentPlayer = (currentPlayer==1 ? 2:1 );//下一個人
		}
	if(currentPlayer==2 && count <9)//換電腦玩了
	{
		if(money>=100)
		{
		var talkbox = document.getElementById("talkbox");
		var e = {offsetX:10,offsetY:10};
		if(computer_step==1)//第一步
			{
				if(isSelected[1][1]==0)//中間還沒拿就拿中間
				{
					e.offsetX=300;
					e.offsetY=300;
					selecting(e);
					talkbox.innerHTML="魔王：啊哈~嚇到了吧";	
				}
				else//中間被拿了就拿右上//想要比較不被抓到pattern的話可以random那四個位置
				{
					e.offsetX=500;
					e.offsetY=100;
					selecting(e);
					talkbox.innerHTML="魔王：唉呀!沒什麼";
				}
				computer_step++;
			}
		else if(computer_step>=2)//第二步
			{
				if(isSelected[1][1]==1)//中間是玩家的
					{
						if(X==0)
							{
								if(Y==0)//玩家下在左上
								{
									talkbox.innerHTML="魔王：看來你也沒有很厲害嘛~";
									simulation(500,500);
									
								}
								else if(Y==1)
									{
										talkbox.innerHTML="魔王：再回去練個一百年吧!";
										simulation(500,300);									
										
									}
								else
									{
										talkbox.innerHTML="";		
										alert("魔王：唉呀 讓我想一想!");//彩蛋互動
										simulation(500,500);
																
									}
							}
						else if(X==1)
							{
								if(Y==0)//玩家下在中上
								{
									talkbox.innerHTML="魔王：看我這一招";
									simulation(300,500);//中下									
									
								}
								else//玩家下在中下
									{				
										talkbox.innerHTML="魔王：唉呀,容我問周公";
										simulation(300,100);//中上								
										
									}
							}
						else//X==2
							{
								if(Y==1)//玩家下在右中
									{				
										talkbox.innerHTML="魔王：有沒有吃飯呀，這攻擊不痛不癢的";
										simulation(100,300);//左中								
										
									}
								else//玩家下在右下
									{
										talkbox.innerHTML="";
										alert("魔王：魔王心理苦但魔王不說");//彩蛋互動
										simulation(100,100);//左上								
										
									}
							}
					}
				else if(isSelected[1][1]==2)//中間是我的
				{
					//isSelected[X][Y]
					if(isSelected[0][0]==1)//左上角是玩家的
					{
						if(isSelected[0][1]==1)//玩家又下在第一排
						{
							if(computer_step==4)
								{
									talkbox.innerHTML="魔王：哇哈哈哈";
									if(X!=0 && Y!=1)
										{
											simulation(100,300);
										}
									else
										{
											simulation(300,500);
										}
									
								}
							else if(computer_step==3)
								{
									
									if(isSelected[2][0]==0)
										{
											talkbox.innerHTML="魔王：真是爽快!";
											simulation(500,100);
										}
									else if(isSelected[2][0]==2)
										{
											talkbox.innerHTML="魔王：我不太確定你知不知道規則";
											simulation(100,500);
										}
									else
										{
											//alert("我需要求救");
											simulation(300,100);
										}
									
								}
							else
								{
									talkbox.innerHTML="魔王：嗯，我思考一下";
									simulation(100,500);
								}
							
						}
						else if (isSelected[0][2]==1)
						{
							if(computer_step>=3)
							{
								
								if(computer_step==4)
								{
									talkbox.innerHTML="魔王：我是無敵大魔王";
									if(isSelected[1][0]==0)//攻擊
									{
										simulation(300,100);
									}
									else if(isSelected[1][2]==0)//攻擊
									{
										simulation(300,500);
									}
									else if(isSelected[1][0]==1)//防衛
									{
										simulation(500,100);
									}	
									else if(isSelected[1][2]==1)//防衛
									{										
										simulation(500,500);
									}
									else
										{
											alert("something strange");
											simulation(300,300);
										}
																		
								}
								else //第3步
								{
									talkbox.innerHTML="魔王：不好意思，我進化了";
									if(isSelected[2][1]==0)
									{
										/*if(isSelected[1][2]==1)
											{
												simulation(500,500);
											}
										else if(isSelected[1][0]==1)
											{
												simulation(500,100);
											}
										else*/
											{
												simulation(500,300);
											}										
									}
									else
									{
										simulation(300,500);
									}
								}
																	
							}
							else//第2步
								{
									talkbox.innerHTML="魔王：我這招如何~";	
									simulation(100,300);
								}
													
						}
						else if (isSelected[1][0]==1)//玩家又下在第一列
						{
							talkbox.innerHTML="魔王：你可別小看我";
							simulation(500,100);							
							
						}
						else if (isSelected[2][0]==1)//玩家又下在第一列
						{
							talkbox.innerHTML="魔王：你知道我可是OOXX大師嘛";
							if(isSelected[1][0]==0)
								{
									simulation(300,100);
								}
							else
								{
									talkbox.innerHTML="魔王：我.....";
									simulation(300,300);
								}														
							
						}
						else if (isSelected[1][2]==1)
						{
							talkbox.innerHTML="魔王：看來你有點厲害..";
							simulation(100,500);
							
						}
						else if(isSelected[2][1]==1)
						{
							talkbox.innerHTML="魔王：看來你也非等閒之輩..";
							simulation(500,100);							
							
						}
						else if(isSelected[2][2]==1)
						{
							talkbox.innerHTML="魔王：我也不是省油的燈!";
							simulation(300,100);							
						}
						else
						{
							talkbox.innerHTML="你確定?";
							simulation(Math.random()*600,Math.random()*600);
							
						}
						
					}
					else if(isSelected[2][2]==1)//右下角是玩家的
					{
						if(isSelected[2][1]==1)//玩家又下在第三排
						{	
							talkbox.innerHTML="魔王：你的程度就這樣?";
							if(isSelected[2][0]==0)
								{
									simulation(500,100);
								}
							else
								{
									simulation(300,500);
								}
														
						}
						else if (isSelected[2][0]==1)
						{
							
							if(computer_step==3)
								{
									talkbox.innerHTML="魔王：我變聰明了，別想騙我";
									if(isSelected[0][1]==0)
										{
											simulation(100,300);
										}
									else if(isSelected[1][2]==0)
										{
											simulation(300,500);
										}
									else
										{
											alert("程式設計師幫我看一下我該下在哪裡");
										}
								}
							else
							{
								talkbox.innerHTML="魔王：你還需要再回去練一練";
								simulation(500,300);
							}
															
						}
						else if (isSelected[0][2]==1)//玩家又下在第三列
						{
							talkbox.innerHTML="魔王：我可不是三歲小孩";
							simulation(300,500);							
						}
						else if (isSelected[1][2]==1)
						{
							talkbox.innerHTML="魔王：高手!";
							simulation(100,500);							
						}
						else if (isSelected[1][0]==1)
						{
							talkbox.innerHTML="魔王：好手!不愧是馬桶守護神";
							simulation(500,100);							
						}
						else if(isSelected[0][1]==1)
						{
							talkbox.innerHTML="魔王：果然不是泛泛之輩";
							simulation(100,500);
							
						}
						else
						{
							talkbox.innerHTML="";
							alert("魔王：你確定?");							
							//simulation(Math.random()*600,Math.random()*600);
							
						}
						
					}
					else if(isSelected[2][0]==1)//右上角是玩家的
					{
						if(isSelected[1][0]==1)
						{
							talkbox.innerHTML="魔王：別藐視我啊";
							if(isSelected[0][0]==0)
								{
									simulation(100,100);
								}
							else
								{
									simulation(500,500);
								}
							
							
						}
						else if (isSelected[2][1]==1)
						{
							talkbox.innerHTML="魔王：我可是魔王呢";
							simulation(500,500);
							
						}
						else if (isSelected[1][2]==1)
						{
							talkbox.innerHTML="魔王：真是太有趣了";
							simulation(500,500);
							
						}
						else if(isSelected[0][1]==1)
						{
							//simulation(100,100);
							talkbox.innerHTML="魔王：唉呀，真是絕";
							simulation(300,500);
						}
						else if(isSelected[0][2]==1)
						{
							talkbox.innerHTML="魔王：厲害!";
							simulation(300,100);							
							
						}
						else
						{
							alert("魔王：這是什麼棋步?");
							talkbox.innerHTML="";
							//simulation(Math.random()*600,Math.random()*600);					
							
						}
						
					}
					else if(isSelected[0][2]==1)//左下角是玩家的
					{
						if (isSelected[0][1]==1)
						{
							talkbox.innerHTML="魔王：這攻擊不痛不癢";
							simulation(500,500);				
							
						}
						else if (isSelected[1][2]==1)
						{
							talkbox.innerHTML="魔王：我都快要睡著了";
							simulation(100,100);				
							
						}
						else if (isSelected[1][0]==1)
						{
							talkbox.innerHTML="魔王：太猛了";
							simulation(100,100);						
							
						}
						else if(isSelected[2][1]==1)
						{
							talkbox.innerHTML="魔王：這一步走得真好!";
							simulation(500,500);
							
						}
						else
						{
							alert("魔王：我很困惑");
							talkbox.innerHTML="";
							simulation(Math.random()*600,Math.random()*600);		
							
						}
						
					}
					else
					{
						
						talkbox.innerHTML="魔王：你是不是怪怪的呀";
						if(isSelected[2][1]==1 && isSelected[1][0]==1 )
							{
								if(computer_step==3)
									{
										simulation(100,500);
									}
								else
								{
								simulation(500,100);
								}
							}
						else if(isSelected[2][1]==1 && isSelected[1][2]==1)
							{
								if(computer_step==3)
									{
										simulation(100,100);
									}
								else
								{
								simulation(500,500);
								}
							}
						else if(isSelected[0][1]==1 && isSelected[1][0]==1)
							{
								if(computer_step==3)
									{
										simulation(100,500);
									}
								else
								{
									simulation(100,100);
								}
								
							}
						else if(isSelected[0][1]==1 && isSelected[1][2]==1)
							{
								if(computer_step==3)
									{
										simulation(500,100);
									}
								else
								{
								simulation(100,500);
								}
							}
						else
							{
								talkbox.innerHTML="魔王:我有點害怕";
								simulation(300,300);
							}
						
												
						
					}
					
				}
			computer_step++;
			}
		
	}
		else
		{
		var talkbox = document.getElementById("talkbox");
		var e = {offsetX:10,offsetY:10};
		if(computer_step==1)//第一步
			{
				if(isSelected[1][1]==0)//中間還沒拿就拿中間
				{
					e.offsetX=300;
					e.offsetY=300;
					selecting(e);
					talkbox.innerHTML="魔王：啊哈~嚇到了吧";	
				}
				else//中間被拿了就拿右上//想要比較不被抓到pattern的話可以random那四個位置
				{
					e.offsetX=500;
					e.offsetY=100;
					selecting(e);
					talkbox.innerHTML="魔王：唉呀!沒什麼";
				}
				computer_step++;
			}
		else if(computer_step>=2)//第二步
			{
				if(isSelected[1][1]==1)//中間是玩家的
					{
						if(X==0)
							{
								if(Y==0)//玩家下在左上
								{
									simulation(500,500);
									talkbox.innerHTML="魔王：看來你也沒有很厲害嘛~";
								}
								else if(Y==1)
									{
										simulation(500,300);									
										talkbox.innerHTML="魔王：再回去練個一百年吧!";
									}
								else
									{
										alert("魔王：唉呀 讓我想一想!");//彩蛋互動
										simulation(500,500);
										talkbox.innerHTML="";								
									}
							}
						else if(X==1)
							{
								if(Y==0)//玩家下在中上
								{
									
									simulation(300,500);//中下									
									talkbox.innerHTML="魔王：看我這一招";
								}
								else//玩家下在中下
									{										
										simulation(300,100);//中上								
										talkbox.innerHTML="魔王：唉呀,容我問周公";
									}
							}
						else//X==2
							{
								if(Y==1)//玩家下在右中
									{										
										simulation(100,300);//左中								
										talkbox.innerHTML="魔王：有沒有吃飯呀，這攻擊不痛不癢的";
									}
								else//玩家下在右下
									{
										alert("魔王：魔王心理苦但魔王不說");//彩蛋互動
										simulation(100,100);//左上								
										talkbox.innerHTML="";
									}
							}
					}
				else if(isSelected[1][1]==2)//中間是我的
				{
					//isSelected[X][Y]
					if(isSelected[0][0]==1)//左上角是玩家的
					{
						if(isSelected[0][1]==1)//玩家又下在第一排
						{				
							simulation(100,500);							
							talkbox.innerHTML="魔王：嗯，我思考一下";
						}
						else if (isSelected[0][2]==1)
						{
							simulation(100,300);
							talkbox.innerHTML="魔王：我這招如何~";							
						}
						else if (isSelected[1][0]==1)//玩家又下在第一列
						{
							simulation(500,100);							
							talkbox.innerHTML="魔王：你可別小看我";
						}
						else if (isSelected[2][0]==1)//玩家又下在第一列
						{
							simulation(300,100);							
							talkbox.innerHTML="魔王：你知道我可是OOXX大師嘛";
						}
						else if (isSelected[1][2]==1)
						{
							simulation(100,500);
							talkbox.innerHTML="魔王：看來你有點厲害..";
						}
						else if(isSelected[2][1]==1)
						{
							simulation(500,100);							
							talkbox.innerHTML="魔王：看來你也非等閒之輩..";
						}
						else if(isSelected[2][2]==1)
						{
							simulation(300,100);
							talkbox.innerHTML="魔王：我也不是省油的燈!";
						}
						else
						{
							simulation(Math.random()*600,Math.random()*600);
							talkbox.innerHTML="你確定?";
						}
						
					}
					else if(isSelected[2][2]==1)//右下角是玩家的
					{
						if(isSelected[2][1]==1)//玩家又下在第三排
						{	
							talkbox.innerHTML="魔王：你的程度就這樣?";
							simulation(500,100);							
						}
						else if (isSelected[2][0]==1)
						{
							talkbox.innerHTML="魔王：你還需要再回去練一練";
							simulation(500,300);								
						}
						else if (isSelected[0][2]==1)//玩家又下在第三列
						{
							talkbox.innerHTML="魔王：我可不是三歲小孩";
							simulation(300,500);							
						}
						else if (isSelected[1][2]==1)
						{
							simulation(100,500);
							talkbox.innerHTML="魔王：高手!";
						}
						else if (isSelected[1][0]==1)
						{
							simulation(500,100);
							talkbox.innerHTML="魔王：好手!不愧是馬桶守護神";
						}
						else if(isSelected[0][1]==1)
						{
							simulation(100,500);
							talkbox.innerHTML="魔王：果然不是泛泛之輩";
						}
						else
						{
							alert("魔王：你確定?");
							simulation(Math.random()*600,Math.random()*600);
							talkbox.innerHTML="";
						}
						
					}
					else if(isSelected[2][0]==1)//右上角是玩家的
					{
						if(isSelected[1][0]==1)
						{
							simulation(100,100);
							talkbox.innerHTML="魔王：別藐視我啊";
						}
						else if (isSelected[2][1]==1)
						{
							simulation(500,500);
							talkbox.innerHTML="魔王：我可是魔王呢";
						}
						else if (isSelected[1][2]==1)
						{
							simulation(500,500);
							talkbox.innerHTML="魔王：真是太有趣了";
						}
						else if(isSelected[0][1]==1)
						{
							simulation(100,100);
							talkbox.innerHTML="魔王：唉呀，真是絕";
						}
						else if(isSelected[0][2]==1)
						{
							simulation(300,100);							
							talkbox.innerHTML="魔王：厲害!";
						}
						else
						{
							alert("魔王：這是什麼棋步?");
							simulation(Math.random()*600,Math.random()*600);					
							talkbox.innerHTML="";
						}
						
					}
					else if(isSelected[0][2]==1)//左下角是玩家的
					{
						if (isSelected[0][1]==1)
						{
							simulation(100,100);						
							talkbox.innerHTML="魔王：這攻擊不痛不癢";
						}
						else if (isSelected[1][2]==1)
						{
							simulation(500,500);						
							talkbox.innerHTML="魔王：我都快要睡著了";
						}
						else if (isSelected[1][0]==1)
						{
							simulation(100,100);						
							talkbox.innerHTML="魔王：太猛了";
						}
						else if(isSelected[2][1]==1)
						{
							simulation(500,500);
							talkbox.innerHTML="魔王：這一步走得真好!";
						}
						else
						{
							alert("魔王：我很困惑");
							simulation(Math.random()*600,Math.random()*600);					
							talkbox.innerHTML="";
						}
						
					}
					else
					{						
						simulation(Math.random()*600,Math.random()*600);						
						talkbox.innerHTML="我很緊張";
					}
					
				}
			computer_step++;
			}
		
	}
	}
}
function simulation(x,y)
{
	var e = {offsetX:10,offsetY:10};
	e.offsetX=x;
	e.offsetY=y;
	var cx = Math.floor(e.offsetX / 200);
	var cy = Math.floor(e.offsetY / 200);
	console.log(computer_step+":能不能放?:"+cx+","+cy+talkbox.innerHTML);
	while(isSelected[cx][cy]!=0)
		{
			e.offsetX=Math.random()*600;
			e.offsetY=Math.random()*600;
			var cx = Math.floor(e.offsetX / 200);
			var cy = Math.floor(e.offsetY / 200);
			console.log("不能，新刷:"+cx+","+cy);
		}
	selecting(e);
	/*if(isSelected[cx][cy]!=0)
		{
			alert("工人智慧");
		}
	else
	{
		selecting(e);
	}*/
}

function end()
{
	
	if(currentPlayer==1)
		{
			money+=100;
			alert("恭喜你獲勝!");
		}
	else						
		{
			money-=50;
			alert("唉呀輸了，噴了一些錢!");			
		}
	if(money>=100)
	{
		mood="憤怒";
	}
	else
	{
		console.log(money);
		mood="普通";
	}
	talkbox2.innerHTML="目前等級:3  |  ＄="+money+"  |  "+"魔王狀態："+mood;
	document.getElementById("myCanvas").removeEventListener("mousedown",selecting,true);
	document.getElementById("next").style.visibility="visible";	
}