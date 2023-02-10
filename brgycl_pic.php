<?php
//include "storescript/connect.php"; 
session_start();
use setasign\Fpdi\Fpdi;
if(isset($_POST["generate"])){
//------------------------------------------------------------------------------------------------

$filename = $_SESSION["file"];

//------------------------------------------------------------------------------------------------

require_once('vendor/autoload.php');
require_once('vendor/autoload_fpdi.php');
$pdf = new Fpdi();
$pdf->AddPage();
$pagecount = $pdf->setSourceFile('./brgy clearance/'.$filename);

$tplId = $pdf->importPage(1);

$pdf->useTemplate($tplId, -10, 20, 210);


$imagewidth = 30;
$imageheight =30;
$Yoffset = 190;
$Xoffset = 80;

$img_name = $_FILES['id']['name'];
$tmp_name = $_FILES['id']['tmp_name'];
$uploadpath = "brgy clearance/";  //my php upload path
$image= $uploadpath.basename($img_name);
//--------------------------------------------------------------------------------------------------


move_uploaded_file($tmp_name, $image);

$pdf->Image($image,$Xoffset,$Yoffset,$imagewidth,$imageheight);

unlink($image);
$name = $_SESSION["name"];
$file ='Clearance_'.$name.'.pdf';
$pdf->Output('F','./brgy clearance/'.$file);

}

header('Location: thanks_brgycl.php?name='.$name. '&link='.$file);
?>

<?php
//SEARCH AND FIND
include "storescript/connect.php"; 
if(isset($_POST['search']))
{
	$valueToSearch = $_POST['find'];
	$query = "SELECT * FROM `residents` WHERE CONCAT (`last_name`) LIKE '%".$valueToSearch."%'";
	$search_result = filterTable($query);
	
}
	else{
	$query = "SELECT * FROM residents";
	$search_result = filterTable($query);
	}
	
	function filterTable($query)
	{
		$host = "localhost";
		$db_username = "brgy_sec";
		$db_pass = "";
		$db_name = "brgy_malamig";

		$conn = new mysqli($host,$db_username,$db_pass,$db_name);
		$filter_Result = mysqli_query($conn, $query);
		return $filter_Result;
    } 
	
?>

