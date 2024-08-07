<?php 
$unid = $_POST['unid'];

//echo $unid;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 





// $sql = "insert into ordertb (username, pid, qty)SELECT username, pid, qty FROM carttb WHERE username = '$unid'";

$sql = "insert into ordertb(username, pid, poid, qty)SELECT c.username, c.pid, po.poid, c.qty FROM carttb c,payordertb po where c.username = po.username and c.username = '$unid'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

// -------------------------- > copy table

$sql1 = "delete from carttb WHERE username = '$unid'";

$result1 = mysqli_query($conn,$sql1) or die("SQL Query Failed");

//--------------------> delete old record

/*$sql2 = "select * from carttb";

$result2 = mysqli_query($conn,$sql2) or die("SQL Query Failed");*/

if($result && $result1)
{
	echo 1;
}
else
{
	echo 0;
}





?>