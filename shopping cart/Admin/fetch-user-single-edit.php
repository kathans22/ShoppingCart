<?php

$ueid = $_POST["ueid"];

$id = "";
$email = "";
$phno = "";
$username = "";
$password = "";

	
$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "SELECT * FROM  cartlogintb WHERE id = '{$ueid}'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0)
{
	while($rows = mysqli_fetch_assoc($result))
	{
		$id = $rows["id"];
		$email = $rows["email"];
        $phno = $rows["phno"];
        $username = $rows["username"];
        $password = $rows["password"];
    }

    mysqli_close($conn);

    echo $id." ".$email." ".$phno." ".$username." ".$password;
}
else
{
		echo "<h2> NO records found</h2>";

}