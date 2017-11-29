<?php 
require "resources/lib/login/loginheader.php";
require "resources/lib/login/dbconn.php";

$msg = '';
if (isset($_POST['Submit'])){
	try {
$db = new DbConn;

$username = $_SESSION['username'];
$datetimenow = date("Y-m-d H:i:s");
$datenow = date("Y-m-d");

$nummer = $_POST['quant'];

$stmt = $db->conn->prepare("INSERT INTO symrisebestand (username, quant, mod_timestamp, Datum) values(:name,:quant,:time, :datum)");

$stmt->bindParam(':name',$username);
$stmt->bindParam(':datum',$datenow);
$stmt->bindParam(':quant',$nummer);
$stmt->bindParam(':time',$datetimenow);

$stmt->execute();

		} catch (PDOException $e){
			$err = "Error: " . $e->getMessage();
		}
		$msg = "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Danke $username! | $nummer | Zeitstempel: $datetimenow   </div>";
}

?>
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
  <div class="row">
  
  <h4>Symrise Bestand Lose Sickenfässer</h4>
  
  
  </div>
  <div class="row">
	
  <div class="message">
  <?php echo "$msg";?>
  </div>
  </div>
  <div class="row">
  <button class="accordion">Warenein/ausgang buchen</button>
  <div class="panel">
   <form method="post" action="" class="form">
  <hr/>
  <div class="row">
   
  <div class="col-md-4">Quantität</div>
  <div class="col-md-4"><input type="number" class="full" name="quant"></div>
  <div class="col-md-4"><button class="btn btn-primary" type="submit" name="Submit" id="test"><i class="fa fa-paper-plane"></i> Buchen</button></div>
  
  
   
   
  </div>

 
  </form>
  </div>
  </div>
   
  <hr />
    <div class="row">
	<div class="col-md-6">
  <button class="accordion">Warenbestand | Aktuell:  <?php
$db = new DbConn;
$stmt = $db->conn->prepare("SELECT SUM(quant) AS Summe from symrisebestand");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$output = $row["Summe"];

echo $output;

$db = null;
?> </button>
 
  <div class="panel">
<hr/>
  <table border="1" cellspacing="2" cellpadding="2" class="full">
  <tr>
  <th class="col-md-2">Datum</th>
  <th class="col-md-2">Benutzer</th>
  
  <th class="col-md-2">Quantität</th>
  </tr>
   <?php
$db = new DbConn;
$timenow = date("Y-m-d H:i:s");
$stmt = $db->conn->prepare("SELECT * from symrisebestand ORDER BY mod_timestamp DESC LIMIT 20"); //select where mod_timestamp liegt in letzten 2 wochen
$result = array();
if ($stmt->execute()){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$result[] = $row;
	echo '<tr><td>'.$row["mod_timestamp"].'</td><td>'.$row["username"].'</td><td>'.$row["quant"].'</td></tr>';

	}
}
$db = null;
?>
 
 </table>
  </div>
  </div>
  <div class="col-md-6">
  <button class="accordion">Warenbestand der letzten 2 Wochen</button>
  <div class="panel">
  <hr />
  <table border="1" cellspacing="2" cellpadding="2" class="full">
  <tr>
  <th class="col-md-3">Datum</th>
 
  <th class="col-md-3">Endbestand</th>
  </tr>
     <?php
	 
	 function calculateInventoryTwoWeeks() {
		 $db = new DbConn;
		 $x = 0;
		 while ($x <= 13){
			 $date2 = strtotime("-$x days");
		
		 $calcdate2 = date("Y-m-d",$date2);
		
		 $stmt = $db->conn->prepare("SELECT SUM(quant) AS summe,Datum from symrisebestand WHERE Datum = '$calcdate2'");
		 $result = array();
if ($stmt->execute()){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$result[] = $row;
	echo '<tr><td>'.$calcdate2.'</td><td>'.$row["summe"].'</td></tr>';
	}
}

			 $x++;
		 }
		 $db = null;
	 }

calculateInventoryTwoWeeks();



?>
  </table>
  </div>
  </div>
  </div>
  
    
  </div>
  </section>
  

	<?php require '../public/src/footer.php';?>
	<!-- SCRIPTS -->
  <?php require 'src/scripts.php';?>
  </body>
</html>