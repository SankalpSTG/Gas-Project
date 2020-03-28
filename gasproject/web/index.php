
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<html>
	<head>
		<link rel="stylesheet" href="/includes/plugins/bootstrap/css/bootstrap.min.css">
		<!--<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		--><link rel="stylesheet" href="/includes/plugins/w3/w3.css">
		<link rel="stylesheet" href="plugins/custom/custom_style.css">
		<link rel="stylesheet" href="plugins/custom/custom_javascript.css">
		<link rel="shortcut icon" href="/includes/resources/images/icon/favicon4.ico" />
	</head>
	<body>
		<header>
			Real Time CO Gas Emission Measurement From Vehicles
		</header>
		<div class="container">
			<div class="table-container">
				<table border="0">
					<tr>
						<th class="">Serial Id</th>
						<th class="">Sensor Readings</th>
						<th class="">Date</th>
						<th class="">Time</th>
					</tr>
					<?php
						require "../api/v1/database/dbh.inc.php";
						$stmt = $conn->prepare("SELECT * FROM gas_stats ORDER BY serial_id DESC");
						$stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								echo "<tr>";
								$x = 0;
								echo "<td>".$row["serial_id"]."</td>";
								echo "<td>".$row["readings"]."</td>";
								echo "<td>".$row["day"]."/".$row["month"]."/".$row["year"]."</td>";
								echo "<td>".$row["hours"].":".$row["minutes"]."</td>";
								echo "</tr>";
							}
						}
					?>
				</table>
			</div>
		</div>
		<footer>
			&copy; Abhijit Kolhe
		</footer>
	</body>
</html>