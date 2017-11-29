<?php 
require "resources/lib/login/loginheader.php";
require "resources/lib/login/dbconn.php";

$msg = '';
if (isset($_POST['Submit'])){
	try {
$db = new DbConn;
$tbl_abfahrtskontrolle = $db->tbl_abfahrtskontrolle;
$username = $_SESSION['username'];
$datetimenow = date("Y-m-d H:i:s");
$check1 = isset($_POST['lasi']) ? $_POST['lasi'] : 'n.i.O.';
$check2 = isset($_POST['fhzg']) ? $_POST['fhzg'] : 'n.i.O.';
$check3 = isset($_POST['anh']) ? $_POST['anh'] : 'n.i.O.';
$stmt = $db->conn->prepare("INSERT INTO ".$tbl_abfahrtskontrolle."(username, Lasi, Fhzg, Anh,mod_timestamp) values(:name,:lasi,:fhzg,:anh,:time)");
$msg = "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Danke $username; Abfahrtskontrolle durchgeführt. Zeitstempel: $datetimenow </div>";
$stmt->bindParam(':name',$username);
$stmt->bindParam(':lasi',$check1);
$stmt->bindParam(':fhzg',$check2);
$stmt->bindParam(':anh',$check3);
$stmt->bindParam(':time',$datetimenow);
$stmt->execute();

		} catch (PDOException $e){
			$err = "Error: " . $e->getMessage();
		}
}
?>