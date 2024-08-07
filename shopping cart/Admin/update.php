<?php 
$id = $_POST['spid'];
$pid = $_POST['sppid'];
$pname = $_POST['spname'];
$price = $_POST['sprice'];
$category = $_POST['scategory'];
$pimage = "images/".$_FILES['spimage']['name'];
$file_tmp = $_FILES['spimage']['tmp_name'];


include "config.php";

$sql = "update productstb set pid = '$pid', pname = '$pname', price = '$price', category = '$category' ,pimage = '$pimage' where id = '$id'";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if($result)
{
	move_uploaded_file($file_tmp,$pimage);
	header("Refresh:0; url=admin.php");
}
else
{
	die("record not updated");
}

?>