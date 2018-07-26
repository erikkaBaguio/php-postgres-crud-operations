<?php
	include 'includes/classes/patient.class.php';
	include 'includes/classes/outPatient.class.php';
	// include 'includes/classes/customer.interface.inc.php';

	// $opatient = new Outpatient();
	// var_dump($opatient);
	// $opatient->msg();	
	// OutPatient::msg4();	
	// $opatient->msg2();	
	// $opatient->getPatientName();	

	$cus = new Patient;
	var_dump($cus->add_bill());


?>