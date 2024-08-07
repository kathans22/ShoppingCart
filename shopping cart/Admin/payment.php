<?php 
session_start();
$cno = $_POST['cno'];
$cvv = $_POST['cvv'];
$un = $_POST['un'];



$sk1 = 'mysecretkey1';
$sk2 = 'mysecretkey2';

$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

$encrypted_message1 = openssl_encrypt($cno, 'aes-256-cbc', $sk1, OPENSSL_RAW_DATA, $iv);

$encrypted_message2 = openssl_encrypt($cvv, 'aes-256-cbc', $sk2, OPENSSL_RAW_DATA, $iv);

$combined_message1 = base64_encode($iv . $encrypted_message1);
$combined_message2 = base64_encode($iv . $encrypted_message2);

//echo $combined_message1." hi ".$combined_message2;


include "config.php";

$sql = "insert into payordertb(username,creditcardno,cvv,status) values('$un','$combined_message1','$combined_message2','done')";

$result = mysqli_query($conn,$sql) or die("SQL Query Failed");

if($result)
{
	echo 1;
}
else
{
	echo 0;
}

?>