<?php 

$search = $_POST['search'];

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from productstb where id like '%$search%' or pid like '%$search%' or pname like '%$search%' or 
    price like '%$search%' or category like '%$search%'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($output);
?>