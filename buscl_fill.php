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
<form autocomplete="off" action="buscl_fill.php" name="filling" method="POST" >
<h1 style="color:white ">REQUEST OF BUSINESS CLEARANCE</h1>
<input name='userid' type='hidden' value="<?php echo $row['entry_id']; ?>">
<tr>
<td><input  name='subm' onClick="location.href='bus_cl.php'" style ='position:relative; left:-220px; top:300px;color: #000000 ;background-color:#FFF982  ; ;width:200px; height:30px' 
type='button' value='BACK'></td>
</tr>		
			<table style="margin-top:20px; margin-left:-450px; color:#FFFFFF" border=0 cellspacing = 0">
			<tr>
			<td>Business Name</td>
			<td><input  name="b_name" type="text" class="form-control"  value="<?php echo $c1?>"></td></tr>
			<tr>
			<td>Business Address</td>
			<td><input  name="b_address" type="text" class="form-control" value="<?php echo $c2?>"></td></tr>	
			<tr>
			<td>Name of Owner</td>
			<td><input name = "o_name"  type="text" class="form-control" value = "<?php echo $c3; ?>"></tr>
			<tr>
			<td>Address of Owner</td>
			<td><input name = "o_address"  type="text" class="form-control" value = "<?php echo $c4; ?>"></tr>
			<tr>
			<td>Nature of Business</td>
			<td><input name = "b_nature"  type="text" class="form-control" value = "<?php echo $c5; ?>"></tr>
			<tr>
			<td>Type of Ownership</td>
			<td><input name = "o_type"  type="text" class="form-control" value = "<?php echo $c6; ?>"></tr>
			<tr>
			<td>Status of Business</td>
			<td><input name = "b_stats"  type="text" class="form-control" value = "<?php echo $c7; ?>"></tr>
			</table>
			</form>
			
			<br/>
			
			<form autocomplete="off" action="generate_buscl.php" name="clearance" method="POST" >
			<table style="margin-top:-210px; margin-left:350px; color:#FFFFFF" border=0 cellspacing = 0">
			<tr>
			<td>Business Clearance No.</td>
			<td><input  name="bcl_no" type="text" class="form-control" placeholder="Control number"></td></tr>
			<td>Date Issued</td>
			<td><input  name="date_issued" type="text" class="form-control" placeholder="Date today"></td></tr>
			<td>Valid Until</td>
			<td><input  name="date_valid" type="text" class="form-control" placeholder="Validity Date"></td></tr>
			<tr>
			<td>Business Name</td>
			<td><input  name="b_name" type="text" class="form-control"  value="<?php echo $c1?>"></td></tr>
			<tr>
			<td>Business Address</td>
			<td><input  name="b_address" type="text" class="form-control" value="<?php echo $c2?>"></td></tr>	
			<tr>
			<td>Name of Owner</td>
			<td><input name = "o_name"  type="text" class="form-control" value = "<?php echo $c3; ?>"></tr>
			<tr>
			<td>Address of Owner</td>
			<td><input name = "o_address"  type="text" class="form-control" value = "<?php echo $c4; ?>"></tr>
			<tr>
			<td>Nature of Business</td>
			<td><input name = "b_nature"  type="text" class="form-control" value = "<?php echo $c5; ?>"></tr>
			<tr>
			<td>Type of Ownership</td>
			<td><input name = "o_type"  type="text" class="form-control" value = "<?php echo $c6; ?>"></tr>
			<tr>
			<td>Status of Business</td>
			<td><input name = "b_stats"  type="text" class="form-control" value = "<?php echo $c7; ?>"></tr>
			<input type="submit" style="position:relative; left:200px; top:120px; background-color:#38C81E ;position:relative;height: 50px; width:200px;" class="btn btn-block btn-success" value="Generate to PDF">
			</table>
			</form>

</center>
</body>
</html>