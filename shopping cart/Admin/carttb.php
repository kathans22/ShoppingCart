<?php

$unid = $_POST['unid'];

$pid = $_POST['pid'];

//echo $unid." ".$pid;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from carttb where username = '$unid' and pid = '$pid'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$num = mysqli_num_rows($result);

if($num > 0)
{
	echo 0;
}
else
{
	$insert_sql = "insert into carttb(username,pid) values ('$unid','$pid')";

	$insert_result = mysqli_query($conn,$insert_sql) or die("SQL Query Failed");

	if($insert_result)
	{
		echo "Successfully Added To cart";
	}
	else
	{
		echo "Not Added To Cart";
	}
}


/*$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($output);*/
?>