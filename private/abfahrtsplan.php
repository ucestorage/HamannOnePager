<?php
 require "resources/lib/login/loginheader.php";
 require "resources/lib/login/dbconn.php";
$Msg = '';
if (isset($_POST['upload'])){
	$Msg = 'Loading....';
require_once "resources/lib/secureImageUp/config.php";
require_once "resources/lib/secureImageUp/imgupload.class.php";

$img = new ImageUpload;

$result = $img->uploadImages($_FILES['image']);

if(!empty($result->info)){
	foreach($result->info as $infoMsg){
		$Msg = "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>$infoMsg</div>";
	}
}

}

 ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Spedition Hamann Interner Bereich</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require 'src/css.php';?>
	 <link href='resources/lib/fancybox/fancybox.min.css' rel='stylesheet'>
	
	 
	

	 
  </head>

  <body>

   <?php require 'src/nav.php';?>
  <section class="small-section">
  <style type="text/css">
  .small-section {
	  padding-top: 100px;
	  padding-bottom: 50px;
  }
  .small-section-small {
	  padding-top: 20px;
	  padding-bottom: 50px;
  }
  .customSize {
	  width:100%;
	  height:auto;
  }
 
  </style>
  <div class="container">
  <div class="row text-center">
  <h4>Abfahrtspläne</h4>
  </div>
<form action="abfahrtsplan.php" method="POST" enctype="multipart/form-data">

	<input type="file" name="image[]">
	 <button class="btn btn-primary" type="submit" name="upload" id="submita"><i class="fa fa-paper-plane"></i> Hochladen</button>
	
</form>
 <hr/>
    <div class="row"><div class="message"><?php echo "$Msg";?></div></div>
  </section>
  <section class="small-section-small">
  <div class="container">
  <?php
$db = new DbConn;
$stmt = $db->conn->prepare("SELECT * from images ORDER BY mod_timestamp DESC LIMIT 2");
$iamges = array();
if ($stmt->execute()){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$images[] = $row;
	echo '<p><a href="resources/lib/secureImageUp/image.php?id='.$row["id"].'" data-fancybox ><img class="customSize" src="resources/lib/secureImageUp/image.php?id='.$row["id"].'"/></a></p>';

	}
}
$db = null;
?>
 
  


</div>
  </section>



	<?php require '../public/src/footer.php';?>
	<!-- SCRIPTS -->
  <?php require 'src/scripts.php';

  ?>

  <script src="resources/lib/fancybox/fancybox.min.js"></Script>
 
  
  
  

  </body>
</html>
 <!--<div class="slider-nav">
  <link href='resources/css/custom.css' rel='stylesheet'>

</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;<p>Schließen.</p></span></button>
	</div>
	<div class="modal-body">
	<div class="slider-for">
	<?php
$db = new DbConn;
$stmt = $db->conn->prepare("SELECT * from images ORDER BY mod_timestamp DESC LIMIT 2");
$iamges = array();
if ($stmt->execute()){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$images[] = $row;
	echo '<div><img src="resources/lib/secureImageUp/image.php?id='.$row["id"].'" alt=""></div>';

	}
}
$db = null;
?>
	
	</div>
	</div>
	</div>
	</div>
	</div>