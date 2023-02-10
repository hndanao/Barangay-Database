<?php 
require('GPDF_certclo.php'); 
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	
require_once 'vendor/autoload.php';

use Classes\GeneratePDF;

$data = [

	  'CONTROL NO' => $_POST['ctrl_no'],
	  'DATE' => $_POST['date_issued'],   
	  'NAME OF BUSINESS' => $_POST['b_name'],
	  'ADDRESS' => $_POST['b_address'],
	  'CLOSED' => $_POST['cl_date'],
	  'CLOSED' => $_POST['signed_date']
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);


header('Location: thanks_certclo.php?name=' . $_POST['name'] . '&link=' . $response);
?>