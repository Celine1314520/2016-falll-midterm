<?php
if ($_SESSION['i']==0){ $shirt_image="http://i.imgur.com/58NZ5ef.jpg" ;}
if ($_SESSION['i']==1){ $shirt_image="http://i.imgur.com/x0DCClK.jpg" ;}
if ($_SESSION['i']==2){ $shirt_image="http://i.imgur.com/SmQKj2d.jpg" ;}
if ($_SESSION['i']==3){ $shirt_image="http://i.imgur.com/zevlbMU.jpg" ;}
if ($_SESSION['i']==4){ $shirt_image="http://i.imgur.com/vZyZPPu.jpg" ;}
$short_image="http://i.imgur.com/aSJXnm3.jpg";
$shoes_image="http://i.imgur.com/BYnHuqY.jpg";
$price=(400*($_SESSION["cloth_S_amount"]+$_SESSION["cloth_M_amount"]+$_SESSION["cloth_L_amount"])+400*($_SESSION["short_S_amount"]+$_SESSION["short_M_amount"]+$_SESSION["short_L_amount"])+1500*($_SESSION["shoes_23_amount"]+$_SESSION["shoes_24_amount"]+$_SESSION["shoes_25_amount"]+$_SESSION["shoes_26_amount"]+$_SESSION["shoes_27_amount"])+120);
$default_status="未處理";
$servername = "localhost";
$dbaccount = "root";
$dbpassword = "";
$dbname="SA";
// Create connection
$conn = new mysqli($servername, $dbaccount, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO orders (account,buyer_name,buyer_email,buyer_phone,payment,location,shirt_image,shirt_s_number,shirt_m_number,shirt_l_number,short_image,short_s_number,short_m_number,short_l_number,shoes_image,shoes_23_number,shoes_24_number,shoes_25_number,shoes_26_number,shoes_27_number,price,notice,status)
VALUES ('{$_SESSION['account']}','{$_POST['buyer']}','{$_POST['mail']}','{$_POST['phone']}','{$_POST['payment']}','{$_POST['location']}','$shirt_image','{$_SESSION['cloth_S_amount']}','{$_SESSION['cloth_M_amount']}','{$_SESSION['cloth_L_amount']}','$short_image','{$_SESSION['short_S_amount']}','{$_SESSION['short_M_amount']}','{$_SESSION['short_L_amount']}','$shoes_image','{$_SESSION['shoes_23_amount']}','{$_SESSION['shoes_24_amount']}','{$_SESSION['shoes_25_amount']}','{$_SESSION['shoes_26_amount']}','{$_SESSION['shoes_27_amount']}','$price','{$_POST['notice']}','$default_status')";

if ($conn->query($sql) === TRUE) 
		{?>
		<h2>恭喜您已完成訂購!</h2>
		<p class="btn btn-info btn-lg"   data-toggle="" data-target="" style="margin-bottom:20px;padding:15px 80px; border-radius:30px;border:0px;;color:white;width:275px" onclick="javascript:location.href='index.php?action=checkMyOrders'"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><strong style="font-size:18px;padding:10px">檢視訂單</strong></p>
    	</p>
<?php
		} 
	else 
		{
		echo  $conn->error;
		}
$conn->close();
?>