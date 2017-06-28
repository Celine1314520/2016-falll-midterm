<!DOCTYPE html>
<?php
	ini_set ('display_errors', true);
    error_reporting (E_ALL);

	include_once "config.php";
	include_once "MyUser.class.php";

	ob_start();

     session_start();

	$actionList = array (
		'goods'=> 'goods.php' ,
		'orders' => 'orders.php' ,
		'shirt1' => 'shirt1.php' ,
		'PositionAndColor'=>'PositionAndColor.php',
		'login'=> 'login.php' ,
		'logout' => 'logout.php' ,
		'register'=>'register.php',
		'creatAccount'=>'creatAccount.php',
		'modify'=>'modifyInformation.php',
		'updateAccount'=>'updateAccount.php',
		'insertOrder' => 'insertOrder.php' ,
		'reload' => 'reload.php' ,
		'checkMyOrders' => 'checkMyOrders.php' ,
		'Guestbook' => 'Guestbook.html' ,
		'newssave' => 'newssave.php',
		'shownews' => 'shownews.php',
		
	);
	
	if (isset ($_SESSION['my-user'])) {
	$myuser = $_SESSION['my-user'];}
	$use_layout = true;

	if (isset ($_SESSION['use-layout'])) {
		$use_layout = $_SESSION['use-layout'];
	}
	require_once("db.php");
?>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="快來看看我的客製商品" />
<meta property="og:description" content="酷炫狂跩哪炸天的客製化商品，我的眼光是最獨到的" />
<meta property="og:url" content="http://140.115.227.122/1SA/index.php" />
<meta property="og:image" content="C:\Users\user\Desktop\SA\img\blueshirt2.png"/>
<meta property="og:type" content="website" />
<link rel="icon" href="http://flat-icon-design.com/f/f_event_87/s512_f_event_87_2bg.png" />
<title>A3O1客製化球裝模擬搭配訂購網</title>

<?php /* Bootstrap */ ?>
<link rel="stylesheet" href="css/bootstrap.css">
<style>
 body{
		    	text-align:center;
		    	background-color:#DDDBDB}	 
					a img {		    				
		     	border-width:0;
 				opacity:1;
				  }

			a img:hover {
								
 					 opacity:0.8;
 					
						} 
			a img#fb{
				opacity:0.8;
				}
			a img#fb:hover{
				opacity:1;
				}
			/*p#save{
				background-color:red;}
			p#save:hover {
			background-color: #DD0003;
			}
			p#reset{
				background-color: #0FCD88;}
			p#reset:hover {
			background-color:#0FAA22;
			}*/
	}
</style>

		<script type="text/javascript">
		function showImage(btn){
			var a = document.getElementById("myimg");
			var b = document.getElementById("myimg1");
			var c = document.getElementById("myimg2");			
			var entity=[];			
		   		 $("#carousel1").carousel().on('slid.bs.carousel', function (e) {							
   						var slideFrom = $(this).find('.active').index();
						var slideTo = $(e.relatedTarget).index();  
				  				
										if(slideTo == 0){
    													   entity[0]="http://i.imgur.com/XegiYEs.jpg";
														   										}
	
										if(slideTo == 1){
    													   entity[0]="http://i.imgur.com/ciTeGDJ.jpg";	   
	 													  	}
	
										if(slideTo == 2){
      													  entity[0]="http://i.imgur.com/PH6y65N.jpg";														
																	}		
										a.src=entity[0];
																 	
     
				 });	
				 
				 $("#carousel2").carousel().on('slid.bs.carousel', function (e) {							
   						var slideFrom = $(this).find('.active').index();
						var slideTo = $(e.relatedTarget).index();  
				  				
										if(slideTo == 0){
    													   entity[1]="http://i.imgur.com/hoQDTk1.jpg";
														   										}
	
										if(slideTo == 1){
    													   entity[1]="http://i.imgur.com/pq3ta3Y.jpg";	   
	 													  	}
	
										if(slideTo == 2){
      													  entity[1]="http://i.imgur.com/V68QzfD.jpg";														
																	}		
										b.src=entity[1];
																 	
     
				 });	
				 
				 $("#carousel3").carousel().on('slid.bs.carousel', function (e) {							
   						var slideFrom = $(this).find('.active').index();
						var slideTo = $(e.relatedTarget).index();  
				  				
										if(slideTo == 0){
    													   entity[2]="http://i.imgur.com/8ByGvs3.png";
														   										}
	
										if(slideTo == 1){
    													   entity[2]="http://i.imgur.com/PrNXi6p.png";	   
	 													  	}
	
										if(slideTo == 2){
      													  entity[2]="http://i.imgur.com/tVWSWzR.jpg";														
																	}		
										c.src=entity[2];
																 	
     
				 });	
		 	  
			
			
				/*if(a.src.indexOf("imgur") == -1){
				
				}			
				if(b.src.indexOf("imgur") == -1){
				b.src="http://i.imgur.com/mejbpq6.jpg";				
				}
				if(c.src.indexOf("imgur") == -1){
				c.src="http://i.imgur.com/RpqfpqS.jpg";				
				}*/
				
				 /*btn.onclick = Function("return false;");
        		 btn.disabled = true;
        		 return true;*/
				 
		}
		
		
		function allreset(){
			var a = document.getElementById("myimg");
			var b = document.getElementById("myimg1");
			var c = document.getElementById("myimg2");		
			a.src="";
			b.src="";
			c.src="";			
			}
		
					
        </script>     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php /* HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries */ ?>
