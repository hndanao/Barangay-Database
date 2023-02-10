<?php
//Retrieving the Database 
session_start();
include "storescript/connect.php";
$list = "";
$mes="";
$sql = mysqli_query($conn,"SELECT * FROM residents");
if($sql){
	$count = mysqli_num_rows($sql);
	if($count>0){
		while($row = mysqli_fetch_array($sql)){
			$id=$row["entry_id"];
		}
	}else{
		$list = "NO DATA";
	}
}
?>
<?php
//session_start();
$c1="";
$c2="";
$c3="";
$c4="";
$c5="";
$c6="";
$c7="";
$c8="";
$c9="";
$c10="";
$c11="";
$c12="";
$c13="";
$c14="";
$c15="";
$c16="";
$c17="";
$c18="";
$c19="";

//To Transfer into the edit value
include "storescript/connect.php";
if(isset($_POST["brgyid"])){
	
	$postedid = $_POST["brgy_id"];
	$sql4 = mysqli_query($conn,"SELECT * FROM residents where entry_id='$postedid'");

	if($sql4){
	$count = mysqli_num_rows($sql4);
	if($count==1){
		while($row = mysqli_fetch_array($sql4)){
		
			$c1=$row["last_name"];
			$c2=$row["first_name"];
			$c3=$row["con_no"];
			$c4=$row["street_name"];
			$c5=$row["blk_no"];
			$c6=$row["lot_no"];
			$c7=$row["birthdate"];
			$c8=$row["age"];
			$c9=$row["brgy_id"];
			$c10=$row["civil_status"];
			$c11=$row["period_of_stay"];
			$c12=$row["birthplace"];
			$c13=$row["gender"];
			$c14=$row["pic"];
			$c15=$row["cont_name"];
			$c16=$row["cont_no"];
			$c17=$row["cont_add"];
			$c18=$row["sss"];
			$c19=$row["tin"];
			
			
			
		}
	}else{
		$mes = "NO DATA";
	}$_SESSION["pict"]=$c14;
}}

	


?>
<?php
//SEARCH AND FIND
//session_start();
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
<!-----------------------------------------------------------------------------------------------------------------------------------
<?php 
require('GPDF_brgyid.php'); 
session_start();
use Classes\GeneratePDF;
require_once 'vendor/autoload.php';
if(isset($_POST["save"])){

//require('brgyid_pic.php');
//if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //   exit;
//}

//define('ACCESSCHECK', TRUE);
	




$data = [

	  'ID NO' => $_POST["id_no"],
      'NAME' => $_POST['name'],
	  'ADDRESS' => $_POST['address'],
	  'CIVIL STATUS' => $_POST['civil_stats'],
      'DOB' => $_POST['DOB'],
	  'POB' => $_POST['birthplace'],
	  'GENDER' => $_POST['gender'],
	  'SSS ID' => $_POST['sssid_no'],
	  'TIN ID' => $_POST['tinid_no'],
	  'VALIDITY' => $_POST['val_date'],
	  'CON NAME' => $_POST['con_name'],
	  'CON ADD' => $_POST['con_add'],
	  'CON NO' => $_POST['con_no'],
	  //'ID' => $_FILES['id']["name"],
	  //'SIGNATURE' => $_FILES['signature']
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);
$_SESSION["value"]=$response;
$_SESSION["name"]=$_POST['name'];

//header('Location: thanks_brgyid.php?name=' . $_POST['name'] . '&link=' . $pdf);
//header('Location: brgyid_pic.php');
// . $_POST['name'] . '&link=' . $response);
}
?>

--------------------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>
<body  style="background-color:#FFEAB8 ">
<center>
<form autocomplete="off" action="brgyid_fill.php" name="filling" method="POST" >
<h1 style="color:#C70039 ">REQUEST OF BARANGAY ID</h1>
<h3 style="color:#261757;font-size:25px; "> 1. Personal Information</h3>
			
