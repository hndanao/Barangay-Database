<?php
//SEARCH AND FIND
include "storescript/connect.php"; 
if(isset($_POST['search']))
{
	$valueToSearch = $_POST['find'];
	$query = "SELECT * FROM `business` WHERE CONCAT (`business_name`) LIKE '%".$valueToSearch."%'";
	$search_result = filterTable($query);
	
}
	else{
	$query = "SELECT * FROM business";
	// $search_result = filterTable($query);
    $search_result = $conn->query($query);
	}
	
	function filterTable($query)
	{
		$host = "localhost";
		$db_username = "root";
		$db_pass = "";
		$db_name = "brgy_malamig";

		$conn = new mysqli($host,$db_username,$db_pass,$db_name);
		$filter_Result = mysqli_query($conn, $query);
		return $filter_Result;
    } 
$list = "";
$mes="";
$sql1 = mysqli_query($conn,$query);
if($sql1){
	$count = mysqli_num_rows($sql1);
	if($count>0){
		while($row = mysqli_fetch_array($sql1)){
			$id=$row["entry_id"];
			$n1=$row["business_name"];
			$n2=$row["business_add"];
			$n3=$row["owner_name"];
			$n4=$row["owner_add"];
			$n5=$row["business_nature"];
			$n6=$row["business_type"];
			$n7=$row["business_state"];
			
		//	$url .="<input name='theseid' type='hidden' value='$id'>";
		}
	}else{
		$list = "NO DATA";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title> FIND RESIDENT'S DETAILS</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <!-- <style>
   td{
   text-align: center}
		tr:hover{background-color:#F0E1AC}	
	table{
	width:100%;
	}
	th{
		height:50px;
	}
   </style> -->
</head>
<body style="background-image:url(brgy.png)">
<style>
   td{
   text-align: center}
		tr:hover{background-color:#A7F2FF }	

   </style>
<div class="row">
	<div class="col-12">
		
	</div>
</div>
<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="row align-items-center justify-content-between">
				<div class="col-4">
					<form action="cert_clo.php" autocomplete="OFF" method="POST">
						<div class="d-flex align-items-center">
								<input type="text" class="form-control mr-2" data-target="user-list" id="last-name-search" aria-describedby="emailHelp" placeholder="Enter business name" style="width:300px;">
							<button type="submit" class="btn btn-primary">Search</button>	
							<button type="button" style="position:relative; left: 10px;" onClick="location.href='doc.php'" class="btn btn-primary">Back</button>
						</div>
					</form>
				</div>
				
			</div>

		</div>
	</div>
	<div class="row pt-3">
		<div class="col-12">
		<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Business Name</th>
				<th scope="col">Business Address</th>
				<th scope="col">Owner's Name</th>
				<th scope="col">Owner's Address</th>
				<th scope="col">Nature of Business</th>
				<th scope="col">Type of Ownership</th>
				<th scope="col">State of Business</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody id="user-list" >
			<?php while($row = $search_result->fetch_assoc()):?>
			<tr>
				<td ><?php echo $row['business_name']; ?></td>
				<td><?php echo $row["business_add"];?></td>
				<td><?php echo $row["owner_name"];?></td>
				<td><?php echo $row["owner_add"];?></td>
				<td><?php echo $row["business_nature"];?></td>
				<td><?php echo $row["business_type"];?></td>
				<td><?php echo $row["business_state"];?></td>
				<td>
					<form action="certclo_fill.php" method="post">
						<input type="hidden" name="user_id" value="<?php echo $row['entry_id']; ?>">
						<button type="submit" name="userid" class="btn btn-danger" style="background-color: #DAF7A6; color: #000000">Request</button>
						
					</form>
				</td>
			</tr>
			<?php endwhile;?>	
 			 </tbody>
		</table>
		</div>
	</div>
</div>

		
    </form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			function SearchTable() {
				//bind on all your different inputs
				$("#last-name-search").on("keyup", function() {
				//get the input value, trimmed, and lowercased
				var value = this.value.trim().toLowerCase();
				//get the associated table
				var $table = $("#"+ this.getAttribute('data-target'));
				
				//show all the rows to "undo" previous filtering
				$table.find('tr').show();
				
				//only filter if the value is not blank
				if (value) {
					//find all the rows that do not match the filter, and hide them
					$table.find('tr').filter(function(){
					return this.innerText.toLowerCase().indexOf(value) < 0;
					}).hide();
				}
				});
			}

			SearchTable();
		});
	</script>
  </body>
</html>