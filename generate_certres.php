<?php 
require('GPDF_certres.php'); 
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	
require_once 'vendor/autoload.php';

use Classes\GeneratePDF;

$data = [

      'NAME' => $_POST['name'],
	  'ADDRESS' => $_POST['address'],
	  'AGE' => $_POST['age'],
	  'PURPOSE' => $_POST['purpose'],
	  'Date' => $_POST['date'],
	   'DATE SIGNED' => $_POST['date']
];


$pdf = new GeneratePDF;
$response = $pdf->generate($data);


header('Location: thanks_certres.php?name=' . $_POST['name'] . '&link=' . $response);
?>