<?php 
require('GPDF_brgyid.php'); 
session_start();
use Classes\GeneratePDF;
require_once 'vendor/autoload.php';
if(isset($_POST["save"])){

//require('brgyid_pic.php');
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	




$data = [

	  'ID NO' => $_POST['id_no'],
      'NAME' => $_POST['name'],
	  'ADDRESS' => $_POST['address'],
	  'CIVIL STATUS' => $_POST['civil_stats'],
      'DOB' => $_POST['DOB'],
	  'POB' => $_POST['birthplace'],
	  'GENDER' => $_POST['gender'],
	  'SSS ID' => $_POST['sssid_no'],
	  'TIN ID' => $_POST['tinid_no'],
	  'VALIDITY' => $_POST['val_date'],
	  'CON NAME' => $_POST['con_name'],
	  'CON ADD' => $_POST['con_add'],
	  'CON NO' => $_POST['con_no'],
	  //'ID' => $_FILES['id']["name"],
	  //'SIGNATURE' => $_FILES['signature']
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);
$_SESSION["value"]=$response;
$_SESSION["name"]=$_POST['name'];

//header('Location: thanks_brgyid.php?name=' . $_POST['name'] . '&link=' . $pdf);
//header('Location: brgyid_pic.php');
// . $_POST['name'] . '&link=' . $response);
}
?>
