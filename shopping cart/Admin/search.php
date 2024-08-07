<?php 
$search_value = $_POST["search"];

include "config.php";

/*$sql = "SELECT * FROM `students` WHERE `first_name` 
		LIKE '%{$search_value}%' OR `last_name` LIKE '%{$search_value}%'";*/

$sql = "select * from productstb where id like '%$search_value%' or pid like '%$search_value%' or pname like '%$search_value%' or 
    price like '%$search_value%' or category like '%$search_value%'";

include "shorcut.php";


?>