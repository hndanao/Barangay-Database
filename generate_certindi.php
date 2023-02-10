<?php 
require('GPDF_certindi.php'); 
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	
require_once 'vendor/autoload.php';

use Classes\GeneratePDF;

$data = [

	  'CONTROL NO' => $_POST['cont_no'],
	  'DATE' => $_POST['date'],
          'NAME' => $_POST['name'],
	  'ADDRESS' => $_POST['address'],
	  'AGE' => $_POST['age'],
	  'PURPOSE' => $_POST['purpose'],
	  'REMARKS' => $_POST['remarks'],
	  'DATE TODAY' => $_POST['signed_date']
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);


header('Location: thanks_certindi.php?name=' . $_POST['name'] . '&link=' . $response);

?>