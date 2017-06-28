
<body>
<?php

//檢查帳號是否重複
$sql = "SELECT * FROM basic_info where account = '{$_POST["accountValue"]}'" ;
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
     
     while($row = $result->fetch_assoc()) 
	 {
		 echo "此帳號已存在";
     }
} 

else
	{
		$salt="addsalt";
		$pwdresult = md5($_POST["passwordValue"].$salt);
		$sql = "INSERT INTO basic_info (userName,email,account,password)
	VALUES ('{$_POST["userNameValue"]}','{$_POST["emailValue"]}','{$_POST["accountValue"]}','$pwdresult')";

	if ($conn->query($sql) === TRUE) 
		{
		echo "恭喜您已完成註冊!";
		} 
	else 
		{
		//echo "Error: " . $sql . "<br>" . $conn->error;
		}
    
     }
$conn->close();
?>

</body>