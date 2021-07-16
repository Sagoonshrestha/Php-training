<?php
$conn = new mysqli('localhost','root','','db_phptraining');
print_r($conn);
if($conn->connect_errno != 0){
	die("database connection error:".$conn->connect_error);
} 

?>