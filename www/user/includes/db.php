<?php

	define("DBNAME", 'bank');
	define("DBUSER", 'root');
	define("DBPASS", 'ilovecupcakes');

	try
	{
		$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

?>