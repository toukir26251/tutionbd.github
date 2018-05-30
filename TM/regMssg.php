<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tutor_Management</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">Tutor Management</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           <li class="nav-item ">
              <a class="nav-link" href="home.php">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tutors.php">Tutors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tutions.php">Tutions</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Log In</a>
            </li>
			<li class="nav-item">
              <a class="nav-link active dropdown " href="signup.php">Sign Up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Payment
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Message</li>
      </ol>

      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-12 mb-4">
          <h3>Your account is Invalid.</h3>
            <div class="control-group form-group">
              
			Your payment is not done yet. Your account will be valid after pay <font style="color:green">BTD. 300</font>/month by bkash.<br>
			<img align="center" src="images\bkash.jpg" height="150"> Send money : <font style="color:purple; font-size:50px">01711122222</font> (personal)
			<form action="payment.php" method="post">
			<div class="col-lg-8 mb-4">
			<div class="control-group form-group">
              <div class="controls">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Paied Number:</label>
                <input type="telBkash" class="form-control" name="Bphone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>TrxID:</label>
                <input type="trxID" class="form-control" name="trxid" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
			<button type="submit" class="btn btn-primary" name="submitPaymentVarification">Submit for varification</button><br>
			</div>
			</form>
			
			<br>You can go to Log in . <a href="login.php">Click here</a><br>
			<br>You can go back to HOME .<a href="home.php">Click here</a><br>
        </div>

      </div>
      <!-- /.row -->

    </div><br>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Tutor Management @ 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

  </body>

</html>
