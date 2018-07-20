<?php
	include '../functions/db.func.php';
	include '../functions/patient.func.php';
	
	$dbConn = dbConnect("host=localhost dbname=hms user=postgres password=password");
	$add_result = "";
	$fname = "";
	$lname = "";
	

	# Update patient
	if(isset($_POST["btn-update"]))
	{

		$update_result = update_patient($_POST);
		$update_result = intval($update_result);

		if($update_result){
			$update_result = '<div class="alert alert-success" role="alert">Update successful.</div>';
		}else{
			$update_result = '<div class="alert alert-danger" role="alert">Update failed. '.$update_result.'</div>';
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
		<div class="page-header">
            <h1>Update Patient</h1>
        </div>
        <div class="row">
        	<div class="col-sm-12">
	        	<div class="jumbotron">
				<h4 class="display-6">Update Patient</h4><hr>
				<?php 
					if($update_result != ""){
						echo $update_result;
					}
				?>
				<form role="form" method="post" action="">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">ID</label>
						<div class="col-sm-9">
							<?php echo $id; ?>
							<input type="hidden" name="id" value="<?php echo $id; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputUser" class="col-sm-3 col-form-label">First Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputFname" name="fname" value="<?php echo $info->fname; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputUser" class="col-sm-3 col-form-label">Middle Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputMname" name="mname" value="<?php echo $info->mname; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputUser" class="col-sm-3 col-form-label">Last Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputLname" name="lname" value="<?php echo $info->lname; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputUser" class="col-sm-3 col-form-label">Age</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="inputAge" name="age" value="<?php echo $info->age; ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="offset-sm-3 col-sm-9">
								<input type="submit" value="Update" name="btn-update" class="btn btn-primary" />
						</div>
					</div>
				</form>			
				</div>
			</div>
        </div>
	</div>
	     
	     
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="includes/bootstrap/dist/js/tether.min.js"></script>
	<script src="includes/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="includes/bootstrap/dist/js/ie10-viewport-bug-workaround.js"></script>
	<script src="includes/bootstrap/dist/js/Bootstrap_tutorial.js"></script>
</body>
 
</html>