<?php /* WARNING: Respond.js doesn't work if you view the page via file:// */ ?>
<?php /*[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]*/ ?>
</head>
<body onLoad="showImage()">
<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid"> 
    <?php /* Brand and toggle get grouped for better mobile display */ ?>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  A3O1</a> </div>
    
    <?php /* Collect the nav links, forms, and other content for toggling */ ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php?action=Guestbook">我要留言</a> </li>
		<li><a href="index.php?action=shownews">留言板</a> </li>
		<?php /*<li class="active"><a href="#">留言板 <span class="sr-only">(current)</span></a> </li>*/ ?>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">商品分類 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">球衣</a> </li>
            <li><a href="#">球褲</a> </li>
            <li><a href="#">球鞋</a> </li>
            <li class="divider"></li>
            <li><a href="#">全部商品</a> </li>
          </ul>
        </li>
         <li class="share"><a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('google.com.tw'))));"><img id="fb" class="share" src="http://i.imgur.com/ochpYT5.png" width="25px" height="25px" alt="thumb"  style="padding-bottom:0px;border-radius:5px"></a> </li>  
         
      </ul>
	  <ul class="nav navbar-nav navbar-right">
	  <?php /*<li><a href="#">廠商登入</a> </li>*/ ?>     
      <form class="navbar-form  navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">查詢</button>
      </form>
        
		<?php /*
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		*/ ?>
		<?php if (isset ($myuser)==0) : ?>
			<li><a href="index.php?action=register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li class="dropdown">
                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" name="form1" role="form" method="post" action="index.php?action=login" accept-charset="UTF-8" id="login-nav" onsubmit="return checkdata()" ng-app="">
                                    <div class="form-group">
                                       
                                       <input type="text" class="form-control" name="LoginAccount" placeholder="Account" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" name="LoginPwd"  ng-model="LoginPwd"  placeholder="Password"> 
									   <?php /*ng-pattern="/^(?=^[A-Za-z0-9].{8,30}$/"*/ ?>
										 <?php /*<alert ng-class="{'error':form1.LoginPwd.$error.pattern}">密碼有誤</alert>*/ ?>
										 <?php /*還沒看完的表單驗證 http://dokelung-blog.logdown.com/posts/221431-django-notes-8-form-validation-and-modeling
										 */ ?>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <?php /*<input type="checkbox"> Remember me*/ ?>
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success btn-block" >Sign in</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
			<?php elseif (isset ($myuser)) : ?>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $myuser;//->account;?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?action=modify">修改密碼</a></li>
						<li><a href="index.php?action=checkMyOrders">檢視訂單</a></li>
						<li class="divider"></li>
						<li><a href="index.php?action=logout">登出</a></li>
					</ul>
				</li>
			<?php endif; ?>
				
					 
						<?php /*
                        <li class="divider"></li>
                        <li>
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                        </li>
						*/ ?>
                     </ul>
                  </li>
		

      
    </div>
  </div>

      
        
    
    
    <?php /* /.navbar-collapse */ ?> 
  
  <?php /* /.container-fluid */ ?> 
</nav>

