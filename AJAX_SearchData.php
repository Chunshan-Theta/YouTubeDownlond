<?php
	$TVideo = isset($_GET["TVideo"])?$_GET["TVideo"]:"Mztr2HPWG5Q";
	$SQL = "SELECT * FROM `main` WHERE `Surl` = '".$TVideo."'ORDER BY `id` DESC LIMIT 1";
	$result = Search_mysqlQuery($SQL);
	if(!isset($result[0])){
		echo "[]";
	}
	else{
		$result = json_decode(json_encode($result[0]), True);
		print_r($result['Durl']);

	}
	
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
	//SELECT * FROM `main` WHERE `Surl` = 'zEGK33FBdE8' ORDER BY `id` DESC LIMIT 1

?>