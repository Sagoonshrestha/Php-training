<?php
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
		 $sql="insert into 
		student(name,roll,address,email,math) 
		values('$name',$roll,'$address','$email',$math)";
		$conn->query($sql);
		//print_r($conn);
		if($conn->insert_id>0 &&$conn->affected_rows==1)
		{
			echo "one record inserted";
		}else
		{
			echo "recorded isnot recorded".$conn->error;
		}
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>create student</title>
</head>
<body>
<form action="" method="post">
	<label>Name</label>
	<input type="text" name="name">
	<?php if(isset($errName)){ echo $errName; } ?>
	<br><br>
	<label>Roll</label>
	<input type="number" name="roll">
	<?php if(isset($errroll)) {echo $errroll;}?>
	<br><br>
	<label>Email</label>
	<input type="email" name="email">
	<?php if(isset($erremail)) {echo $erremail;}?>
	<br><br>
	<label>Address</label>
	<input type="text" name="address">
	<?php if(isset($erraddress)) {echo $erraddress;}?>
	<br><br>
	<label>Math</label>
	<input type="number" name="math">
	<?php if(isset($errMath)) {echo $errMath;} ?>
	<br><br>
	<input type="submit" name="submit" value="save student">
</form>
</body>
</html>