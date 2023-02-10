<?php
//include 'generate_brgyid.php'; 
session_start();
//require_once 'generate_brgyid.php';
use setasign\Fpdi\Fpdi;
if(isset($_POST["send"])){

//---------------------------------------------------------



$filename = $_SESSION["value"];



//========================================================

require_once('vendor/autoload.php');
require_once('vendor/autoload_fpdi.php');
$pdf = new Fpdi();
$pdf->AddPage();
//echo $filename -> generate($data);
$pagecount = $pdf->setSourceFile('./brgy id/'.$filename);

$tplId = $pdf->importPage(1);

$pdf->useTemplate($tplId, -10, 20, 210);
//---------------------------------------------------------------------------------------------------------------------
//ID PICTURE
$image1width = 26;
$image1height =26;
$Yoffset = 53.4;
$Xoffset = 13;

$img_name1 = $_FILES['id']['name'];
$tmp_name1 = $_FILES['id']['tmp_name'];

$uploadpath = "ID/";  //my php upload path
$image1 = $uploadpath.basename($img_name1);

move_uploaded_file($tmp_name1, $image1);
$pdf->Image($image1,$Xoffset,$Yoffset,$image1width,$image1height);
unlink($image1);
//---------------------------------------------------------------------------------------------------------------
//SIGNATURE
$image2width = 26;
$image2height =10;
$YYoffset = 65;
$XXoffset = 61;

$img_name2 = $_FILES['sign']['name'];
$tmp_name2 = $_FILES['sign']['tmp_name'];

$uploadpath = "ID/";  //my php upload path
$image2 = $uploadpath.basename($img_name2);

move_uploaded_file($tmp_name2, $image2);
$pdf->Image($image2,$XXoffset,$YYoffset,$image2width,$image2height);
unlink($image2);
//------------------------------------------------------------------------------------------------------------------------
$name = $_SESSION["name"];
$file ='BRGYID_'.$name.'.pdf';
$pdf->Output('F','./upload/'.$file);
//$response = $pdf->generate($data);

}


//$response = $pdf->generate($data);


//header('Location: thanks_certindi.php?name=' . $_POST['name'] . '&link=' . $response);
header('Location: thanks_brgyid.php?name='.$name. '&link='.$file);
//header('Content-Disposition: attachment; filename='.$pdf.);
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


<!--<html>
<body>
<form action="brgyid_pic.php" method="POST" enctype="multipart/form-data">
//<?php// while($row = mysqli_fetch_array($search_result)):?>
			<td><?php //echo '<img src="uploads/'.$row['pic'].'" style="width:200px; height:200px;" alt="Image">'?></td> 
			<input name="id"  type="file" placeholder="upload"/ >
			
			<?php// endwhile;?>
			
			<input type="Submit" style ='position:relative; color: #000000;background-color:#DAF7A6; width:200px; height:30px' name="send" value="SAVE">
			<td><input name='edit' onClick="location.href='thanks_brgyid.php'" style='background-color:#06A2A7 ;color:#FFFFFF  ;' type='button' value='PROCEED' /></tr>
										
</form>
</body>
</html>