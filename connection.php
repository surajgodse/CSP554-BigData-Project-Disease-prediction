<?php
$user = "root";
$db = "medical_test";
$password = "";
$server = "localhost";

$link = mysqli_connect($server,$user,$password,$db);
if(!$link)
{
		 echo "<script>
		 alert('Unable to connect to Database Contact your Administrator ');
			window.location.href='index.html';
			
			</script>";
			die();
}
else
{
	//echo "connection successful";
}

date_default_timezone_set("Asia/calcutta");

?>