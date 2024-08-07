<?php

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from cartlogintb";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");
$output = "";


if(mysqli_num_rows($result) > 0)
{
	$output = '<table class="table table-borderless">
					<tr class = "bg-warning" style = "color:black;">
						<th scope="col">User Id</th>
						<th scope="col">E-mail</th>
						<th scope="col">Phno</th>
						<th scope="col">User - Name</th>
						<th scope="col">Password</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					</tr> ';

	        while($rows = mysqli_fetch_assoc($result))
	        {
	        	$output .= "<tr>
						<th scope='row'>{$rows["id"]}</th>
						<td>{$rows["email"]}</td>
						<td>{$rows["phno"]}</td>
						<td>{$rows["username"]}</td>
						<td>{$rows["password"]}</td>
						<td><button Class='edit-btn-user btn btn-primary' 
	        		    data-ueid = '{$rows["id"]}'>Edit</button></td>
						<td><button Class='delete-btn-user btn btn-danger' 
	        		    data-udid = '{$rows["id"]}'>Delete</button></td>
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