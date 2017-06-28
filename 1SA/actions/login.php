<body>
<?php
$servername = "localhost";
$dbaccount = "root";
$dbpassword = "";
$dbname="SA";
$conn = new mysqli($servername, $dbaccount, $dbpassword, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

if (isset ($_POST['LoginAccount'])) 
	{
		$a = mysqli_real_escape_string ($conn,$_POST['LoginAccount']);
		//injection大全//http://skycab.pixnet.net/blog/post/25018781-sql-injection%E6%8A%80%E5%B7%A7%E5%A4%A7%E5%85%A8
		//過濾-SQL-injection//http://www.pigo.idv.tw/archives/820
		
	}
if (isset ($_POST['LoginPwd'])) {
		$p =mysqli_real_escape_string ($conn,$_POST['LoginPwd']);
		$salt="addsalt";
		$pwdresult = md5($p.$salt);
	}



$sql ="SELECT id,username,account,password,email FROM basic_info
WHERE account = '$a' AND password = '$pwdresult' ";
$result = $conn->query($sql);

//if(strcmp($p,$row["password"]) AND strcmp($a,$row["account"]))原本以為這樣寫可以濾掉injection卻沒用
//http://www.w3school.com.cn/php/func_string_strcmp.asp

	
	if ($result->num_rows > 0) 
		{
		// output data of each row
		while($row = $result->fetch_assoc()) 
			{
			echo "<br> id: ". $row["id"]. " - Name: ". $row["username"]. " " . $row["account"] . "<br>";
			$_SESSION['my-user']=$row["username"];
			$_SESSION['account']=$row["account"];
			$_SESSION['pwd']=$row["password"];
			$refer = 'index.php';
			header('Location: '. $refer);
			}
		} 
	else 
		{
		echo '<html><h3>hi,<br>please login first</h3></html>';
		echo '<script language="javascript"> alert("登入錯誤!");</script>';
		}

$conn->close();
/* 
    if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        // Update the user record
		$query = "UPDATE susers SET guid = '$row[1]' WHERE userid = $row[0]";
            
        mysql_query($sql, $conn)
        	or die('Error in query');
        
        // Set the cookie and redirect
        
        
        $cookieexpiry = (time() + 21600); // Setting cookie expire date, 6 hours from now
        setcookie("session_id", $row[1], $cookieexpiry);
		// setcookie( string name [, string value [, int expire [, string path  [, string domain [, bool secure]]]]])
        if (empty($refer) || !$refer)
        {
            $refer = 'index.php';
        }

        //header('Location: '. $refer);
		echo "您已登入成功!";
    }
    else
    {
        // Not authenticated
        //header('Location: login.php?refer='. urlencode($refer));
		//header('Location: index.php');
		echo "Something Wrong!";
    }

*/
?>

</body>