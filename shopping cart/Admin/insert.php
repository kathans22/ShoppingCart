<?php 
$pid = $_POST['pid'];
$pname = $_POST['pname'];
$price = $_POST['price'];
$category = $_POST['category'];
$pimage = "images/".$_FILES['pimage']['name'];
$file_tmp = $_FILES['pimage']['tmp_name'];


include "config.php";

$sql =  "insert into productstb(pid,pname,price,category,pimage) values('$pid','$pname','$price','$category','$pimage')" or die("query failed");

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if($result)
{
	move_uploaded_file($file_tmp,$pimage);
	header("Refresh:0; url=admin.php");
}
else
{
	die("record not inserted");
}




?>