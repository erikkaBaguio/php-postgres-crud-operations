<?php
	include 'includes/functions/db.func.php';
	include 'includes/functions/patient.func.php';
	
	$dbConn = dbConnect("host=localhost dbname=hms user=postgres password=password");
	$add_result = "";
	$fname = "";
	$lname = "";


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
		<div class="page-header">
            <h1>Patients</h1>
        </div>
        <div class="row">
        	<div class="col-sm-12">
        		<form class="form-inline" action="" method="GET">
				    <label class="sr-only" for="fname">First Name</label>
				    <input type="text" class="form-control mb-2 mr-sm-2" id="fname" name="fname" value="<?php echo $fname; ?>" placeholder="Firstname...">
				    <label class="sr-only" for="lname">Last Name</label>
				    <input type="text" class="form-control mb-2 mr-sm-2" id="lname" name="lname" value="<?php echo $lname; ?>" placeholder="Latname..">
				 
				    <button type="submit" class="btn btn-primary mb-2" name="btn-search">Search</button>
				</form>
				<p>Records found: <?php echo count($patient); ?></p>
        		<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Age</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
					        foreach ($patients as $key => $value) {
					    ?>
						<tr>
							<th><?php echo $value['id'] ?></th>
				            <td><?php echo $value['fname'] .' '. $value['mname'] .' '. $value['lname']; ?></td>
				            <td><?php echo $value['age']; ?></td>
				            <td><a href="includes/html/patients.update.inc.php?id=<?php echo $value['id']; ?>" class="btn btn-info m-r-1em">Update</a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>	
        	</div>
        </div>
		<?php include 'includes/html/patient.add.inc.php';?>
	</div>
	     
	     
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="includes/bootstrap/dist/js/tether.min.js"></script>
	<script src="includes/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="includes/bootstrap/dist/js/ie10-viewport-bug-workaround.js"></script>
	<script src="includes/bootstrap/dist/js/Bootstrap_tutorial.js"></script>
</body>
 
</html>