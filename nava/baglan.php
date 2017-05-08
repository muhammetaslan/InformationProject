<?php

	try {
	    $conn = new PDO('mysql:host=localhost;dbname=maac_logistics;charset=utf8','root', '');

	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	catch(PDOException $e)
	    {
	    echo "Bağlantı başarısız: " . $e->getMessage();
	    }

?>