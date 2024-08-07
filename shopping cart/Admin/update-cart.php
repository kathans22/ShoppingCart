<?php 
$unid = $_POST['unid'];
$puid = $_POST['puid'];
$qty = $_POST['qty'];

//echo $unid." -> ".$puid." -> ".$qty;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

if($qty == 0)
{
	$sql = "delete from carttb where username = '$unid' and pid = '$puid'";

	$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

	if($result)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}
else
{
	$sql = "update carttb set qty = '$qty' where username = '$unid' and pid = '$puid'";

	$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

	if($result)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}



?>