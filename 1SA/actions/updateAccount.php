<?php
$servername = "localhost";
$dbaccount = "root";
$dbpassword = "";
$dbname="SA";
?>
<body>
<?php
// Create connection
$conn = new mysqli($servername, $dbaccount, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$salt="addsalt";
$pwdresult = md5($_POST["ModifyPwdValue"].$salt);
$sql = "UPDATE basic_info
SET password='$pwdresult'
WHERE userName='$myuser'";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
恭喜您已完成修改!
</body>