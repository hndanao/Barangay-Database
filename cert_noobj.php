<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Certificate of No Objection</title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
	
</head>
<body style="background-image:url(bgg.jpg)">
   <form autocomplete="off" action="generate_certnoobj.php" method="POST">
    <h1 align="center">Certificate of No Objection</h1>
   <tr>
<td><input  name='subm' onClick="location.href='hp.php'" style ='position:relative; left:550px; top:370px;color: #000000;background-color:#C70039; width:200px; height:30px' type='button' value='BACK TO HOME PAGE'></td>
</tr>
<tr>
<td><input  name='subm' onClick="location.href='doc.php'" style ='position:relative; left:345px; top:321px;color: #000000 ;background-color:#92CDCC  ; ;width:200px; height:30px' 
type='button' value='BACK'></td>
</tr>
<center>
	<div class="form-group">
    <label for="date" class="col-sm-2 col-form-label col-form-label-lg">Date today:</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control form-control-lg" placeholder="Date today: MM/DD/YYYY	" name="date" id="date">
	</div>
  </div>
  <div class="form-group">
    <label for="name"  class="col-sm-2 col-form-label col-form-label-lg">Email address:</label>
	 <div class="col-sm-5">
    <input type="text" name="name" class="form-control form-control-lg" placeholder="Owner's Name" required class="form-control" id="name">
	</div>
  </div>
  <div class="form-group">
    <label for="sd" class="col-sm-2 col-form-label col-form-label-lg">Signed date:</label>
	 <div class="col-sm-5">
    <input type="text" name="signed_date" class="form-control form-control-lg" placeholder="Signed Date"id="sd" required>
  </div>
  </div>
  <input type="submit" style="position:relative; left:0px; top:100px; background-color:#FFC300 ; width:300px; height:70px; ;position:relative;" class="btn btn-block btn-success" value="Generate to PDF">
</center>
</body>
</form>
</html>