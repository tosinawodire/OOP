<?php

	include 'includes/db.php';
	include 'includes/functions.php';

	$error = [];

	if (array_key_exists('submit', $_POST))
	{
		if(empty($_POST['username']))
		{
			$error['username'] = "please enter your username";
		}

		if(empty($_POST['password']))
		{
			$error['password'] = "please enter your password";
		}

		if($_POST['pword'] != $_POST['password'])
		{
			$error['pword'] = "password does not match";
		}

		if(empty($error))
		{
			$clean = array_map('trim', $_POST);

			$hash = password_hash($clean['password'], PASSWORD_BCRYPT);
			//do registration

			$stmt = $conn->prepare("INSERT INTO admin(username,password) VALUES(:us, :pwrd)");

			$data = [
					
					":us" => $clean['username'],
					":pwrd"=> $hash
					
					];

			$stmt->execute($data);
		}
	}


																																																																																				
?>

	<form action="register.php" method="POST">
		<label>Username:</label>
		<input type = "text" name= "username" placeholder="username">
		<br>

		<label>Password:</label>
		<input type = "password" name= "password" placeholder="password">
		<br>

		<label>Confirm Password:</label>
		<input type = "password" name= "pword" placeholder="Re-enter password">

		<input type ="submit" name="submit" value="submit">
		<br>

	</form>