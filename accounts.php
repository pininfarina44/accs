<!DOCTYPE html>
<html>
<head>
	<title>Accounts</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h2>Accounts</h2>
	<div class="tableAccounts">
			<table id="account">
				<tr>
					<th>(-)</th>
					<th>Account</th>
					<th>Balance</th>
					<th>Limit</th>
				</tr>

				<?php

				$serverName = "localhost";
				$userName = "root";
				$password = "root";
				$dbName = "accs";

				$conn = new mysqli($serverName, $userName, $password, $dbName);

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * from accounts";
				$result = $conn->query($sql);

				if($result->num_rows > 0){
					while ($row = $result->fetch_assoc()) {
						echo "<tr><td><a href=\"#\" class=\"deleteRow\">del</a></td>";
						echo "<td>" .$row["name"] . "</td>";
						echo "<td>" .$row["balance"] . "</td>";
						if ($row["max"] == ""){
							echo "<td>Installment</td></tr>";
						}else{
							echo "<td>" .$row["max"] . "</td></tr>";
						}
					}
				} else{
					echo "0 results";
				}

				$conn->close();

			?>

			</table>
		</div><!--tableAccounts-->
</body>
</html>