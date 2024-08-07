<?php
$unid = $_POST['unid'];

//$pid = $_POST['pid'];

//echo $unid;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select count(pid) as 'total' from carttb WHERE username = '$unid'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($output);

?>