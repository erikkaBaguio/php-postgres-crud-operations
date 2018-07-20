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

?>