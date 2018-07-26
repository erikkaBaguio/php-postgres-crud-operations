<?php
	include 'includes/functions/db.func.php';
	include 'includes/functions/patient.func.php';
	
	$dbConn = dbConnect("host=localhost dbname=hms user=postgres password=password");
	$info  = [];
	$fname = "";
	$lname = "";
	$add_result =0;

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

    # Search patient
    if(isset($_GET['fname'])){
    	$fname = trim($_GET['fname']);
    }
    if(isset($_GET['lname'])){
    	$lname = trim($_GET['lname']);
    }

    # Get all patient
	$patients = search_patients($_GET);
	$display_patients = 0;

	
?>

<!DOCTYPE html>
<html>
 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="includes/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="includes/bootstrap/dist/css/custom.css">
</head>
 
<body>
	<div class="container">
		<br>
		<br>
		<!-- <div class="jumbotron"> -->
			<div class="row">
				<?php include 'includes/html/patients.add.inc.php';?>
				<?php include 'includes/html/patients.search.inc.php';?>
				
			</div>
							
		<!-- </div> -->
	</div>
	     
	     
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="includes/bootstrap/dist/js/tether.min.js"></script>
	<script src="includes/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="includes/bootstrap/dist/js/ie10-viewport-bug-workaround.js"></script>
	<script src="includes/bootstrap/dist/js/Bootstrap_tutorial.js"></script>
</body>
 
</html>