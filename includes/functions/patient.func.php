<?php

	function create_patient_table()
	# Author: Ma. Erikka M. Baguio
	# Date created: July 20, 2018
	# Date modified: July 20, 2018
	{
		global $dbConn;
		$result = [];
		$debug = 0;


		$sql = "CREATE TABLE IF NOT EXISTS Patient(
					id 		serial primary key,
					fname 	varchar(60) not null,
					mname 	varchar(60) not null,
					lname 	varchar(60) not null,
					age 	int not null
				)";

		if($debug) die("SQL:".$sql);

		$result = pg_query($dbConn, $sql);

		if($result){
			return $result;
		} else {
			return pg_last_error($dbConn);
		}		
	}


	function sanitize_str($str)
	# Author: Ma. Erikka M. Baguio
	# Date created: July 20, 2018
	# Date modified: July 20, 2018
	# Description: Sanitize inputs to avoid SQL Injection 
	{
		$str = str_replace("'", "''", trim($str));
		return $str;
	}


	function add_patient($data)
	# Author: Ma. Erikka M. Baguio
	# Date created: July 20, 2018
	# Date modified: July 20, 2018
	{		
		global $dbConn;
		$result = [];
		$debug = 0;

		if($debug){
			print("DEBUG => add_patient()<br> Data:" ); 
			print_r($data); 
			echo "<br>";
		}

		# input validation
		if(empty($data)){
			return "ERROR: Empty patient data.";
		}
		if(!isset($data["fname"]) || $data["fname"]==''){
			return "ERROR: Fname Not Found.";
		}
		if(!isset($data["mname"]) || $data["mname"]==''){
			return "ERROR: Mname Not Found.";
		}
		if(!isset($data["lname"]) || $data["lname"]==''){
			return "ERROR: Lname Not Found.";
		}
		if(!isset($data["age"]) || $data["age"]==''){
			return "ERROR: Age Not Found.";
		}		

		#for sanitation to prevent SQL Injection
		$data["fname"] = sanitize_str($data["fname"]);
		$data["mname"] = sanitize_str($data["mname"]);
		$data["lname"] = sanitize_str($data["lname"]);
		$data["age"] = intval($data["age"]);


		# query
		$sql = "INSERT INTO Patient (fname, mname, lname, age) 
				VALUES ('{$data["fname"]}', '{$data["mname"]}', '{$data["lname"]}', '{$data["age"]}')
				RETURNING id";

		if($debug) die("SQL:".$sql);

		$result = pg_query($dbConn, $sql);

		if($result){
			$result = pg_fetch_row($result);
			return $result[0];
		} else {
			return pg_last_error($dbConn);
		}				
	}

?>