<?php
use setasign\Fpdi\Fpdi;
if(isset($_POST["submit"])){


require_once('vendor/autoload.php');
$pdf = new Fpdi();
$pdf->AddPage();
$pagecount = $pdf->setSourceFile("test.pdf");

$tplId = $pdf->importPage(1);

$pdf->useTemplate($tplId, -10, 20, 210);


$image1width = 26;
$image1height =26;
$Yoffset = 51.4;
$Xoffset = 11;

$img_name = $_FILES['id']['name'];
$tmp_name = $_FILES['id']['tmp_name'];

$uploadpath = "ID/";  //my php upload path
$image1 = $uploadpath.basename($img_name);

move_uploaded_file($tmp_name, $image1);
$pdf->Image($image1,$Xoffset,$Yoffset,$image1width,$image1height);
unlink($image1);
$pdf->Output();}
?>