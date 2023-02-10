<?php
//Retrieving the Database 
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
//To Transfer into the edit value
include "storescript/connect.php";
if(isset($_POST["userid"])){
	
	$postedid = $_POST["user_id"];
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
			$_SESSION["pic"]=$c14;
			
			
		}
	}else{
		$mes = "NO DATA";
	}
}
	
}

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
<?php 
require('GPDF_brgycl.php'); 
session_start();
use Classes\GeneratePDF;
require_once 'vendor/autoload.php';
if(isset($_POST["submit"])){

$data = [

	  'CONTROL NO' => $_POST['cont_no'],
	  'DATE' => $_POST['date'],
      'NAME' => $_POST['name'],
	  'ADDRESS' => $_POST['address'],
      'PERIOD OF STAY' => $_POST['POS'],
      'DATE OF BIRTH' => $_POST['DOB'],
	  'BIRTH PLACE' => $_POST['birthplace'],
      'CIVIL STATUS' => $_POST['civil_stats'],
	  'AGE' => $_POST['age'],
	  'GENDER' => $_POST['gender'],
	  'PURPOSE' => $_POST['purpose'],
	  'REMARKS' => $_POST['remarks'],
	  'NAME AND SIGNATURE' => $_POST['name2'],
	  'DATE TODAY' => $_POST['signed_date']
];

$pdf = new GeneratePDF;
$response = $pdf->generate($data);
$_SESSION["file"]=$response;
$_SESSION["name"]=$_POST['name'];

//header('Location: thanks_brgycl.php?name=' . $_POST['name'] . '&link=' . $response);
}
?>
<!DOCTYPE html>
<html>
<body  style="background-image:url(bc.jpg)">
<center>
<form autocomplete="off" action="brgycl_fill.php" name="filling" method="POST" >
<h1 style="color:white ">REQUEST OF BARANGAY CLEARANCE</h1>
<h3 style="color:#EEFFD1 ;font-size:25px; "> 1. Personal Information</h3>
<input name='userid' type='hidden' value="<?php echo $row['entry_id']; ?>">
<td><input  name='subm' onClick="location.href='brgy_cl.php'" style ='position:relative; left:-230px; top:220px;color: #000000 ;background-color:#FFF982 ; ;width:200px; height:30px' 
type='button' value='BACK'></td>		

<table style="margin-top:-30px; margin-left:-400px; color:#FFFFFF"  border=0 cellspacing = 0">			
<td>Name</td>
			<td><input  name="name" type="text" class="form-control"  value="<?php echo $c1?>, <?php echo $c2; ?>"></td></tr>
			<tr>
			<td>Address</td>
			<td><input  name="address" type="text" class="form-control" value="BLK<?php echo $c5?>, LOT<?php echo $c6?>, <?php echo $c4;?> street, Barangay Malamig, Binan City, Laguna"></td></tr>	
			<tr>
			<td>Period of stay</td>
			<td><input  name="POS" type="text" class="form-control" value="<?php echo $c11; ?>"></td></tr>
			<tr>
			<td>Civil Status</td>
			<td><input  name="civil_stats" type="text" class="form-control" value="<?php echo $c10; ?>"></td></tr>
			<tr>
			<td>Date of birth</td>
			<td><input  name="DOB" type="text" class="form-control" value="<?php echo $c7; ?>"></td></tr>
			<tr>
			<td>Age</td>
			<td><input name = "age"  type="text" class="form-control" value = "<?php echo $c8; ?>">
			<tr>
			<td>Birthplace</td>
			<td><input name = "birthplace" type="text" class="form-control" value = "<?php echo $c12; ?>">
			</td></tr>
			<td>Gender</td>
			<td><input name = "gender" type="text" class="form-control" value = "<?php echo $c13; ?>"></td></tr>
			</table>
			</form>
			
			<form autocomplete="off" action="brgycl_fill.php" name="filling" method="POST" >
			<table style="margin-top:-230px; margin-left:200px; color:#FFFFFF"  border=0 cellspacing = 0">		
			<tr>
			<td>Control No.</td>
			<td><input  name="cont_no" type="text" class="form-control" placeholder="Control number"></td></tr>
			<td>Date today</td>
			<td><input  name="date" type="text" class="form-control" placeholder="Date today"></td></tr>
			<tr>
			<td>Name</td>
			<td><input  name="name" type="text" class="form-control"  value="<?php echo $c1?>, <?php echo $c2; ?>"></td></tr>
			<tr>
			<td>Address</td>
			<td><input  name="address" type="text" class="form-control" value="BLK<?php echo $c5?>, LOT<?php echo $c6?>, <?php echo $c4;?> street, Barangay Malamig, Binan City, Laguna"></td></tr>	
			<tr>
			<td>Period of stay</td>
			<td><input  name="POS" type="text" class="form-control" value="<?php echo $c11; ?>"></td></tr>
			<tr>
			<td>Civil Status</td>
			<td><input  name="civil_stats" type="text" class="form-control" value="<?php echo $c10; ?>"></td></tr>
			<tr>
			<td>Date of birth</td>
			<td><input  name="DOB" type="text" class="form-control" value="<?php echo $c7; ?>"></td></tr>
			<tr>
			<td>Age</td>
			<td><input name = "age"  type="text" class="form-control" value = "<?php echo $c8; ?>">
			<tr>
			<td>Birthplace</td>
			<td><input name = "birthplace" type="text" class="form-control" value = "<?php echo $c12; ?>">
			</td></tr>
			<td>Gender</td>
			<td><input name = "gender" type="text" class="form-control" value = "<?php echo $c13; ?>"></td></tr>
			<tr>
			<td>Purpose</td>
			<td><input  name="purpose" type="text" class="form-control" placeholder="Purpose"></td></tr>
			<td>Remarks</td>
			<td><input  name="remarks" type="text" class="form-control" placeholder="Remarks"></td></tr>
			<td>Signed date</td>
			<td><input  name="signed_date" type="text" class="form-control" placeholder="Signed date"></td></tr>
			<td>Signatory name</td>
			<td><input  name="name2" type="text" class="form-control" value="<?php echo $c1?>, <?php echo $c2; ?>"></td></tr>
			
			
			
			<input type="submit" style="position:relative; left:20px; top:160px; background-color:#FFF8A7   ;width:150px; height: 40px" name="submit" value="SAVE">
			</table>
			<i style="position:relative; left:20px; top:90px; font-size:15px; color:#C70039; background-color:#FFFFFF; font-weight:bold; font-family:verdana"> ALWAYS CLICK SAVE BEFORE PROCEEDING TO ID PICTURE AND SIGNATURE</i>
			
			</form>

			<form autocomplete="off" action="brgycl_pic.php" name="filling" method="POST" enctype="multipart/form-data" >
			
			<h3 style="position:relative: margin-left:35px; margin-top:100px;color:#DAF7A6 ;font-size:25px;"> 2.Picture</h3>
			<td><input  style="position:relative; left:100px; top:10px;" name="id"  type="file"></td>
		
			<input type="submit" style="position:relative; left:-130px; top:90px; background-color:#0EE80B ; width:170px; height: 60px" name="generate" value="GENERATE PDF FILE">
			
			</form>
</center>
</body>
</html>
