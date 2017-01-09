<?php
	$Surl = isset($_GET["Surl"])?$_GET["Surl"]:null;
	$SQL = "INSERT INTO `main` (`id`, `Surl`, `Durl`) VALUES (NULL, '".$Surl."', '-1');";
	Insert_mysqlQuery($SQL);
	echo $Surl;
	function Insert_mysqlQuery($sql) {
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