<?php if  (isset ($_GET['action'])) :{ ?>
<?php
	
		$action = $_GET['action'];
		if (array_key_exists ($action, $actionList)) {
			include $actionList[$action];
		} else {
			echo 'Action: "' . htmlspecialchars($action) . '" not found!';
		}
	
?>
<?php } ?>
<?php else:{ ?>
<script type="text/javascript">
		function showAlert(){
			var name=prompt("請輸入您想要客製化的文字");	
			if (name != null && name !=""){                
                      alert("您好, 您客製化的內容為「"+name+"」, 客製化進行中"); 
					  location.href="index.php?action=shirt1";
                  }
            else{		
		    alert("請輸入正確客製化內容");
			}
		}
		</script>
<div class="container" align="center" >
  <?php /*<div class="row" style="height:300px;width:1000px" >*/ ?>
  <div class="row" style="embed-responsive embed-responsive-16by9" >
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div id="carousel1" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators" >
            <li data-target="#carousel1" data-slide-to="0" class="shirt active" ></li>
            <li data-target="#carousel1" data-slide-to="1" class="shirt"> </li>
            <li data-target="#carousel1" data-slide-to="2" class="shirt"> </li>          
          </ol>
          <div class="carousel-inner">
            <div class="item active" align="center"><a data-toggle="modal" data-target="#shirt1"><img class="img-responsive" 
			<?php if ( !isset ($_SESSION['i'])|| $_SESSION['i']==0): {$_SESSION['i']=0;?>src="http://i.imgur.com/vtGNih1.jpg" <?php ;} ?>
			<?php elseif ($_SESSION['i']==1):{ ?> src="http://i.imgur.com/9JQmqJO.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==2):{ ?> src="http://i.imgur.com/zXIEoHd.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==3):{ ?> src="http://i.imgur.com/vN4P4JH.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==4):{ ?> src="http://i.imgur.com/YhlUzxR.jpg" <?php } ?>
			<?php endif; ?>
			alt="thumb" style="height:300px;width:1000px"></a>
              <div class="carousel-caption"> </div>
            </div>
            <div class="item" align="center"> <a data-toggle="modal" data-target="#shirt2"><img class="img-responsive" src="http://i.imgur.com/46rp7EU.jpg" alt="thumb" style="height:300px;width:1000px"></a>
              <div class="carousel-caption"> </div>
            </div>
            <div class="item" align="center"> <a data-toggle="modal" data-target="#shirt2"><img class="img-responsive" src="http://i.imgur.com/G0u8fmW.jpg" alt="thumb" style="height:300px;width:1000px"></a>
              <div class="carousel-caption"> </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel1" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel1" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
      <br>       
   </div>    
   <br>
   <?php /*<div class="row" style="height:300px;width:1000px" >*/ ?>
   <div class="row" style="embed-responsive embed-responsive-16by9" >
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="carousel2" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators" >
            <li data-target="#carousel2" data-slide-to="0" class="short active"> </li>
            <li data-target="#carousel2" data-slide-to="1" class="short"> </li>
            <li data-target="#carousel2" data-slide-to="2" class="short"> </li>
          </ol>
          <div class="carousel-inner">
            <div class="item active"  align="center"> <img class="img-responsive" src="http://i.imgur.com/CDklao2.jpg" style="height:300px;width:1000px" alt="thumb">
              <div class="carousel-caption"> </div>
            </div>
            <div class="item" align="center"> <img class="img-responsive" src="http://i.imgur.com/deWoK9K.jpg" style="height:300px;width:1000px" alt="thumb">
              <div class="carousel-caption"> </div>
            </div>
            <div class="item" align="center"> <img class="img-responsive" src="http://i.imgur.com/mejbpq6.jpg" alt="thumb" style="height:300px;width:1000px">
              <div class="carousel-caption"> </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel2" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel2" data-slide="next"><span class="icon-next"></span></a></div>
      </div> 
      
   </div> 
   
   <br>
	<?php /*<div class="row" style="height:300px;width:1000px" >*/ ?>
   <div class="row" style="embed-responsive embed-responsive-16by9" >
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="carousel3" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators" >
            <li data-target="#carousel3" data-slide-to="0" class="shoes active"> </li>
            <li data-target="#carousel3" data-slide-to="1" class="shoes"> </li>
            <li data-target="#carousel3" data-slide-to="2" class="shoes"> </li>
          </ol>
          <div class="carousel-inner">
            <div class="item active" align="center"> <img class="img-responsive" src="http://i.imgur.com/jO2vzPk.jpg" style="height:300px;width:1000px" alt="thumb">
              <div class="carousel-caption"> </div>
            </div>
            <div class="item" align="center"> <img class="img-responsive" src="http://i.imgur.com/i0nGC1w.jpg" style="height:300px;width:1000px" alt="thumb">            
              <div class="carousel-caption"> </div>
            </div>
            <div class="item" align="center"> <img class="img-responsive" src="http://i.imgur.com/RpqfpqS.jpg" style="height:300px;width:1000px"  alt="thumb">
              <div class="carousel-caption"> </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel3" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel3" data-slide="next"><span class="icon-next"></span></a></div>
      </div>       
   </div> 
 </div>
<br>
<section class="well" style="background-color:grey">  
 <div class="container">
    <div class="row">
    <h2 style="color:white">我的樣式</h2>
    <hr>
          <div class="col-md-offset-0">
          <img  id="myimg" style="float:center;margin:0px 20px;border-radius:10px;border:double lightgrey 5px" name="mysave" width="150px" height="150px" 
		  <?php if (!isset ($_SESSION['i'])|| $_SESSION['i']==0 ): {?> src="http://i.imgur.com/XegiYEs.jpg" <?php ;} ?>
			<?php elseif ($_SESSION['i']==1):{ ?> src="http://i.imgur.com/3HiSLQ3.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==2):{ ?> src="http://i.imgur.com/fH1bapC.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==3):{ ?> src="http://i.imgur.com/IuIyiyH.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==4):{ ?> src="http://i.imgur.com/VLYBLZr.jpg" <?php } ?>
			<?php endif; ?>
		   >        
          <img  id="myimg1" style="float:center;margin:0px 20px;border-radius:10px;border:double lightgrey 5px" name="mysave" width="150px" height="150px" src="http://i.imgur.com/hoQDTk1.jpg">       
          <img  id="myimg2" style="float:center;margin:0px 20px;border-radius:10px;border:double lightgrey 5px" name="mysave" width="150px" height="150px" src="http://i.imgur.com/8ByGvs3.png">    
         <hr> 
         <nav>       
  <ul class="pagination" style="margin-left:10px;margin-right:30px;padding-top:0px;float:center" >
    <li>
      <a role="button" id="prev1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
   </ul>
   <ul class="pagination" style="margin-left:30px;margin-right:30px;float:center">
    <li>
      <a  role="button" id="next1" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>

  <ul class="pagination" style="margin-left:30px;margin-right:30px;float:center">
    <li>
      <a role="button" id="prev2" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
   </ul>
   <ul class="pagination" style="margin-left:30px;margin-right:30px;float:center">
    <li>
      <a  role="button" id="next2" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>

  <ul class="pagination" style="margin-left:30px;margin-right:30px;float:center">
    <li>
      <a role="button" id="prev3" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
   </ul>
   <ul class="pagination" style="margin-left:30px;margin-right:10px;float:center">
    <li>
      <a  role="button" id="next3" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
  </nav> 
   </div>   
   </div>  
  </div> 
</section>
 <div class="text-center">   
      <p class="btn btn-danger btn-lg" role="button" id="save" style="margin-bottom:20px;padding:15px 80px; border-radius:30px;border:0px;;color:white;width:275px" onclick="showImage(this)"><span class="glyphicon glyphicon-send" aria-hidden="true"></span><strong style="font-size:18px;padding:10px"> 我要儲存</strong></p>
      
      <p class="btn btn-success btn-lg" role="button" id="reset" style="margin-bottom:20px;margin-left:30px;padding:15px 80px; border-radius:30px;border:0px;;color:white;width:275px" onclick="allreset()"><span class="glyphicon glyphicon-refresh" aria-hidden="true" aria-describedby="sizing-addon1"></span><strong style="font-size:18px;padding:10px"> 重新選取</strong></p>
      </div>
<section class="well" style="padding-top:0px">
  <h2 class="text-center"><b>擁有自己的球衣，你也可以變得更強！</b></h2>
<hr>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/kTsnWVFATLk" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>  
</section>
<footer class="text-center">
  <div class="container">
    <div class="row" style="margin:10px">
     <div class="text-center">         
      <p style="padding:10px 10px;padding-top:0px"><a href="index.php?action=goods" class="btn btn-primary btn-lg" role="button" style="padding:15px 80px; border-radius:8px
       "><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <strong style="font-size:18px;padding:10px ">我要購買</strong></a></p>
      </div>      
    </div>   
  </div>
</footer>
<?php if (!isset ($_SESSION['i'])|| $_SESSION['i']==0 ): {?>
<?php /* Modal */ ?>
<div class="modal fade" id="shirt1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>球衣客製系統</strong></h4>
      </div>      
      <div class="modal-body">
      <form id="myform" method="post" action="demo1.php">
        <p style="font-size:18px">歡迎來到A3O1客製系統，請輸入您的客製內容</p>
        <br>
        <input type="text" class="form-control" name="custom" placeholder="目前只提供A3O1客製字樣">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary" id="myBtn">確認</button>
      </div>     
    </div>
  </div>
</div>
<?php ;} ?>
<?php else:{ ?> 
<?php /* Modal */ ?>
<div class="modal fade" id="shirt1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>球衣客製系統</strong></h4>
      </div>      
      <div class="modal-body">      
        <p style="font-size:18px">您已完成該商品客製化，是否重新進行？</p>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary" onClick="location.href='index.php?action=reload'">確認</button>
		<?php /*<button type="submit" class="btn btn-primary" onClick="<?php //$_SESSION['i']=0; ?>location.href='index.php'">確認</button>*/ ?> 
      </div>     
    </div>
  </div>
</div>
<?php } ?>
<?php endif; ?>



<script>
$(document).ready(function(){
	$(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
     });
	 $("#myBtn").click(function () {
		     var a = myform.custom.value;
			 if (a != null && a != ""){                
                      alert("您好，您的內容為"+a+"，客製化進行中");	
					  console.log(a); 					  
					  location.href="index.php?action=shirt1";				 
                  }
			 /*if (a == "A3O1"){                
                      alert("您好，您的內容為"+a+"，客製化進行中");	
					  console.log(a); 					  
					  location.href="index.html?custom="+a;				 
                  }*/
            else{		
		    alert("請輸入正確客製化內容");
			}
            				
    });
});
</script>
<?php /* Modal */ ?>
<div class="modal fade" id="shirt2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1"><strong>球衣客製系統</strong></h4>
      </div>
      <div class="modal-body">
        <form>
        <p style="font-size:18px">客製化即將推出！</p>        
        </form>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function(){
    // Activate Carousel
    $("#carousel1").carousel({interval: 8000});
	$("#carousel2").carousel({interval: 8100});
    $("#carousel3").carousel({interval: 8200});
    
   // Enable Carousel Indicators
    $("#save").click(function(){
        $("#carousel1").carousel("pause");
		$("#carousel2").carousel("pause");
		$("#carousel3").carousel("pause");	
	 });
	
	$("#reset").click(function(){
        $("#carousel1").carousel("cycle");
		$("#carousel2").carousel("cycle");
		$("#carousel3").carousel("cycle");
    });     
	
    
	$(".shirt").click(function(){
        $("#carousel1").carousel(0);
    });
	
	$("#carousel1").carousel(0).on('slide.bs.carousel', function (e) {
    
	var shirt=[];
	shirt[0]="http://i.imgur.com/XegiYEs.jpg";		
    var slideFrom = $(this).find('.active').index();
    var slideTo = $(e.relatedTarget).index();
    if(slideTo == 0){
       shirt[0]="http://i.imgur.com/XegiYEs.jpg"	 
    }
	if(slideTo == 1){
       shirt[0]="http://i.imgur.com/ciTeGDJ.jpg"
    }
	if(slideTo == 2){
       shirt[0]="http://i.imgur.com/PH6y65N.jpg+"
    }	
    });
	
    $(".short").click(function(){
        $("#carousel2").carousel(0);
    });
	
	$("#carousel2").carousel(0).on('slide.bs.carousel', function () {
       
    });
	
    $(".shoes").click(function(){
        $("#carousel3").carousel(0);
    });
	
	$("#carousel3").carousel(0).on('slide.bs.carousel', function () {
       
    });
       
	   
    $("#prev1").click(function(){
        $("#carousel1").carousel("prev");
		 });
	$("#prev2").click(function(){
        $("#carousel2").carousel("prev");
		 });
	$("#prev3").click(function(){
        $("#carousel3").carousel("prev");
		 });	 
		 		 
	$("#next1").click(function(){
        $("#carousel1").carousel("next");
    });
	$("#next2").click(function(){
        $("#carousel2").carousel("next");
    });
	$("#next3").click(function(){
        $("#carousel3").carousel("next");
    });
	
});
</script>
<?php } ?>
	<?php 	ob_end_flush(); ?>
	<?php endif; ?>
<br><br>
	<div class="footer navbar-fixed-bottom" style="height:50px; background-color:black"><p style="color:white;padding-top:15px">A3O1 版權所有 Copyright © 2015. All Rights Reserved</p></div>

<?php /* jQuery (necessary for Bootstrap's JavaScript plugins) */ ?> 
<script src="js/jquery-1.11.2.min.js"></script> 
<?php /* Include all compiled plugins (below), or include individual files as needed */ ?> 
<script src="js/bootstrap.js"></script>
</body>
</html>
