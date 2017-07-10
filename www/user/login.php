<?php

	include 'includes/db.php';
	include 'includes/functions.php';

	$error = [];

	if (array_key_exists('submit', $_POST))
	{
		if(empty($_POST['firstname']))
		{
			$error['firstname'] = "please enter your firstname";
		}
		else
		{
			$firstname =$_POST['firstname'];
		}


		if($_POST['lastname'] != $_POST['lastname'])
		{
			$error['lastname'] = "please enter your lastname";
		}
		else
		{
			$lastame =$_POST['lastname'];
		}


		if($_POST['email'] != $_POST['email'])
		{
			$error['email'] = "please enter your email";
		}
		else
		{
			$email =$_POST['email'];
		}

		



		if(empty($_POST['password']))
		{
			$error['password'] = "please enter your password";
		}
		else
		{
			$password =$_POST['password'];
		}


		if($_POST['sex'] != $_POST['sex'])
		{
			$error['sex'] = "please enter your gender";
		}
		else
		{
			$sex =$_POST['sex'];
		}


		

		if(empty($error))
		{
			$clean = array_map('trim', $_POST);

			$hash = password_hash($clean['password'], PASSWORD_BCRYPT);
			//do registration

			$stmt = $conn->prepare("SELECT * FROM user(firstname,lastname,) WHERE email = '".$email."'");

			if (mysql_num_rows($stmt) == 0)
				{
					$stmts = $conn->prepare("INSERT INTO user VALUES(:fname, :lname, :mail, :pwrd, :gen)");

					$data = [
					
					":fname"=>$clean['firstname'],
					":lname"=>$clean['lastname'],
					":mail"=>$clean['email'],
					":pwrd"=>$hash,
					":gen"=>$clean['sex']

					
					];

			$stmt->execute($data);
				}
			
		}
	}




	

?>
		<form action="login.php" method="POST">
		<label>Firstname:</label>
		<input type = "text" name= "username" placeholder="username">
		<br/>

		<label>Lastname:</label>
		<input type = "text" name= "lastname" placeholder="lastname">
		<br/>

		<label>Email</label>
		<input type = "email" name= "email" placeholder="email">
		<br/>


		<label>Password:</label>
		<input type = "password" name= "password" placeholder="password">
		<br/>

		<label>Gender</label>
							Male:<input type = "radio" name= "sex">
							Female:<input type = "radio" name = "sex">
							<br>

		
		<input type ="submit" name="submit" value="submit">
		<br>

		<?php
			echo "tosin";
		?>

	</form>