<?php 

$id = $_POST['orderid'];

$pid = $_POST['pid'];

$qty = $_POST['qty'];

//echo $id." ".$pid." ".$qty;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed");

$sql = "update ordertb set pid = '$pid', qty = '$qty' where id = '$id'";

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