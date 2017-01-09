<?php
	$id = isset($_POST["id"])?$_POST["id"]:null;
	$Durl = isset($_POST["Durl"])?$_POST["Durl"]:null;
	$SQL = "UPDATE `main` SET `Durl` = '".$Durl."' WHERE `main`.`id` = ".$id.";";
	echo $Durl;
	Search_mysqlQuery($SQL);
	function Search_mysqlQuery($sql) {
		/* Connect to a MySQL database using driver invocation */
		$dbname='youtuber';
		$hostIP='140.130.36.221';
		$user = 'theta';
		$password = 'theta';
		
		$dsn = 'mysql:dbname='.$dbname.';host='.$hostIP;
		try {
			$dbh = new PDO($dsn, $user, $password);
			$dbh->query($sql);	
		} catch (PDOException $e) {
			echo 'Connection failed: '.$e->getMessage();
		}
		
	}
?>
