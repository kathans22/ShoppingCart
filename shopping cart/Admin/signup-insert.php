<?php 

session_start();
$email = $_POST['email'];
$phno = $_POST['phno'];
$username = $_POST['username'];
$password = $_POST['pass'];

//echo $email . " ". $username . " ". $password." ".$phno;

include "config.php";

$sql =  "insert into cartlogintb(email,phno,username,password) values('$email','$phno','$username','$password')" or die("query failed");

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if($_SESSION['captcha'] == $_POST['captcha'])
{
	if($result)
    {
    	echo 1;
    }
	else
	{
		echo 0;
	}

}
else
{
	echo 0;
}
?>