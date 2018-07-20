<?php

	function dbConnect($str)
	{
		$result = 0;
		$result = pg_connect($str);

		return $result;
	}

?>