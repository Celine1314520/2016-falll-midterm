<!DOCTYPE html>
<?php
	ini_set ('display_errors', true);
    error_reporting (E_ALL);

	include_once "config.php";
	include_once "MyUser.class.php";

	ob_start();

     session_start();

	$actionList = array (
		
		'login'=> 'login.php' ,
		'logout' => 'logout.php' ,
		
		'creatAccount'=>'creatAccount.php',
		
		
		
		'reload' => 'reload.php' ,
		'checkMyOrders' => 'checkMyOrders.php' ,
		'updateOrders' => 'updateOrders.php' ,
	);
	
	if (isset ($_SESSION['my-user'])) {
	$myuser = $_SESSION['my-user'];}
	$use_layout = true;

	if (isset ($_SESSION['use-layout'])) {
		$use_layout = $_SESSION['use-layout'];
	}
?>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="快來看看我的客製商品" />
<meta property="og:description" content="酷炫狂跩哪炸天的客製化商品，我的眼光是最讀到的" />
<meta property="og:url" content="index.html" />
<meta property="og:image" content="C:\Users\user\Desktop\SA\img\blueshirt2.png"/>
<meta property="og:type" content="website" />
<link rel="icon" href="http://flat-icon-design.com/f/f_event_87/s512_f_event_87_2bg.png" />
<title>A3O1客製化球裝模擬搭配訂購網</title>

<!-- Bootstrap -->
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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onLoad="showImage()">
<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  A3O1</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">留言板</a> </li>
		<!--<li class="active"><a href="#">留言板 <span class="sr-only">(current)</span></a> </li>-->
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">商品分類 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">球衣</a> </li>
            <li><a href="#">球褲</a> </li>
            <li><a href="#">球鞋</a> </li>
            <li class="divider"></li>
            <li><a href="#">全部商品</a> </li>
          </ul>
        </li>
           
         
      </ul>
	  <ul class="nav navbar-nav navbar-right">
	  <!--<li><a href="#">廠商登入</a> </li>-->     
      <form class="navbar-form  navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">查詢</button>
      </form>
        
		<!--
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		-->

						
					</ul>
				</li>
			
				
					 
						<!--
                        <li class="divider"></li>
                        <li>
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                        </li>
						-->
                     </ul>
                  </li>
		

      
    </div>
  </div>

      
        
    
    
    <!-- /.navbar-collapse --> 
  
  <!-- /.container-fluid --> 
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

