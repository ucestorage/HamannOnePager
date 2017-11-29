<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login - Spedition Hamann</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
   <?php require 'src/css.php';?>
   
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
  <div class="container">
  <a class="navbar-brand" href="#page-top">Hamann Intern</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../index.php">Homepage</a>
            </li>
          </ul>
        </div>
  </div>
  </nav>
  <section>
    <div class="container">
	<form class="form-signin" name="form1" method="post" action="resources/lib/login/checklogin.php">
	<h2 class="form-signin-heading">Login</h2>
	<div class="row">
	<div class="col-md-6">
	<input name="myusername" id="myusername" type="text" class="form-control" placeholder="Benutzer" autofocus>
	</div>
	<div class="col-md-6">
	<input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Passwort">
	</div>
	</div>
	<hr/>
	<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
	 <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Einloggen</button>
	</div>
	<div class="col-md-4">
	</div>
	</div>
	 
      
        
        
        
        <!-- The checkbox remember me is not implemented yet...
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        -->
       
	    <!-- <a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account</a> -->
		
        <div id="message"></div>
      </form>
	
    </div> <!-- /container -->
	</section>
	<?php require '../public/src/footer.php';
		require 'src/scripts.php';
	?>

 

  </body>
</html>
