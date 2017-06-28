<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<title>留言板</title>
</head>
<style>
	.container{
		margin:auto;
		background-color:#f5f5f5;
		width:800px;
		padding-bottom: 20px;
	}
	.button{
		text-align:center;
		padding:20px 0;
	}
	.top h3{
		font-family:微軟正黑體;
		text-align:center;
		padding:10px 0;
	}
</style>
<body>

<div class="container">
	<div class="top">
    	<h3>留言版</h3>
    	</div>

	<div class="button" class="text-center">
	<!--<input type="submit" name="button" id="button" value="我要留言" class="btn" text-align=center/>-->
	      <p style="padding:10px 10px;padding-top:0px"><a href="index.php?action=Guestbook" class="btn btn-primary btn-lg" role="button" style="padding:15px 80px; border-radius:8px
       "> <strong style="font-size:18px;padding:10px ">我要留言</strong></a></p>
	</div>

<?php
	include("setup.php");
 	$sql="select * from $NEWSTABLE order by id desc";
	//$connect=mysql_connect($DB_SERVER,$DB_USER,$DB_PASS) or die("連結失敗");
	//$db     =mysql_select_db($DB_NAME,$connect) or die("無法選擇資料庫");	  
 	//$query=mysql_query($sql,$connect) or die("無法執行SQL語法");
	
	$result = $conn->query($sql);
	 /*
	 if (!$query) {print "ERROR";}
     else
	  { 
	    while($list=mysql_fetch_array($query))
	    {
		//$datalist.=
	*/
	
	if ($result->num_rows > 0) 
		{
		// output data of each row
		while($list = $result->fetch_assoc()){

   ?>

	
	<table width="532" height="100" border="1" align="center" >
  	<tbody>
		<tr>
   			<th scope="row" width="134"><font color=BLUE><p style=text-align:center>id =<?php echo $list["id"]?> </th> </font></td>
			<td scope="row" width="328"><font color=BLUE><p style=text-align:center>發問時間 :  <?php echo $list["now"]?></th> </font></td>
		</tr> 
    		<tr>
      			<th scope="row" width="134"><p style=text-align:center>匿稱 : </th>
			<td scope="row" width="328"><p style=text-align:center><?php echo $list["anonym"]?></td>
		</tr>
    		<tr>
      			<th scope="row"><p style=text-align:center>主題 : </th>
    			<td ><p style=text-align:center><?php echo $list["sub"]?></td>
		</tr>
    		<tr>
     			<th scope="row"><p style=text-align:center>內容 : </th>
    			<td ><p style=text-align:center><?php echo $list["content"]?></td>
		</tr><br>

 	</tbody>
	</table>
	<br />
	<?php
	}//end of while

	}//end of if
	else {echo "沒有留言";}
	?>
</div>


</body>
</html>