<?php
$servername = "localhost";
$dbaccount = "root";
$dbpassword = "";
$dbname="SA";
$conn = new mysqli($servername, $dbaccount, $dbpassword, $dbname);
// Create connection
$conn = new mysqli($servername, $dbaccount, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql ="SELECT * FROM orders";

$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
		// output data of each row
		while($row = $result->fetch_assoc()) 
			{?>
			
				<div class="container">
				  <div class="row">
					<div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
					  <div class="well">
						<h3 class="text-center">訂單資訊</h3>
						<form class="form-horizontal" action="admin.php?action=updateOrders" method="post">
						  <div class="form-group">
							<label for="" class="control-label">訂單#<?php echo $row["id"];?></label>
							<div class="input-group">
							  <div class="input-group-addon">狀態</div>
							  <input type="text" class="form-control" id="" name="orderNewStatus[]" placeholder="<?php echo $row["status"]; ?>" >
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">購買人</label>
							<div class="input-group">
							  <div class="input-group-addon">姓名</div>
							  <input type="text" class="form-control" id="" name="buyer" placeholder="<?php echo $row["buyer_name"]; ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">電子信箱</label>
							<div class="input-group">
							  <div class="input-group-addon">E-mail</div>
							  <input type="text" class="form-control" id="" name="mail" placeholder="<?php echo $row["buyer_email"] ;?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">連絡電話</label>
							<div class="input-group">
							  <div class="input-group-addon">手機</div>
							  <input type="text" class="form-control" id="" name="phone" placeholder="<?php echo $row["buyer_phone"]; ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">付款取貨方式(運費120)</label>
							<select class="form-control" name="payment" id="" disabled>
							  <option value="<?php $row["payment"] ?>"><?php echo $row["payment"]; ?></option>
							</select>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">配送地點</label>
							<div class="input-group">
							  <div class="input-group-addon">地址/店名</div>
							  <input type="text" class="form-control" id="" name="location" placeholder="<?php echo $row["location"]; ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">含運總價:<?php echo $row["price"]; ?></label>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">其他事項</label>
							<div class="input-group">
							  <div class="input-group-addon">備註</div>
							  <input type="text" class="form-control" id="" name="notice" value="<?php echo $row["notice"]; ?>" disabled>
							</div>
						  </div>
						
					  </div>
					 </div>
					 
					<div class="col-lg-9 col-md-12">
						<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
											  <div class="thumbnail"> <img src="<?php echo $row["shirt_image"]; ?>" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
												<div class="caption"><br>
												  <h3>球衣(每件400)</h3><br>
												  
												  <label for="" class="control-label">S:身高150cm~160cm的數量</label><br>
												  <input type="number" name="cloth_S_amount" required min="0" max="100" value="<?php echo $row["shirt_s_number"] ;?>" class="form-control" disabled><br><br><br>
												  <br><br>
												  <label for="" class="control-label">M:身高161cm~171cm的數量</label><br>
												  <input type="number" name="cloth_M_amount" required min="0" max="100" value="<?php echo $row["shirt_m_number"]; ?>" class="form-control" disabled><br><br><br>
												  <br><br>
												  <label for="" class="control-label">L:身高172cm~185cm的數量</label><br>
												  <input type="number" name="cloth_L_amount" required min="0" max="100" value="<?php echo $row["shirt_l_number"]; ?>" class="form-control" disabled><br>
												  <br>
											  </div> 
												</div>
											  </div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
											  <div class="thumbnail"> <img src="<?php echo $row["short_image"]; ?>" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
												<div class="caption"><br>
												  <h3>褲子(每件400)</h3><br>
												  
												  <label for="" class="control-label">S:腰圍24吋-27吋的數量</label><br>
												  <input type="number" name="short_S_amount" required min="0" max="100" value="<?php echo $row["short_s_number"]; ?>" class="form-control" disabled><br><br><br><br><br>
												  <label for="" class="control-label">M:腰圍28吋~31吋的數量</label><br>
												  <input type="number" name="short_M_amount" required min="0" max="100" value="<?php echo $row["short_m_number"]; ?>" class="form-control" disabled><br><br><br><br><br>
												  <label for="" class="control-label">L:腰圍32吋~35吋的數量</label><br>
												  <input type="number" name="short_L_amount" required min="0" max="100" value="<?php echo $row["short_l_number"]; ?>" class="form-control" disabled><br><br>
												</div>
											  </div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 hidden-sm hidden-xs">
											  <div class="thumbnail"> <img src="<?php echo $row["shoes_image"]; ?>" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
												<div class="caption"><br>
												  <h3>球鞋(每雙1500)</h3><br>
												  <label for="" class="control-label">23:腳長23cm的數量(雙)</label><br>
												  <input type="number" name="shoes_23_amount" required min="0" max="100" value="<?php echo $row["shoes_23_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">24:腳長24cm的數量(雙)</label><br>
												  <input type="number" name="shoes_24_amount" required min="0" max="100" value="<?php echo $row["shoes_24_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">25:腳長25cm的數量(雙)</label><br>
												  <input type="number" name="shoes_25_amount" required min="0" max="100" value="<?php echo $row["shoes_25_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">26:腳長26cm的數量(雙)</label><br>
												  <input type="number" name="shoes_26_amount" required min="0" max="100" value="<?php echo $row["shoes_26_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">27:腳長27cm的數量(雙)</label><br>
												  <input type="number" name="shoes_27_amount" required min="0" max="100" value="<?php echo $row["shoes_27_number"]; ?>" class="form-control" disabled><br><br>
												</div>
											  </div>
											</div>
					  </div>

					</div>
					</div>
				</div>

			<br>
			<hr>
			<br>
			
			<?php
			$_SESSION['orderLastNumber']=$row["id"];
			
			}
			?>
			<input type="submit" class="btn btn-danger" value="更新訂單" style="margin-bottom:20px;padding:15px 80px; border-radius:30px;border:0px;;color:white;width:275px">
			</form>
			<br><br>
			<?php
		}
			
	else 
		{
		echo '<html><h3>hi,<br>目前沒有訂單</h3></html>';
		}

$conn->close();
?>






<?php } ?>
	<?php 	ob_end_flush(); ?>
	<?php endif; ?>
<br><br>
	<div class="footer navbar-fixed-bottom" style="height:50px; background-color:black"><p style="color:white;padding-top:15px">A3O1 版權所有 Copyright © 2015. All Rights Reserved</p></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
