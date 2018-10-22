<?php 

  session_start();
  require_once 'token.php';
  $display_msg = "";

  if(isset($_POST['accountnumber'], $_POST['amount'], $_POST['csrf-token'])){

      $accountnumber = $_POST['accountnumber'];
      $amount = $_POST['amount'];
      $csrf_token = $_POST['csrf-token'];

      if(!empty($accountnumber) && !empty($amount) && !empty($csrf_token)){
		
        if(Token::check_token($csrf_token)){
          $msg = "Transaction successfull!!!" . $amount . " rupees Send to Account No:  \"" . $accountnumber . "\"";
          $display_msg = "<p class=\"text\">".$msg."</p>";
        }
        else{
          $msg = "Current token is invalid";
          $display_msg = "<p class=\"text\">".$msg."</p>";
        }
      }
      else{
        echo "<script>alert('Please Check your details');</script>";
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
      <?php
        if (session_id() == '' || !isset($_SESSION['userName'])) { 
          header('Location: ./index.php');
      ?>
      <?php
        } 
        else {
          echo "Welcome, " . $_SESSION['userName'] . " | ";
      ?>
      
      <hr>
      <br>
      <form action="" method="POST">
        <strong>Payment Portal</strong> 
        <br><br>
        Account Number:<br><input name="accountnumber"><br>
        Amount:<br><input name="amount"><br>
        
        <input type="hidden" name="csrf-token" id="csrf-token" value="">
		<br>
        <input type="submit" value="Submit">
      </form>
      <?php
        echo $display_msg;
        }
      ?>
    </div>
	
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./ajaxscript.js"></script>
  </body>
</html>