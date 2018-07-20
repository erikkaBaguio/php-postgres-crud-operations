<?php
	include 'includes/functions/db.func.php';
	include 'includes/functions/patient.func.php';
	
	$dbConn = dbConnect("host=localhost dbname=hms user=postgres password=password");
	
	echo create_patient_table();
	echo add_patient([]);
?>