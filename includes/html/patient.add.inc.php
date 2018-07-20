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
		</div>
	</div>

</form>			
</div>