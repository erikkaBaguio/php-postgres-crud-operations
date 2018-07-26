<?php

	function dbConnect($str)
	{
		$result = 0;
		$result = pg_connect($str);

		return $result;
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