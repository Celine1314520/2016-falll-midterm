<?php
$servername = "localhost";
$dbaccount = "root";
$dbpassword = "";
// Create connection
$conn = new mysqli($servername, $dbaccount, $dbpassword );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE SA";
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully";
} else {
    //echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = mysqli_connect($servername, $dbaccount, $dbpassword );
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (mysqli_query($conn, $sql)) {
    //echo "Database created successfully";
} else {
    //echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);

$conn = null;
$dbname="SA";
// Create connection
$conn = new mysqli($servername, $dbaccount, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
account varchar(40) DEFAULT NULL,
buyer_name varchar(40) DEFAULT  NULL,
buyer_email varchar(120) ,
buyer_phone varchar(120) ,
payment varchar(120) ,
location varchar(120) ,
shirt_image varchar(120) ,
shirt_s_number INT(6),
shirt_m_number INT(6),
shirt_l_number INT(6),
short_image varchar(120) ,
short_s_number INT(6),
short_m_number INT(6),
short_l_number INT(6),
shoes_image varchar(120) ,
shoes_23_number INT(6),
shoes_24_number INT(6),
shoes_25_number INT(6),
shoes_26_number INT(6),
shoes_27_number INT(6),
price INT(6),
notice varchar(360) ,
status varchar(40),
reg_date TIMESTAMP
)CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    //echo "Table basic_info created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}

$conn->close();

if (isset ($_POST["cloth_S_amount"])) {$_SESSION["cloth_S_amount"] =$_POST["cloth_S_amount"];}
if (isset ($_POST["cloth_M_amount"])) {$_SESSION["cloth_M_amount"] =$_POST["cloth_M_amount"];}
if (isset ($_POST["cloth_L_amount"])) {$_SESSION["cloth_L_amount"] =$_POST["cloth_L_amount"];}
if (isset ($_POST["short_S_amount"])) {$_SESSION["short_S_amount"] =$_POST["short_S_amount"];}
if (isset ($_POST["short_M_amount"])) {$_SESSION["short_M_amount"] =$_POST["short_M_amount"];}
if (isset ($_POST["short_L_amount"])) {$_SESSION["short_L_amount"] =$_POST["short_L_amount"];}
if (isset ($_POST["shoes_23_amount"])) {$_SESSION["shoes_23_amount"] =$_POST["shoes_23_amount"];}
if (isset ($_POST["shoes_24_amount"])) {$_SESSION["shoes_24_amount"] =$_POST["shoes_24_amount"];}
if (isset ($_POST["shoes_25_amount"])) {$_SESSION["shoes_25_amount"] =$_POST["shoes_25_amount"];}
if (isset ($_POST["shoes_26_amount"])) {$_SESSION["shoes_26_amount"] =$_POST["shoes_26_amount"];}
if (isset ($_POST["shoes_27_amount"])) {$_SESSION["shoes_27_amount"] =$_POST["shoes_27_amount"];}
$price=400*($_SESSION["cloth_S_amount"]+$_SESSION["cloth_M_amount"]+$_SESSION["cloth_L_amount"])+400*($_SESSION["short_S_amount"]+$_SESSION["short_M_amount"]+$_SESSION["short_L_amount"])+1500*($_SESSION["shoes_23_amount"]+$_SESSION["shoes_24_amount"]+$_SESSION["shoes_25_amount"]+$_SESSION["shoes_26_amount"]+$_SESSION["shoes_27_amount"])+120;

?>
<body>

<div class="container">
  <div class=".col-md-4 col-md-4 .col-md-4"></div>
    <div class=".col-md-4 col-md-4 .col-md-4">
      <div class="well">
        <h3 class="text-center">訂單資訊</h3>
        <form class="form-horizontal" method="post" action="index.php?action=insertOrder">
          <div class="form-group">
            <label for="" class="control-label">購買人</label>
            <div class="input-group">
              <div class="input-group-addon">姓名</div>
              <input type="text" class="form-control" id="" name="buyer">
            </div>
          </div>
		  <div class="form-group">
            <label for="" class="control-label">電子信箱</label>
            <div class="input-group">
              <div class="input-group-addon">E-mail</div>
              <input type="text" class="form-control" id="" name="mail">
            </div>
          </div>
		  <div class="form-group">
            <label for="" class="control-label">連絡電話</label>
            <div class="input-group">
              <div class="input-group-addon">手機</div>
              <input type="text" class="form-control" id="" name="phone">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label">付款取貨方式(運費120)</label>
            <select class="form-control" name="payment" id="">
              <option value="匯款宅配">匯款宅配</option>
              <option value="超商取貨付款">超商取貨付款</option>
            </select>
          </div>
		  <div class="form-group">
            <label for="" class="control-label">配送地點</label>
            <div class="input-group">
              <div class="input-group-addon">地址/店名</div>
              <input type="text" class="form-control" id="" name="location">
            </div>
          </div>
		  <div class="form-group">
            <label for="" class="control-label">含運總價:<?php echo $price; ?></label>
		  </div>
		  <div class="form-group">
            <label for="" class="control-label">其他事項</label>
            <div class="input-group">
              <div class="input-group-addon">備註</div>
              <input type="text" class="form-control" id="" name="notice">
            </div>
          </div>
		  <input type="submit" class="btn btn-danger" value="送出" style="margin-bottom:20px;padding:15px 80px; border-radius:30px;border:0px;;color:white;width:275px">
        </form>
      </div>
     
      
        </div>
      </div>
    
 
<div class=".col-md-4 col-md-4 .col-md-4"></div>
<hr>

</body>