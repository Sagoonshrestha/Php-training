<?php 
//require_once('connect.php');
$conn=new mysqli('localhost','root','','db_phptraining');

if($conn->connect_errno==0)
{
    $sql="select * from student";

    $result=$conn->query($sql);

    $user=[];
    while($row=$result->fetch_assoc())
    {
      $user[]=$row;
    }
   // echo "<pre>";
   // print_r($user);
   // echo "</pre>";

}else{
	die('database connectionerror'.$conn->connect_errno);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1px ">
	<tr>
	    <th>id</th>
		<th>Name</th>
		<th>Roll</th>
		<th>Address</th>
		<th>Email</th>
		<th>Math</th>
		<th>Action</th>
	</tr>
	<?php foreach($user as $u){ ?>
	<tr>
	<td><?php echo $u['id']?></td>
	<td><?php echo $u['name']?></td>
	<td><?php echo $u['roll']?></td>
	<td><?php echo $u['address']?></td>
	<td><?php echo $u['email']?></td>
	<td><?php echo $u['math']?></td>
	<td><a href="edit.php?id=<?php echo $u['id']?>">edit</a> 
	<a href="delete.php?id=<?php echo $u['id']?>"onclick="return confirm('are you sure you want to delete')">delete</a>
	</td>	
	</tr>
	<?php } ?>
</table>
</body>
</html>