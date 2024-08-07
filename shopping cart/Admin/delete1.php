<?php 

$udid = $_POST['key'];

//echo $id;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "delete from cartlogintb WHERE id = '$udid'";

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