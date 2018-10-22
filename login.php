<?php

session_start();

require_once 'token.php';

const userName = 'admin';
const userPassword = 'admin123';

if (isset($_POST['userName']) && isset($_POST['userPassword'])) {
  if ($_POST['userName'] === userName && $_POST['userPassword'] === userPassword) {
	$_SESSION['userName'] = $_POST['userName'];
    setcookie("id", session_id());
	Token::generate_token(session_id());
    header('Location: ./paymentPortal.php');
  }
  else {
    echo "<script>alert('Invalid Credentials. Please check again.');</script>";
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Payment Portal</title>
  </head>
  <body>
	<div class="container custom-padding-top-5">
	<h2>Login Page</h2>
  <br><br>
	<form method="post">
		User Name:<br><input name="userName"><br>
		Password:<br><input type="userPassword" name="userPassword"><br>
		<br>
		<input type="submit" value="Login">
	</form>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>