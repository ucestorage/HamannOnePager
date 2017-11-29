<?php require 'src/abfahrtcontroller.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Spedition Hamann Interner Bereich</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'src/css.php';?>
  </head>
  <body>
  <?php require 'src/nav.php';?>
  <section>
  <div class="container">
  <div class="row text-center">
  <h4>Abfahrtskontrolle</h4>
  </div>
  <form method="post" action="" name="abfahrtForm" class="form">
  
  <ul>
  <li>
  <label><input type="checkbox" name="lasi" value="i.O." id="lasi"> Ladungssicherung</label>
  </li>
  <li>
  <label><input type="checkbox" name="fhzg" value="i.O." id="fhzg"> Fahrzeug</label>
  </li>
  <li>
  <label><input type="checkbox" name="anh" value="i.O."id="anh"> Anhänger</label>
  </li>
  </ul>
  
  <button class="btn btn-primary" type="submit" name="Submit" id="submit"><i class="fa fa-paper-plane"></i> Senden</button>
  </form>
  <hr/>
    <div class="row">
	
  <div class="message">
  <?php echo "$msg";
  echo "lelek";?>
  </div>
  </div>
  </div>
  </section>
  

	<?php require '../public/src/footer.php';?>
	<!-- SCRIPTS -->
  <?php require 'src/scripts.php';?>
  </body>
</html>