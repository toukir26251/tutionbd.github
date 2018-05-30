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
              <a class="nav-link active dropdown" href="login.php">Log In</a>
            </li>
			<li class="nav-item">
              <a class="nav-link " href="signup.php">Sign Up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Log In
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Log In</li>
      </ol>

      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Are you a registered user ?</h3>
          <form method="post" action="loginCheck.php">
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Password:</label>
                <input type="password" class="form-control" name="pass" required data-validation-required-message="Please enter the password">
              </div>
            </div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="submitVarification">Log in</button><br><br>
			If not , <a href="signup.html">register</a> now
          </form>
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
