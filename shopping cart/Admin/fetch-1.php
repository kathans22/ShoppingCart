<?php

$eid = $_POST["eid"];

$id = "";
$pid = "";
$pname = "";
$price = "";
$category = "";

	
$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "SELECT * FROM  productstb WHERE id = '{$eid}'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0)
{
	while($rows = mysqli_fetch_assoc($result))
	{
		$id = $rows["id"];
		$pid = $rows["pid"];
        $pname = $rows["pname"];
        $price = $rows["price"];
        $category = $rows["category"];
    }

    mysqli_close($conn);

    echo $id." ".$pid." ".$pname." ".$price." ".$category;
}
else
{
		echo "<h2> NO records found</h2>";

}