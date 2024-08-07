<?php 
$userbillid = $_POST['userbillid'];

//echo $userbillid;

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "SELECT username FROM ordertb WHERE poid = '$userbillid' limit 1";

$result = mysqli_query($conn,$sql) or die("sql query failed");

$output = new stdClass;

$output->usernames =(mysqli_fetch_all($result,MYSQLI_ASSOC));
//$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

//

$sql = "select p.pid as 'pid', pname, price*qty as 'total',category,qty from cartlogintb cl, productstb p, ordertb o, payordertb po where cl.username = o.username and p.pid = o.pid and o.poid = po.poid and po.poid = '$userbillid'";

$result = mysqli_query($conn,$sql) or die("sql query failed");

$output->productstb =(mysqli_fetch_all($result,MYSQLI_ASSOC));


$sql = "select sum(price*qty) as 'total' from cartlogintb cl, productstb p, ordertb o, payordertb po  where cl.username = o.username and p.pid = o.pid and o.poid = po.poid and po.poid = '$userbillid'";

$result = mysqli_query($conn,$sql) or die("sql query failed");

$output->totalpay =(mysqli_fetch_all($result,MYSQLI_ASSOC));

if(mysqli_num_rows($result) > 0)
{
    echo json_encode($output);
}
else
{
    echo "<h2> NO records found</h2>";
}













?>