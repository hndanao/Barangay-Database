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
<form autocomplete="off" action="certres_fill.php" name="filling" method="POST" >
<h1 style="color:white ">REQUEST OF CERTIFICATE OF RESIDENCY</h1>
<input name='userid' type='hidden' value="<?php echo $row['entry_id']; ?>">
<td><input  name='subm' onClick="location.href='cert_res.php'" style ='position:relative; left:-200px; top:180px;color: #000000 ;background-color:#FFF982  ; ;width:200px; height:30px' 
type='button' value='BACK'></td>				
</tr>			
			<table style="margin-top:10px; margin-left:-400px; color:#FFFFFF" border=0 cellspacing = 0">
			<tr>
			<td>Name</td>
			<td><input  name="name" type="text" class="form-control" placeholder="name" value="<?php echo $c1?>, <?php echo $c2; ?>"></td></tr>
			<tr>
			<td>Address</td>
			<td><input  name="address" type="text" class="form-control" value="<?php echo $c4, $c5, $c6; ?>"></td></tr>
			<tr>
			<td>Age</td>
			<td><input name = "age"  type="text" class="form-control" value = "<?php echo $c8; ?>"></tr>
			</table>
			</form>
			
			<form autocomplete="off" action="generate_certres.php" name="filling" method="POST" >
			<table style="margin-top:-120px; margin-left:300px; color:#FFFFFF" border=0 cellspacing = 0">
			<tr>
			<td>Name</td>
			<td><input  name="name" type="text" class="form-control" placeholder="name" value="<?php echo $c1?>, <?php echo $c2; ?>"></td></tr>
			<tr>
			<td>Address</td>
			<td><input  name="address" type="text" class="form-control" value="<?php echo $c4, $c5, $c6; ?>"></td></tr>
			<tr>
			<td>Age</td>
			<td><input name = "age"  type="text" class="form-control" value = "<?php echo $c8; ?>"></tr>
			<tr>
			<td>Purpose</td>
			<td><input  name="purpose" type="text" class="form-control" placeholder="Purpose" ></td></tr>
			<td>Date</td>
			<td><input  name="date" type="text" class="form-control" placeholder="Date"></td></tr>
			<input type="submit" style="position:relative; left:100px; top:150px; background-color:#63EC4A;height: 50px; width:200px;" class="btn btn-block btn-success" value="Generate to PDF">
			
			</table>
			</form>
			
			
</center>
</body>
</html>	
