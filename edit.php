<?php
$id=$_GET['id'];

if(isset($_POST['submit']))
{
	if(isset($_POST['name']) && !empty($_POST['name']))
	{
      $name=$_POST['name'];
	}else{
		$errName="enter name!!";
	}
	if(isset($_POST['roll']) && !empty($_POST['roll']))
	{
      $roll=$_POST['roll'];
	}else{
		$errroll="enter roll no!!";
	}
	if(isset($_POST['email']) && !empty($_POST['email']))
	{
      $email=$_POST['email'];
	}else{
		$erremail="enter email!!";
	}
	if(isset($_POST['address']) && !empty($_POST['address']))
	{
      $address=$_POST['address'];
	}else{
		$erraddress="enter address!!";
	}
	if(isset($_POST['math']) && !empty($_POST['math']))
	{
      $math=$_POST['math'];
	}else{
		$errMath="enter math no!!";
	}
	if(isset($name) && isset($roll) && isset($address) && isset($email) && isset($math))
	{
		require_once('connect.php');
		 
		 $sql="update student set name='$name',roll=$roll, address='$address', email='$email',math='$math' where id=$id";

		 $conn->query($sql);
		 //print_r($conn);
		 if($conn->affected_rows==1 && $conn->insert_id==0)
		 {
		 	echo"date updated";

		 }
		 else
		 {
		 	echo "data update error<br>".$conn->error;
		 }
	}
}
require_once('connect.php');
$sql="select *from student where id=$id";

$result=$conn->query($sql);
print_r($result);
$user=$result->fetch_assoc();
print_r($user);

?>





<!DOCTYPE html>
<html>
<head>
	<title>create student</title>
</head>
<body>
<h1>Edit</h1>
<form action="" method="post">
	<label>Name</label>
	<input type="text" name="name" value="<?php echo $user['name']?>">
	<?php if(isset($errName)){ echo $errName; } ?>
	<br><br>
	<label>Roll</label>
	<input type="number" name="roll" value="<?php echo $user['roll']?>">
	<?php if(isset($errroll)) {echo $errroll;}?>
	<br><br>
	<label>Email</label>
	<input type="email" name="email" value="<?php echo $user['email']?>">
	<?php if(isset($erremail)) {echo $erremail;}?>
	<br><br>
	<label>Address</label>
	<input type="text" name="address" value="<?php echo $user['address']?>">
	<?php if(isset($erraddress)) {echo $erraddress;}?>
	<br><br>
	<label>Math</label>
	<input type="number" name="math" value="<?php echo $user['math']?>">
	<?php if(isset($errMath)) {echo $errMath;} ?>
	<br><br>
	<input type="submit" name="submit" value="update">
</form>
</body>
</html>