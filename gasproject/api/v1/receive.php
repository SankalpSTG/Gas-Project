<?php
	date_default_timezone_set("Asia/Kolkata");
	require "database/dbh.inc.php";
	if(isset($_POST["reading"])){
		$reading = $_POST["reading"];
		$day = date("d");
		$month = date("m");
		$year = date("Y");
		$hours = date("H");
		$minutes = date("i");
		$stmt = $conn->prepare("INSERT INTO gas_stats (readings, day, month, year, hours, minutes) VALUES(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiii", $reading, $day, $month, $year, $hours, $minutes);
		$stmt->execute();
		$stmt->close();
		echo "Success";
	}else{
		echo "No Reading Received";
	}
?>