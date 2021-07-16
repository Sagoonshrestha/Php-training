<?php
$id=$_GET['id'];

require_once('connect.php');

$sql=" delete from student where id=$id ";
$conn->query($sql);
//print_r($conn);

if($conn->affected_rows == 1 && $conn->insert_id==0)
{
	header('location:list_student.php');
}else{
	echo "data delete error:".$conn->error;
}

?>