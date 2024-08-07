<?php

$unid = $_POST['unid'];

//$pid = $_POST['pid'];

//echo $unid;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from productstb where pid in (select pid from carttb WHERE username = '$unid')";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$num = mysqli_num_rows($result);

//$num = $num + 1;
//--------------------------------1

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

//$sql = "select count(pid) as 'total' from carttb WHERE username = '$unid'"; --- total no of products

$sql = "select sum(qty) as 'total' from carttb WHERE username = '$unid'"; // ------------ total no of items

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$row = mysqli_fetch_all($result,MYSQLI_ASSOC);

$output[$num] = $row; // 1

//$num = $num + 1;

$sql = "select qty from carttb WHERE username = '$unid' ";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$qty1 = mysqli_fetch_all($result,MYSQLI_ASSOC);

$output[$num+1] = $qty1; // 2 --- 3

//--------------------------------- 3

$sql = "select sum(price*qty) as 'payprice' from productstb p, carttb c where p.pid = c.pid and c.pid in (select pid from carttb where username = '$unid')";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$pay = mysqli_fetch_all($result,MYSQLI_ASSOC);

$output[$num+2] = $pay;

echo json_encode($output);

?>