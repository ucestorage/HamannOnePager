<?php require "resources/lib/login/loginheader.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Spedition Hamann Interner Bereich</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'src/css.php';?>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
  <div class="container">
  <a class="navbar-brand" href="#page-top">Hamann Intern - <?php echo "$_SESSION[username]" ;?></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="resources/lib/login/logout.php">Logout</a>
            </li>
          </ul>
        </div>
  </div>
  </nav>
  <section>
    <div class="container">
	<div class="row">
	<?php echo "<h4 class='service-heading'>Willkommen $_SESSION[username]</h4>";
	?>
	</div>
     <!-- <div class="form-signin">
        <div class="alert alert-success">Sie wurden <strong>erfolgreich eingeloggt</strong>.</div>
        
      </div> -->
	    <div class="row">
	   
	   
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
	<hr/>
	 <a href="symrise_bestand.php"><button name="symbestand"  class="btn btn-lg btn-primary btn-block" >Bestand Symrise</button></a>
	</div>
	<div class="col-md-2">
	</div>
	</div>
	   <div class="row">
	   
	   
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
	<hr/>
	 <a href="abfahrtsplan.php"><button name="abfahrt"  class="btn btn-lg btn-primary btn-block" >Abfahrtspläne</button></a>
	</div>
	<div class="col-md-2">
	</div>
	</div>
	
	  <div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
	<hr/>
	 <a href="abfahrtskontrolle.php"><button name="abfahrt"  class="btn btn-lg btn-primary btn-block" >Abfahrtskontrolle</button></a>
	</div>
	<div class="col-md-2">
	</div>
	</div>
    </div> <!-- /container -->
	</section>
	<?php require '../public/src/footer.php';?>
	<!-- SCRIPTS -->
  <?php require 'src/scripts.php';?>
  </body>
</html>
