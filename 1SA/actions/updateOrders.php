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
$s=$_POST['orderNewStatus'];


for( $x=0 ; $x< $_SESSION['orderLastNumber'] ; $x++)
	{
		$idnow=$x+1;
		
		if($s[$x]==null)
		{
			$sql ="SELECT status FROM orders
			WHERE id='$idnow'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) 
				{
					$s[$x]=$row["status"];
				}
			
			}
		}
		
			$sql = "UPDATE orders
			SET status='$s[$x]'
			WHERE id='$idnow'";

			if ($conn->query($sql) === TRUE) {
				//echo "恭喜您已完成修改!";
			} else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
			}
	}

$conn->close();
header ('location: admin.php');
?>
