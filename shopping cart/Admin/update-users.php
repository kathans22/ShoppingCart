<?php 

$id = $_POST['id'];
$email = $_POST['email'];
$phno = $_POST['phno'];
$username = $_POST['un'];
$password = $_POST['pass'];

//echo $id." ".$email." ".$username." ".$password." ".$phno;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "update cartlogintb set email = '$email', phno = '$phno', username = '$username', password = '$password' where id = '$id'";

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