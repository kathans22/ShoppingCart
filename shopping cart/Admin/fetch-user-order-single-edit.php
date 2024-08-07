<?php

$oeid = $_POST["oeid"];

$id = "";
$pid = "";
$qty = "";

	
$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select o.id as 'orderid', email, phno, cl.username as 'username', p.pid as 'pid', pname, price*qty as 'total',category,qty from cartlogintb cl, productstb p, ordertb o where cl.username = o.username and p.pid = o.pid and o.id = '{$oeid}'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0)
{
	while($rows = mysqli_fetch_assoc($result))
	{
		$id = $rows["orderid"];
		$pid = $rows["pid"];
        $qty = $rows["qty"];
    }

    mysqli_close($conn);

    echo $id." ".$pid." ".$qty;
}
else
{
		echo "<h2> NO records found</h2>";

}