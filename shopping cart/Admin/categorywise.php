<?php

$category = $_POST['id'];

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from productstb where category = '$category'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);


echo json_encode($output);

?>