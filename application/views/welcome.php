
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login / Registration</title>
</head>
<style type="text/css">
	/**{margin: 0; padding: 0;	}*/
	#register{ width: 300px; display: inline-block;}
	#login{ width: 300px; display: inline-block; margin-left: 100px; vertical-align: top;}
	label{display:inline-block; width: 130px;} 
</style>
<body>
	<?php echo validation_errors(); ?>
	<div id="container">
		<h1>Welcome</h1>
		
		<form action="users/register" method="post" id="register">
			<fieldset>
				<legend>Register</legend>
				<p>
					<label for="name">Name:</label>
					<input type="text" name="name" id="name">
				</p>
				<p>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email">
				</p>
				<p>
					<label for="passsword">Password:</label>
					<input type="password" name="password" id="password">
				</p>

				<p>
					<label for="confirm_password">Confirm password:</label>
					<input type="password" name="confirm_password" id="confirm_password">
				</p>
				<p>
					<label for="dob">Date of Birth:</label>
					<input type="date" name="dob" max="<?php echo date("Y-m-d"); ?>" ></input>
				</p>
				<p>
					<button>Register</button>
				</p>
				
			</fieldset>
		</form>

		<form action="users/login" method="post" id="login">
			<fieldset>
				<legend> Login</legend>
				<p>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email">
				</p>
				<p>
					<label for="passsword">Password</label>
					<input type="password" name="password" id="password">
				</p>
				<p>
					<button>Login</button>
				</p>
			</fieldset>
		</form>

	</body>
	</html>