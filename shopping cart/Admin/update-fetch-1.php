<?php 
$lid = $_POST['lid'];
$unid = $_POST['unid'];

//echo $lid." ".$unid;

$email = "";
$phno = "";
$username = "";
$password = "";
 
$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from cartlogintb where id = '$lid' and username = '$unid'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");


$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($output);

?>