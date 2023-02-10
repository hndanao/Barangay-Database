<?php 
require('GPDF_certnoobj.php'); 
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	
require_once 'vendor/autoload.php';

use Classes\GeneratePDF;

$data = [

	  'Date' => $_POST['date'],
	  'OWNER' => $_POST['name'],   
	  'DATE SIGNED' => $_POST['signed_date'],
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);


header('Location: thanks_certnoobj.php?name=' . $_POST['name'] . '&link=' . $response);
?>