<?php

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select category from productstb group by category";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);


echo json_encode($output);

?>