<?php 
require "resources/lib/login/loginheader.php";
require "resources/lib/login/dbconn.php";

$msg = '';
if (isset($_POST['Submit'])){
	try {
$db = new DbConn;

$username = $_SESSION['username'];
$datetimenow = date("Y-m-d H:i:s");
$datepicker=$_POST['datum'];
$selector = $_POST['ausab'];
$nummer = $_POST['quant'];

$stmt = $db->conn->prepare("INSERT INTO symrisebestand(username, datum, ausab, quant, mod_timestamp) values(:name,:datum,:ausab,:quant,:time)");

$stmt->bindParam(':name',$username);
$stmt->bindParam(':datum',$datepicker);
$stmt->bindParam(':ausab',$selector);
$stmt->bindParam(':quant',$nummer);
$stmt->bindParam(':time',$datetimenow);
$stmt->execute();

		} catch (PDOException $e){
			$err = "Error: " . $e->getMessage();
		}
		$msg = "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Danke $username! | Bestand $ausab$quant |  Zeitstempel: $datetimenow   </div>";
}
?>