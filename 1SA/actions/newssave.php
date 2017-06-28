<?php


// sql to create table
$sql = "CREATE TABLE newstable (
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
now TIMESTAMP,
anonym VARCHAR(20) null,
sub VARCHAR(50) null,
content TEXT null
)CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    //echo "Table  created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}

?>
<?php
   include("setup.php");
   $now=date("Y-m-d H:i;s");
   $anonym=$_POST["anonym"];   
   $sub=$_POST["sub"];   
   $content=$_POST["content"];   
   $sql="insert into newstable (anonym,sub,content) values('$anonym','$sub','$content')";
   /*$connect=mysql_connect($DB_SERVER,$DB_USER,$DB_PASS) or die("連結失敗");
	 $db =mysql_select_db($DB_NAME,$connect) or die("選擇失敗");
   
   $query=mysql_query($sql,$connect) or die("not connect newstable");
	*/
	if ($conn->query($sql) === TRUE) 
		{
		header ('location: index.php?action=shownews');
		} 
	else 
		{
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
    
     
$conn->close();
   
?>  
 