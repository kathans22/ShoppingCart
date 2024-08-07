<?php 

session_start();

$username = $_POST['username'];
$password = $_POST['pass'];
$id = "";

//echo $username." ".$password;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from cartlogintb where username = '$username' and password = '$password'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

/*if($_SESSION['captcha'] == $_POST['captcha'])
{
	if(mysqli_num_rows($result) > 0)
    {
		if($username == "admin")
		{
			$_SESSION['adminusername'] = $username;
			echo $username;
		}
		else
		{
			$_SESSION['username'] = $username;
			echo $username;
		}
		//echo 1;
    }
}
else
{
	echo 0;
}
*/

if($_SESSION['captcha'] == $_POST['captcha'])
{
	if(mysqli_num_rows($result) > 0)
    {
		if($username == "admin")
		{
			$_SESSION['adminusername'] = $username;
			echo $username;
		}
		else
		{
			while($row = mysqli_fetch_assoc($result))
	        {
		        $_SESSION['username'] = $row['username'];
		        $_SESSION['userid'] = $row['id'];

		        echo $username." ".$id;
	        }
			
		}
		//echo 1;
    }
}
else
{
	echo 0;
}



?>