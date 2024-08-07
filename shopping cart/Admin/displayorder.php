<?php

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select o.id as 'orderid',poid, email, phno, cl.username as 'username', p.pid as 'pid', pname, price*qty as 'total',category,qty from cartlogintb cl, productstb p, ordertb o where cl.username = o.username and p.pid = o.pid";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output = "";

if(mysqli_num_rows($result) > 0)
{
	$output = '<table class="table table-borderless">
					<tr class = "bg-warning" style = "color:black;">
						<th scope="col">Order Id</th>
						<th scope="col">Payment-Order Id</th>
						<th scope="col">Email Id</th>
						<th scope="col">Contact</th>
						<th scope="col">Username</th>
						<th scope="col">Product ID</th>
						<th scope="col">Product Name</th>
						<th scope="col">Total Price</th>
						<th scope="col">Category</th>
						<th scope="col">Quantity</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					</tr> ';

	        while($rows = mysqli_fetch_assoc($result))
	        {
	        	$output .= "<tr>
						<th scope='row'>{$rows["orderid"]}</th>
						<td>{$rows["poid"]}</td>
						<td>{$rows["email"]}</td>
						<td>{$rows["phno"]}</td>
						<td>{$rows["username"]}</td>
						<td>{$rows["pid"]}</td>
						<td>{$rows["pname"]}</td>
						<td>{$rows["total"]}</td>
						<td>{$rows["category"]}</td>
						<td>{$rows["qty"]}</td>
						<td><button Class='edit-btn-order btn btn-primary' data-oeid = '{$rows["orderid"]}'>Edit</button></td>
						<td><button Class='delete-btn-order btn btn-danger' data-odid = '{$rows["orderid"]}'>Delete</button></td>
					</tr>";
	        }
	$output .= "</table>";

    mysqli_close($conn);

    echo $output;
}
else
{
	echo "<h2> NO records found</h2>";
}

?>