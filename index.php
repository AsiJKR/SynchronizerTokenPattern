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
      <?php
        session_start();
        if (session_id() == '' || !isset($_SESSION['userName'])) {
      ?>
      <a class="green" href="./login.php">Login</a>
      <hr>
      <?php
        }
        else {
          header('Location: ./paymentPortal.php');
        }
      ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	</body>
</html>