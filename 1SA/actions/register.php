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
$sql = "CREATE TABLE basic_info (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username varchar(40) DEFAULT  NULL,
email varchar(120) NOT NULL,
account varchar(40) DEFAULT NULL,
password varchar(40) NOT NULL,
reg_date TIMESTAMP
)CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    //echo "Table basic_info created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<body>
<form method="post" action="index.php?action=creatAccount">
<fieldset>
<legend>註冊</legend>

<li><label for="userName">姓名：</label><input id="userName" name="userNameValue" type="text" maxlength="30" required autofocus></li>
<li><label for="email">E-mail: </label><input id="email" name="emailValue" type="email" maxlength="120" placeholder="A3O1@gmail.com" required ></li>

<li><label for="account">帳號:</label><input id="account" name="accountValue" type="text" maxlength="30" required ></li>
<li><label for="pwd">密碼：</label><input id="pwd" name="passwordValue" type="password"  minlength="8" maxlength="30" required pattern="(?=^[A-Za-z0-9]{8,30}$)^.*$"></li>
(密碼為8字以上英文字母或數字)<br><!--pattern="(?=^[A-Za-z0-9]{6,18}$)((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]))^.*$"要求大小寫數字都要有-->
<button type="submit"  name="registering" value="1">建立</button>

</fieldset>
</form>


</body>