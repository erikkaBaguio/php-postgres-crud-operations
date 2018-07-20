<?php
	include '../functions/db.func.php';
	include '../functions/patient.func.php';
	
	$dbConn = dbConnect("host=localhost dbname=hms user=postgres password=password");
	$add_result = "";

	# Add patient
	if(isset($_POST["btn-add"]))
	{
		$add_result_msg = add_patient($_POST);
		$add_result = intval($add_result_msg);
		if(intval($add_result == 0)){
			$add_result = '<div class="alert alert-danger" role="alert">'. $add_result_msg .'</div>';
		}else{
			$add_result = '<div class="alert alert-success" role="alert">Added patient successfully!</div>';
		}
	}
?>

<!DOCTYPE html>
<html>
 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/custom.css">
</head>
 
<body>
	<div class="container">
		<br>
		<br>
		<div class="jumbotron">
			<h4 class="display-6">Add Patient</h4><hr>
			<?php 
				if($add_result != ""){
					echo $add_result;
				}
			?>
			<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group row">
					<label for="inputUser" class="col-sm-3 col-form-label">First Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="inputFname" name="fname">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputUser" class="col-sm-3 col-form-label">Middle Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="inputMname" name="mname">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputUser" class="col-sm-3 col-form-label">Last Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="inputLname" name="lname">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputUser" class="col-sm-3 col-form-label">Age</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" id="inputAge" name="age">
					</div>
				</div>
				<div class="form-group row">
					<div class="offset-sm-3 col-sm-9">
							<input type="submit" value="Add Patient" name="btn-add" class="btn btn-primary" onclick="$('')" />
							<span><a href="../../index.php" class="btn btn-success m-r-1em">Back</a></span>
					</div>
				</div>

			</form>			
			</div>
	</div>
	     
	     
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="../bootstrap/dist/js/tether.min.js"></script>
	<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../bootstrap/dist/js/ie10-viewport-bug-workaround.js"></script>
	<script src="../bootstrap/dist/js/Bootstrap_tutorial.js"></script>
</body>
 
</html>