<?php 
/*
MIT License

Copyright (c) 2016 Jamie42 (24)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

*/

// Set super variables
$fullpath = dirname(__FILE__);

// Include dependencies
require("$fullpath/config.php");
require("$fullpath/assets/includes/include.func.php");

// Check if the license is agreed
if($license_agreed != "true"){
	echo "<h1>You have not accepted the license!</h1>";
	echo "<h3>Accept it at the end of '/config.php'!</h3>";
	die();
}

// Set variables
$error = array();

// Check the login form
if(isset($_POST['submit'])){

	// Check for the auth method
	if($authentication_method == "superuser"){
		// Check if username was entered
		if(!empty($_POST['username'])){
			$username = $_POST['username'];
		}else{
			$username_err = "";
			$error[] = "You have not entered a username";
		}
		// Check if password was entered
		if(!empty($_POST['password'])){
			$password = $_POST['password'];
		}else{
			$password_err = "";
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
				$username_err = "";
				$password_err = "";
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
	<link rel="stylesheet" href="/assets/css/styles.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/d3e071620c.js"></script>
	<?php
	// Import dependencies
	// Import google recaptcha dependency if recaptcha is activated
	if($google_recaptcha_activated == "true"){
		?><script src='https://www.google.com/recaptcha/api.js'></script><?php
	}
	?>
</head>
<body>
<div class="w3-top">
<?php
if($current_user_is_logged_in == "true"){
?>
  <ul class="w3-navbar w3-blue w3-large">
    <li><a class="w3-text-white w3-hover-red" href="/">MC PControl</a></li>
    <li><a class="w3-hover-blue" href="#"></a></li>
    <li><a class="w3-hover-blue" href="#"></a></li>
    <li><a class="w3-text-white w3-hover-dark-grey" href="/">Home</a></li>
    <li><a class="w3-text-white w3-hover-dark-grey" href="#">LuckPerms</a></li>
    <li><a class="w3-text-white w3-hover-dark-grey" href="#">Control Panel</a></li>
    <li class="w3-right"><a class="w3-text-white w3-hover-dark-grey" href="/login.php?action=logout">Logout</a></li>
  </ul>
<?php
}else{
?>
  <ul class="w3-navbar w3-blue w3-large">
    <li><a class="w3-text-white w3-hover-red" href="/">MC PControl</a></li>
    <li><a class="w3-hover-blue" href="#"></a></li>
    <li><a class="w3-hover-blue" href="#"></a></li>
    <li class="w3-right"><a class="w3-text-white w3-hover-dark-grey" href="/login.php">Login</a></li>
  </ul>
<?php
}
?>
  </div>
<div class="margtop-container">
<?php
// Check if the get variable 'action' is defined
if(isset($_GET['action'])){
	// Set the get variable
	$action = $_GET['action'];
	// Check if the get variable is 'logout'
	if($action == "logout"){
		// Call the 'logout()' function
		if($current_user_is_logged_in == "true"){
		logout();
		}
		if($_GET['logout_success'] == "true"){
		// If logout success show html
		?>
			<div class="container">
				<div class="jumbotron">
					<h4>You have been logged out. <a href="/login.php">Login</a></h4>
				</div>
			</div>
		<?php
		}else{
		// If logout gone wrong then show html
			?>
			<div class="container">
				<div class="jumbotron">
					<h4>Logout failed! <a href="/login.php?action=logout">Try again</a></h4>
				</div>
			</div>
			<?php
		}
		die();
	}
}

// Check if the get variable 'message' is defined
if(isset($_GET['message'])){
	// Set the get variable
	$message = $_GET['message'];
	// Check if the get variable is 'login'
	if($message == "noperms"){
		$error[] = "You have no permission to view that page";
	}
}
// Check if user is logged in
if($current_user_is_logged_in == "true"){
	?>
	<div class="container">
		<div class="jumbotron">
			<h4>You are curently logged in. <a href="/login.php?action=logout">Logout</a></h4>
		</div>
	</div>
	<?php
	die();
}
?>
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
			<?php
			// Check if there are username errors
			if(!isset($username_err)) {
			?>
				<br><div class="form-group">
			      <label class="col-sm-2 control-label">Username:</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" name="username" id="username" placeholder="Your username" value="<?php if(!empty($username)){echo $username;} ?>" autofocus>
			      </div>
			    </div><br>
			<?php
			}else{
			?>
				<br><div class="form-group has-error has-feedback">
			      <label class="col-sm-2 control-label" for="inputError">Username</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" name="username" id="username" placeholder="Your username" value="<?php if(!empty($username)){echo $username;} ?>" autofocus>
			      </div>
			    </div><br>
			<?php
			}
			// Check if there are password errors
			if(!isset($password_err)) {
			?>
				<br><div class="form-group">
			      <label class="col-sm-2 control-label">Password:</label>
			      <div class="col-sm-10">
					<input type="password" class="form-control" name="password" id="password" placeholder="Your password" ></br>
			      </div>
			    </div><br>
			<?php
			}else{
			?>
				<br><div class="form-group has-error has-feedback">
			      <label class="col-sm-2 control-label" for="inputError">Password:</label>
			      <div class="col-sm-10">
					<input type="password" class="form-control" name="password" id="password" placeholder="Your password" ></br>
			      </div>
			    </div><br>
			<?php
			}
			// Show Google Recaptcha if activated
			if($google_recaptcha_activated == "true"){
			?>
			<br>
			<div style="border-color: red; border-width: 2px;">
			<div class="g-recaptcha" data-sitekey="<?php echo $google_recaptcha_sitekey ?>"></div></br></div>
			<?php
			}
			?>
			<br>
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button></br>
		</form>
	</div>
</div>
</div>
</body>
</html>