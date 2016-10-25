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

// Check if user is logged in 
if($current_user_is_logged_in != "true"){
	header("Location: /login.php?message=noperms");
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LuckPerms Interface | Dashboard</title>
	<link rel="stylesheet" href="/assets/css/styles.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/d3e071620c.js"></script>
</head>
<body>
<div class="w3-top">
  <ul class="w3-navbar w3-blue w3-large">
    <li><a class="w3-text-white w3-hover-red" href="/">MC PControl</a></li>
    <li><a class="w3-hover-blue" href="#"></a></li>
    <li><a class="w3-hover-blue" href="#"></a></li>
    <li><a class="w3-text-white w3-hover-dark-grey" href="/">Home</a></li>
    <li><a class="w3-text-white w3-hover-dark-grey" href="#">LuckPerms</a></li>
    <li><a class="w3-text-white w3-hover-dark-grey" href="#">Control Panel</a></li>
    <li class="w3-right"><a class="w3-text-white w3-hover-dark-grey" href="/login.php?action=logout">Logout</a></li>
  </ul>
  </div>




</body>
</html>