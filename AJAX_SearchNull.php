<?php
	$SQL = "SELECT * FROM `main` WHERE `Durl` = '-1' ORDER BY `id` DESC limit 1";
	$result = Search_mysqlQuery($SQL);
	print_r(json_encode($result));
	function Search_mysqlQuery($sql) {
		/* Connect to a MySQL database using driver invocation */
		$dbname='youtuber';
		$hostIP='140.130.36.221';
		$user = 'theta';
		$password = 'theta';
		
		$dsn = 'mysql:dbname='.$dbname.';host='.$hostIP;
		$result = null;
		try {
			$dbh = new PDO($dsn, $user, $password);
			$result = $dbh->query($sql)->fetchAll(PDO::FETCH_OBJ);	
		} catch (PDOException $e) {
			echo 'Connection failed: '.$e->getMessage();
		}
		return $result;
	}
?>