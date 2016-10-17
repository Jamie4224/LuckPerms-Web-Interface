<?php 
// Set variables
session_start();
$error = array();

// Include dependencies
require('config.php');

// Check the login form
if(isset($_POST['submit'])){

	// Check for the auth method
	if($authentication_method == "superuser"){
		// Check if username was entered
		if(!empty($_POST['username'])){
			$username = $_POST['username'];
		}else{
			$error[] = "You have not entered a username";
		}
		// Check if password was entered
		if(!empty($_POST['password'])){
			$password = $_POST['password'];
		}else{
			$error[] = "You have not entered a password";
		}
	// Check for the auth method
	} elseif($authentication_method == "sql"){
		// Things to do when auth method is sql
	}

	// Google recpatcha check
	if($google_recaptcha_activated == "true"){
		if(isset($_POST['g-recaptcha-response'])){
			$google_recaptcha_verified = $_POST['g-recaptcha-response'];
			if(!$google_recaptcha_verified){
				$error[] = 'Please complete the captcha';
			}
		}
	}

	// Check if there are no errors
	if(empty($error)){
		// Check the auth method
		if($authentication_method == "superuser"){
			// Check if the combi of username and password is correct
			if($username == $superuser_username and $password == $superuser_password){
				$_SESSION["logged_in"] = "true";
				$_SESSION["access_level"] = "10";
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				header("Location: /index.php");
			}else{
				$error[] = "Your combination of username/password is not correct";
			}
		}elseif($authentication_method == "sql"){
			// Things to do when auth method is sql
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LuckPerms Interface | Login</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<?php
	// Import dependencies
	// Import google recaptcha dependency if recaptcha is activated
	if($google_recaptcha_activated == "true"){
		?><script src='https://www.google.com/recaptcha/api.js'></script><?php
	}
	?>
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<?php
			// Show error(s) if there are
			foreach ($error as $err) {
				echo '<div class="alert alert-danger fade in">';
				echo "$err <br>";
				echo '</div>';
			}
		?>
		<form method="POST" action="login.php" autocomplete="on">
		<br>Username:
		<input type="text" name="username" id="username" placeholder="Your username" value="<?php if(!empty($username)){echo $username;} ?>"></br>
		<br>Password:
		<input type="password" name="password" id="password" placeholder="Your password" ></br>
		<?php
		// Show Google Recaptcha if activated
		if($google_recaptcha_activated == "true"){
		?>
		<br>
		<div class="g-recaptcha" data-sitekey="<?php echo $google_recaptcha_sitekey ?>"></div></br>
		<?php
		}
		?>
		<br>
		<input type="submit" name="submit" id="submit" value="Login"></input></br>
		</form>
	</div>
</div>
</body>
</html>