<td><input style="position:relative; left:-200px; top:180px; background-color:#FFC300 ;color:#000000  ;width:200px; height:30px" name="ret" type="submit" value="Retrieve data from database"></td></tr>
<input name='theseid' type='hidden' value="<?php echo $id; ?>">
<tr>
<td><input  name='subm' onClick="location.href='brgy_id.php'" style ='position:relative; left:-404px; top:240px;color: #000000 ;background-color:#92CDCC  ; ;width:200px; height:30px' 
type='button' value='BACK'></td>
</tr>
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
<style>
#wrapper
{
top:130px;
left:90px;
}
#output_image
{
 max-width:300px;
 max-height:300px
}
.form-input img {
  width:100%;
  display:none;
  margin-top:20px; 
  margin-left: 300px;
}
</style>
		<!--	<form autocomplete="off" action="brgyid_fill.php" name="filling" method="POST" >-->
			
			<!--<h3 style="color:#261757  "> 1. Personal Information</h3>-->
			<table style="margin-top:-35px; margin-left:-600px; color:#000000"  border=0 cellspacing = 0">			
			<tr>
			<td>Name</td>
			<td><input  name="name" type="text" class="form-control"  value="<?php echo $c1?>, <?php echo $c2; ?>"></td></tr>
			<tr>
			<td>Address</td>
			<td><input  name="address" type="text" class="form-control" value="BLK<?php echo $c5?>, LOT<?php echo $c6?>, <?php echo $c4;?> street, Barangay Malamig, Binan City, Laguna"></td></tr>	
			<tr>
			<td>Civil Status</td>
			<td><input  name="civil_stats" type="text" class="form-control" value="<?php echo $c10; ?>"></td></tr>
			<tr>
			<td>Date of birth</td>
			<td><input  name="DOB" type="text" class="form-control" value="<?php echo $c7; ?>"></td></tr>
			<tr>
			<td>Birthplace</td>
			<td><input name = "birthplace" type="text" class="form-control" value = "<?php echo $c12; ?>">
			</td></tr>
			<td>Gender</td>
			<td><input name = "gender" type="text" class="form-control" value = "<?php echo $c13; ?>"></td></tr>
			</table>
				
			</form>
			<br/>
			
			<form autocomplete="off" action="brgyid_fill.php" name="clearance" method="POST" >
			<table style="margin-top:-200px; margin-left:90px; color:#000000" border=0 cellspacing = 0">
			<tr>
			<td>Resident ID No.</td>
			<td><input  name="id_no" type="text" class="form-control" placeholder="ID number"></td></tr>
			<tr>
			<td>Name</td>
			<td><input  name="name" type="text" class="form-control"  value="<?php echo $c1?>, <?php echo $c2; ?>"></td></tr>
			<tr>
			<td>Address</td>
			<td><input  name="address" type="text" class="form-control" value="BLK<?php echo $c5?>, LOT<?php echo $c6?>, <?php echo $c4;?> street, Barangay Malamig, Binan City, Laguna"></td></tr>	
			<tr>
			<td>Civil Status</td>
			<td><input  name="civil_stats" type="text" class="form-control" value="<?php echo $c10; ?>"></td></tr>
			<tr>
			<td>Date of birth</td>
			<td><input  name="DOB" type="text" class="form-control" value="<?php echo $c7; ?>"></td></tr>
			<tr>
			<td>Birthplace</td>
			<td><input name = "birthplace" type="text" class="form-control" value = "<?php echo $c12; ?>">
			</td></tr>
			<td>Gender</td>
			<td><input name = "gender" type="text" class="form-control" value = "<?php echo $c13; ?>"></td></tr>
			<tr>
			<td>SSS ID No.</td>
			<td><input  name="sssid_no" type="text" class="form-control" value = "<?php echo $c18; ?>"></td></tr>
			<tr>
			<td>TIN ID No.</td>
			<td><input  name="tinid_no" type="text" class="form-control" value = "<?php echo $c19; ?>"></td></tr>
			<tr>
			<td>VALIDITY DATE</td>
			<td><input  name="val_date" type="text" class="form-control" placeholder="Valid until"></td></tr>
			<td>Contact Person</td>
			<td><input  name="con_name" type="text" class="form-control" value = "<?php echo $c15; ?>"></td></tr>
			<td>Address</td>
			<td><input  name="con_add" type="text" class="form-control" value = "<?php echo $c17; ?>"></td></tr>
			<td>Contact number</td>
			<td><input  name="con_no" type="text" class="form-control" value = "<?php echo $c16; ?>"></td></tr>
			
		
			
			<input type="submit" name="save" value="SAVE" style="position:relative; left:290px; top:-30px; background-color:#40ECB0; width:150px; height: 40px"><!-- class="btn btn-block btn-success">-->
			<!--<td><input name='req' onClick="location.href='brgyid_pic.php'" style='background-color:#06A2A7 ;color:#FFFFFF  ;' type='button' value='BRGY ID' /></td>-->
			</table>
			<i style="font-size:15px; color:#E03300; background-color:#FFFFFF ; font-weight:bold; font-family:verdana"> ALWAYS CLICK SAVE BEFORE PROCEEDING TO ID PICTURE AND SIGNATURE</i>
			
			</form>
			
			
			<form autocomplete="off" action="brgyid_pic.php" name="filling" method="POST" enctype="multipart/form-data" >
			<h3 style="color:#1E5717;font-size:25px;"> 2.Put in ID picture and signature</h3>
			
			<!--<td><?php echo '<img src="'.$c14.'" style="width:200px; height:200px;" alt="Image">';?></td> -->
			<tr><td style="position:relative; left:290px; top:-270px; ">ID PICTURE</td></tr>
			<td><input name="id"  type="file" placeholder="upload"></td>
			
			<tr><td style="position:relative; left:100px; top:-250px; ">SIGNATURE</td></tr>	
			<td><input name="sign"  type="file" placeholder="upload"/ ></td>
			<input type="submit" style="position:relative; left:-380px; top:100px; background-color:#40EC4A  ; width:170px; height: 60px"  name="send" value="GENERATE PDF FILE">
			
			<!--<td><input name='edit' onClick="location.href='thanks_brgyid.php'" style='background-color:#06A2A7 ;color:#FFFFFF  ;' type='button' value='PROCEED' /></tr>-->
			
</form>
</center>
</body>
</html>
