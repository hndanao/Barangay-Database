<?php 
require('GeneratePDF.php'); 
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	
require_once 'vendor/autoload.php';

use Classes\GeneratePDF;

$data = [

      'NAME' => $_POST['name'],
	  'ADDRESS' => $_POST['address'],
      'PERIOD OF STAY' => $_POST['POS'],
      'DATE OF BIRTH' => $_POST['DOB'],
	  'BIRTH PLACE' => $_POST['birthplace'],
      'CIVIL STATUS [1]' => $_POST['civil_stats'],
	  'CIVIL STATUS [2]' => $_POST['age'],
	  'CIVIL STATUS [3]' => $_POST['gender'],
	  'PURPOSE' => $_POST['purpose'],
	  'REMARKS' => $_POST['remarks'],
	  'NAME AND SIGNATURE(Click to sign)' => $_POST['name2'],
];


$pdf = new GeneratePDF;
$response = $pdf->generate($data);


header('Location: thanks.php?name=' . $_POST['name'] . '&link=' . $response);
?>