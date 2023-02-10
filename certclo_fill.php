<?php
//Retrieving the Database 
include "storescript/connect.php";
$list = "";
$mes="";
$sql = mysqli_query($conn,"SELECT * FROM business");
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
//To Transfer into the edit value
include "storescript/connect.php";
if(isset($_POST["userid"])){
	
	$postedid = $_POST["user_id"];
	$sql4 = mysqli_query($conn,"SELECT * FROM business where entry_id='$postedid'");
	if($sql4){
	$count = mysqli_num_rows($sql4);
	if($count==1){
		while($row = mysqli_fetch_array($sql4)){
		
			$c1=$row["business_name"];
			$c2=$row["business_add"];
			$c3=$row["owner_name"];
			$c4=$row["owner_add"];
			$c5=$row["business_nature"];
			$c6=$row["business_type"];
			$c7=$row["business_state"];
			
			
			
		}
	}else{
		$mes = "NO DATA";
	}
}
	
}

?>

<!DOCTYPE html>
<html>
<body  style="background-image:url(bc.jpg)">
<center>
<form autocomplete="off" action="certclo_fill.php" name="filling" method="POST" >
<h1 style="color:white ">REQUEST OF CERTIFICATE OF CLOSURE</h1>
<tr>
<td><input  name='subm' onClick="location.href='cert_clo.php'" style ='position:relative; left:-200px; top:250px;color: #000000 ;background-color:#FFF982  ; ;width:200px; height:30px' 
type='button' value='BACK'></td>

<table border=0 cellspacing = 0">			
			<table style="margin-top:50px; margin-left:-450px; color:#FFFFFF" border=0 cellspacing = 0">
			<tr>
			<td>Business Name</td>
			<td><input  name="b_name" type="text" class="form-control"  value="<?php echo $c1?>"></td></tr>
			<tr>
			<td>Business Address</td>
			<td><input  name="b_address" type="text" class="form-control" value="<?php echo $c2?>"></td></tr>	
			</table>
			</form>
			
			<form autocomplete="off" action="generate_certclo.php" name="filling" method="POST" >
			<table style="margin-top:-150px; margin-left:220px; color:#FFFFFF" border=0 cellspacing = 0">
			<tr>
			<td>Control No.</td>
			<td><input  name="ctrl_no" type="text" class="form-control" placeholder="Control number"></td></tr>
			<tr>
			<td>Date Issued</td>
			<td><input  name="date_issued" type="text" class="form-control" placeholder="Date today"></td></tr>
			<tr>
			<td>Business Name</td>
			<td><input  name="b_name" type="text" class="form-control"  value="<?php echo $c1?>"></td></tr>
			<tr>
			<td>Business Address</td>
			<td><input  name="b_address" type="text" class="form-control" value="<?php echo $c2?>"></td></tr>	
			<tr>
			<td>Closed Date</td>
			<td><input  name="cl_date" type="text" class="form-control" placeholder="Closed date"></td></tr>	
			<tr>
			<td>Date Signed</td>
			<td><input  name="signed_date" type="text" class="form-control" placeholder="Date signed"></td></tr>	
			<input type="submit" style="position:relative; left:120px; top:120px; background-color:#38C81E ;position:relative;height: 60px; width:150px;" class="btn btn-block btn-success" value="Generate to PDF">
			</table>
			</form>

</center>
</body>
</html>