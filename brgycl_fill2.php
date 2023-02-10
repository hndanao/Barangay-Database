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
			$n1=$row["last_name"];
			$n2=$row["first_name"];
			$n3=$row["con_no"];
			$n4=$row["street_name"];
			$n5=$row["blk_no"];
			$n6=$row["lot_no"];
			$n7=$row["birthdate"];
			$n8=$row["age"];
			$n9=$row["brgy_id"];
			
			$list .= "<form action='edit.php' name='bks' method='POST'>
					<tr>
			        <td align = 'center'>$n1</td>
					<td align = 'center'>$n2</td>
					<td align = 'center'>$n3</td>
					<td align = 'center'>$n4</td>
					<td align = 'center'>$n5</td>
					<td align = 'center'>$n6</td>
					<td align = 'center'>$n7</td>
					<td align = 'center'>$n8</td>
					<td align = 'center'>$n9</td>
					<input name='theseid' type='hidden' value='$id'>
				     </tr>
					 </form>";
					 
		}
	}else{
		$list = "NO DATA";
	}
}
?>
<html>
 <form action="generate.php" method="POST">
<button type="submit" class="btn btn-block btn-success">Generate PDF</button>
<h1>Thanks <?php echo $n2;?>, your PDF is now generated, <a href="./completed/<?php echo $_GET['link'];?>" download>Download it here</a></h1>   
</form>
</html>