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
		}
	}else{
		$list = "NO DATA";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Certificate of Residency</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">

</head>
<body style="background-image:url(tnx.jpg)">



            <div class="container text-center">

                      <h1>Thanks <?php echo $n2;?>, your PDF is now generated, <a href="./cert of residency/<?php echo $_GET['link'];?>" download>Download it here</a></h1>

                     <div class="clearfix mb-5"></div>

                      <a href="doc.php" class="btn btn-success">Generate another PDF</a>
					   <a href="hp.php" class="btn btn-success">Back to home page</a>
            </div>
                  

      
</body>
</html>