<?php 
$unid = $_POST['unid'];
$rid = $_POST['rid'];

//echo $unid." ".$rid;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "delete from carttb where username = '$unid' and pid = '$rid'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if($result)
{
	echo 1;
}
else
{
	echo 0;
}


?>