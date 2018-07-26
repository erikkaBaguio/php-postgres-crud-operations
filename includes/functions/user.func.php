<?php
	// BEFORE LOGIN CHECK TOKEN

	function login($data)
	# Author: Ma. Erikka M. Baguio
	# Date created: July 25, 2018
	# Date modified: July 25, 2018
	{		
		global $dbConn;
		$result = [];
		$debug = 0;

		if($debug){
			print_r($data); 
			echo "<br>";
		}

		# input validation
		if(empty($data)){
			return "ERROR: Empty patient data.";
		}
		if(!isset($data["username"]) || $data["username"]==''){
			return "ERROR: Enter username.";
		}
		if(!isset($data["password"]) || $data["password"]==''){
			return "ERROR: Enter password.";
		}	

		#for sanitation to prevent SQL Injection
		$data["username"] = sanitize_str($data["username"]);
		$data["password"] = sanitize_str($data["password"]);


		# query
		$sql = "SELECT COUNT(*) 
				FROM users 
				WHERE username='{$data["username"]}' AND password='{$data["password"]}';";

		$result = pg_query($dbConn, $sql);

		if($result){
			$result = pg_fetch_row($result);
			return $result[0];
		} else {
			return pg_last_error($dbConn);
		}				
	}
?>