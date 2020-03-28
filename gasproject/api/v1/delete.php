<?php
	require "database/dbh.inc.php";
	$stmt = $conn->prepare("DELETE FROM gas_stats");
	$stmt->execute();
	$stmt->close();
	echo "Success";
?>