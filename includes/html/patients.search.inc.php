<div class="col-sm-6">
	<div class="page-header">
        <h4>Search</h4><hr>
    </div>
    <div class="row">
    	<div class="col-sm-12">
    		<form class="form-inline" action="" method="GET">
			    <label class="sr-only" for="fname">First Name</label>
			    <input type="text" class="form-control mb-2 mr-sm-2" id="fname" name="fname" value="<?php echo $fname; ?>" size="15" placeholder="Firstname...">
			    <label class="sr-only" for="lname">Last Name</label>
			    <input type="text" class="form-control mb-2 mr-sm-2" id="lname" name="lname" value="<?php echo $lname; ?>" size="15" placeholder="Lastname..">
			 
			    <button type="submit" class="btn btn-primary mb-2" name="btn-search">Search</button>
			</form>
			<p>Records found: <?php echo count($patients); ?></p>
    		<table class="table table-hover table-bordered">
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
			            <td><a href="patient.update.class.php?id=<?php echo $value['id']; ?>" class="btn btn-info m-r-1em">Update</a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>	
    	</div>
    </div>
</div>