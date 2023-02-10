<?php 
require('GPDF_brgycl.php'); 
session_start();
use Classes\GeneratePDF;
require_once 'vendor/autoload.php';
if(isset($_POST["generate"])){

$data = [

	  'CONTROL NO' => $_POST['cont_no'],
	  'DATE' => $_POST['date'],
      'NAME' => $_POST['name'],
	  'ADDRESS' => $_POST['address'],
      'PERIOD OF STAY' => $_POST['POS'],
      'DATE OF BIRTH' => $_POST['DOB'],
	  'BIRTH PLACE' => $_POST['birthplace'],
      'CIVIL STATUS' => $_POST['civil_stats'],
	  'AGE' => $_POST['age'],
	  'GENDER' => $_POST['gender'],
	  'PURPOSE' => $_POST['purpose'],
	  'REMARKS' => $_POST['remarks'],
	  'NAME AND SIGNATURE' => $_POST['name2'],
	  'DATE TODAY' => $_POST['signed_date']
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);
$_SESSION["value"]=$response;
$_SESSION["name"]=$_POST['name'];

//header('Location: thanks_brgycl.php?name=' . $_POST['name'] . '&link=' . $response);
}
?>