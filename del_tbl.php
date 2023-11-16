<?php
	include 'functions.foyer.php';
	$db = new db($dbhost, $dbuser, $dbpass, $dbname);
	$delete = $db->query("DELETE FROM foyer_insr");
	include 'footer.php';
?>