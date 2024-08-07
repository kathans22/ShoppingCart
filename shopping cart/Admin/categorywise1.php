<?php 

$category = $_POST['id'];

$conn = mysqli_connect("localhost","root","","shoppingcartdb") or die("connection failed"); 

$sql = "select * from productstb where category = '$category'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

$output = "";


if(mysqli_num_rows($result) > 0)
{
	$output = '<table class="table table-borderless">
					<tr class = "bg-warning" style = "color:black;">
						<th scope="col">Product Id</th>
						<th scope="col">Product Name</th>
						<th scope="col">Product Price</th>
						<th scope="col">Product Image</th>
						<th scope="col">Product Category</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					</tr> ';

	        while($rows = mysqli_fetch_assoc($result))
	        {
	        	$output .= "<tr>
						<th scope='row'>{$rows["pid"]}</th>
						<td>{$rows["pname"]}</td>
						<td>{$rows["price"]}</td>
						<td>
						<img src = '{$rows["pimage"]}' height = 100px width = 100px>
						</td>
						<td>{$rows["category"]}</td>
						<td><button Class='edit-btn btn btn-primary' 
	        		         data-eid = '{$rows["id"]}'>Edit</button></td>
						<td><button Class='delete-btn btn btn-danger' 
	        		data-id = '{$rows["id"]}'>Delete</button></td>
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