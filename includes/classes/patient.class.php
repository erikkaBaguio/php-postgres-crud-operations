<?php 
	
	class Patient
	{
		var $id = 0;
		var $fname = 'defaultknj';
		var $mname = '';
		var $lname = '';
		var $age   = '';
		var	$conn  = "";

		function __construct()
		{
			$this->conn = dbConnect("host=localhost dbname=hms user=postgres password=password");
		}

		function add_patient($data)
		# Author: Ma. Erikka M. Baguio
		# Date created: July 20, 2018
		# Date modified: July 20, 2018
		{		
		
			$result = [];
			$debug = 0;

			if($debug){
				echo "<br>"; 
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

			$result = pg_query($this->conn, $sql);

			if($result){
				$result = pg_fetch_row($result);
				return $result[0];
			} else {
				return pg_last_error($this->conn);
			}				
		}


		function get_patient_info($id=0)
		# Author: Ma. Erikka M. Baguio
		# Date created: July 20, 2018
		# Date modified: July 20, 2018
		{
			$debug = 0;
			$sql = "SELECT * FROM patient WHERE id=".intval($id);
			if($debug){ echo $sql."<br>"; }

			$result = pg_query($this->conn, $sql);	

			if (!$result) {
			    return pg_last_error($this->conn);
			}
			if (pg_num_rows($result) == 0) {
				return "Record not found.";
			} else {
				$result = pg_fetch_object($result);
				if($debug){ print_r($result); }
			}

			return $result;
		}


		function search_patients($data=[])
		# Author: Ma. Erikka M. Baguio
		# Date created: July 20, 2018
		# Date modified: July 20, 2018
		{
			$result = [];
			$debug = 0;
			$sql = "SELECT * FROM patient WHERE true ";

			if($debug){
				print_r($data);
			}

			if(!empty($data)){
				if(!empty($data['fname'])){
					$sql .= " AND fname iLIKE '%".$data['fname']."%' ";
				}

				if(!empty($data['lname'])){
					$sql .= " AND lname iLIKE '%".$data['lname']."%' ";
				}

			}

			$sql .= " ORDER BY id DESC";

			if($debug){
				die($sql); 
			}

			$result = pg_query($this->conn, $sql);

			if (pg_num_rows($result) == 0) {
				return "Record not found.";
			}

			if ($result) {
				return pg_fetch_all($result);
			} else {
				return pg_last_error($this->conn);
			}
		}


		function update_patient($data)
		# Author: Ma. Erikka M. Baguio
		# Date created: July 20, 2018
		# Date modified: July 20, 2018
		{
			$result = [];
			$debug  = 0;

			if($debug){
				echo "<br>"; 
				print_r($data); 
				echo "<br>";
			}

			// input validation
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
			if(!isset($data["id"]) || $data["id"]==''){
				return "ERROR: ID Not Found.";
			}


			#for sanitation to prevent SQL Injection
			$data["fname"] = sanitize_str($data["fname"]);
			$data["mname"] = sanitize_str($data["mname"]);
			$data["lname"] = sanitize_str($data["lname"]);
			$data["age"] = intval($data["age"]);

			// query
			$sql ="	UPDATE patient 
					SET fname='{$data["fname"]}', mname='{$data["mname"]}', lname='{$data["lname"]}', age={$data["age"]} 
					WHERE id = {$data["id"]}";
			if($debug){ die($sql); }
			$result = pg_query($this->conn, $sql);

			// echo $result;
			if($result){
				return $result;
			} else {
				return pg_last_error($this->conn);	
			}
		}
	}
?>