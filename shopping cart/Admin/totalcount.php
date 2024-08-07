<?php 

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select count(id) as totalproduct from productstb";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");
$output = new stdClass;
$output->totalproduct =(mysqli_fetch_all($result,MYSQLI_ASSOC));


$sql = "select count(id) as totaluser from cartlogintb where username not in('admin')";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output->totaluser= mysqli_fetch_all($result,MYSQLI_ASSOC);


$sql = "select count(DISTINCT(category)) as totalcategory from productstb";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output->totalcategory= mysqli_fetch_all($result,MYSQLI_ASSOC);

 
$sql = "select count(id) as totalorder from ordertb";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output->totalorder = mysqli_fetch_all($result,MYSQLI_ASSOC);
// $sql = "select count(a) as totolproduct from producttb";

// $result = mysqli_query($conn,$sql) or die("SQL Query Failed");


echo json_encode($output);
?>