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
$query = "SELECT * FROM residents";
$sql = mysqli_query($conn,$query);
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
			
			
					 
		}
	}else{
		$list = "NO DATA";
	}
}
?>
<?php
if(isset($_POST["del"])){
	$postedid = $_POST["theseid"];

	$sql3 = mysqli_query($conn,"DELETE FROM residents where
	entry_id='$postedid'"    ) OR die("error");
	$mes = "deleted SUCCESFUL!!!";
}
?>
<?php
//ADDING
include ("storescript/connect.php");
if(isset($_POST["add_user"])){
	$n1 = $_POST["c1"];
	$n2 = $_POST["c2"];
	$n3 = $_POST["c3"];
	$n4 = $_POST["c4"];
	$n5 = $_POST["c5"];
	$n6 = $_POST["c6"];
	$n7 = $_POST["c7"];
	$n8 = $_POST["c8"];
	$n9 = $_POST["c9"];
	$n10 = $_POST["c10"];
	$n11 = $_POST["c11"];
	$n12 = $_POST["c12"];
	$n13 = $_POST["c13"];
	$n15 = $_POST["c14"];
	$n16 = $_POST["c16"];
	$n17 = $_POST["c17"];
	$n18 = $_POST["c18"];
	$n19 = $_POST["c19"];
	
	$img_name1 = $_FILES['c14']['name'];
	$img_size1 = $_FILES['c14']['size'];
	$tmp_name1 = $_FILES['c14']['tmp_name'];
	$error = $_FILES['c14']['error'];
	
	
	//$sql = mysqli_query($conn,
	
	$mes = "Details added successfully";

	echo "<pre>";
	print_r($_FILES['c14']);

	echo "</pre>";

	if ($error === 0) {
		if (($img_size1 > 125000)){
			$em = "Sorry, your file is too large.";
		    header("Location: find_test.php?error=$em");
		}else {
			$img_ex1 = pathinfo($img_name1, PATHINFO_EXTENSION);
			$img_ex_lc1 = strtolower($img_ex1);

			
			$allowed_exs1 = array("jpg", "jpeg", "png"); 
			
		
			if (in_array	($img_ex_lc1, $allowed_exs1)) {
				$new_img_name1 = "IMG-". $_POST["c1"].'.'.$img_ex_lc1;
				$img_upload_path1 = 'ID/'.$new_img_name1;
				move_uploaded_file($tmp_name1, $img_upload_path1);
				
				

				$sql = "INSERT INTO residents(last_name,first_name, con_no, street_name, blk_no, lot_no, birthdate, age, brgy_id,
				civil_status, period_of_stay, birthplace, gender, pic, cont_name, cont_no, cont_add, sss, tin) 
				VALUES ('$n1','$n2','$n3','$n4','$n5', '$n6', '$n7', '$n8', '$n9', '$n10', '$n11', '$n12', '$n13', '$new_img_name1',
				'$n15', '$n16', '$n17', '$n18', '$n19' )" OR die("error");
				mysqli_query($conn, $sql);
				header("Location: find_test.php");
			}else {
				$em = "You can't upload files of this type";
		        
		}
		}
}}
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
<body style="background-image:url(resi.jpg)">
<style>
   td{
   text-align: center}
		tr:hover{background-color:#F0E1AC}	

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
					<form action="find_test.php" method="POST">
						<div class="d-flex align-items-center">
								<input type="text" class="form-control mr-2" data-target="user-list" id="last-name-search" aria-describedby="emailHelp" placeholder="Enter last name" style="width:300px;">
							<button type="submit" class="btn btn-primary">Search</button>	
							<button type="button" style="position:relative; left: 10px;" onClick="location.href='page02.php'" class="btn btn-primary">Back</button>
						</div>
					</form>
				</div>
				<div class="col-4 d-flex justify-content-end">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addnewModal">
						Add New
					</button>
				</div>
			</div>

		</div>
	</div>
	<div class="row pt-3">
		<div class="col-12">
		<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Picture</th>
				<th scope="col">Last Name</th>
				<th scope="col">First Name</th>
				<th scope="col">Contact Number</th>
				<th scope="col">Street Name</th>
				<th scope="col">Block Number</th>
				<th scope="col">Lot Number</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody id="user-list" >
			<?php while($row = $search_result->fetch_assoc()):?>
			<tr>
				<td><?php echo '<img src="ID/'.($row['pic']).'" style="width:100px; height:100px;" alt="Image">';?></td> 	
				<td><?php echo $row['last_name'];?></td>
				<td ><?php echo $row['first_name'];?></td>
				<td><?php echo $row['con_no'];?></td>
				<td><?php echo $row['street_name'];?></td>
				<td ><?php echo $row['blk_no'];?></td>
				<td><?php echo $row['lot_no'];?></td>
				<td>
					<form action="delete_user.php" method="post">
						<input type="hidden" name="user_id" value="<?php echo $row['entry_id']; ?>">
						<button type="submit" class="btn btn-danger">Delete</button>
						
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

<div class="modal fade" id="addnewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form autocomplete="off" method="POST" action="find_test.php"  enctype="multipart/form-data">
			<div class="form-group">
				<label for="FirstName">First Name</label>
				<input type="text" class="form-control" name="c2">
			</div>
			<div class="form-group">
				<label for="LastName">Last Name</label>
				<input type="text" class="form-control" name="c1">
			</div>
			<div class="form-group">
				<label for="LastName">Contact Number</label>
				<input type="text" class="form-control" name="c3">
			</div>
			<div class="form-group">
				<label for="LastName">Street Name</label>
				<input type="text" class="form-control" name="c4">
			</div>
			<div class="form-group">
				<label for="LastName">Block Number</label>
				<input type="text" class="form-control" name="c5">
			</div>
			<div class="form-group">
				<label for="LastName">Lot Number</label>
				<input type="text" class="form-control" name="c6">
			</div>
			<div class="form-group">
				<label for="BirthDate">Date of birth</label>
				<input type="text" class="form-control" name="c7">
			</div>
			<div class="form-group">
				<label for="LastName">Age</label>
				<input type="text" class="form-control" name="c8">
			</div>
			<div class="form-group">
				<label for="LastName">Brgy ID no.</label>
				<input type="text" class="form-control" name="c9">
			</div>
			<div class="form-group">
				<label for="LastName">Civil Status</label>
				<select id="cs" name="c10" style="width:155px; height: 20px">
					<option value="Single">Single</option>
					<option value="Married">Married</option>
					<option value="Divorced">Divorced</option>
					<option value="Widowed">Widowed</option>
				</select></tr></td>
			</div>
			<div class="form-group">
				<label for="LastName">Period of stay</label>
				<input type="text" class="form-control" name="c11">
			</div>
			<div class="form-group">
				<label for="LastName">Place of birth</label>
				<input type="text" class="form-control" name="c12">
			</div>
			<div class="form-group">
				<label for="LastName">Gender</label>
				<select id="genders" name="c13" style="width:155px; height: 25px">
					<option value="Female">Female</option>
					<option value="Male">Male</option>
					<option value="Rather not say">Rather not say</option>
				</select></tr></td>
			</div>
			<div class="form-group">
				<label for="LastName">Picture</label>	
				<input name="c14" type="file">
			</div>
			<div class="form-group">
				<label for="LastName">Name of contact person</label>	
				<input type="text" class="form-control" name="c15">
			</div>
			<div class="form-group">
				<label for="LastName">Contact number of person</label>	
				<input type="text" class="form-control" name="c16">
			</div>
			<div class="form-group">
				<label for="LastName">Address of contact person</label>	
				<input type="text" class="form-control" name="c17">
			</div>
			<div class="form-group">
				<label for="LastName">SSS ID No.</label>	
				<input type="text" class="form-control" name="c18">
			</div>
			<div class="form-group">
				<label for="LastName">TIN ID No.</label>	
				<input type="text" class="form-control" name="c19">
			</div>
			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-success" name="add_user">Save changes</button>
			</div>
			
		</form>
      </div>
    </div>
  </div>
</div>
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