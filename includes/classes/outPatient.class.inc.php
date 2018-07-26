<?php


class Outpatient extends Patient {

	var $patient_id = 0;

	function __constructor()
	{
		echo "Outpatient instantiated!";
	}

	function setPatientid($id)
	{
		$this->patient_id = $id;
	}

	function getPatientName()
	{
		// $this->msg3();
		// $this->patient_id = $id;
		parent::msg4();
	}

	public static function msg4()
	{
		// $result = Patient::msg();
		echo "succ!";
		// return $result;
		// var_dump($this->conn);
	}

	function msg()
	{
		echo "another success!<br>";
	}
}

?>