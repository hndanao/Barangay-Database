<?php 
require('GPDF_buscl.php'); 
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	
require_once 'vendor/autoload.php';

use Classes\GeneratePDF;

$data = [

	  'BUSINESS CLEARANCE NO' => $_POST['bcl_no'],
	  'DATE ISSUED' => $_POST['date_issued'],
      'VALID UNTIL' => $_POST['date_valid'],
	  'BUSINESS NAME' => $_POST['b_name'],
	  'BUSINESS ADDRESS' => $_POST['b_address'],
	  'NAME OF OWNER' => $_POST['o_name'],
	  'ADDRESS OF OWNER' => $_POST['0_address'],
	  'NATURE OF BUSINESS' => $_POST['b_nature'],
	  'TYPE OF OWNERSHIP' => $_POST['o_type'],
	  'STATUS OF BUSINESS' => $_POST['b_stats']
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);


header('Location: thanks_buscl.php?name=' . $_POST['name'] . '&link=' . $response);
?>