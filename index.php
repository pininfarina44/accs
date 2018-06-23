

<!DOCTYPE html>
<html>
<head>
	<title>Accs</title>
	<script type="text/javascript" src="js/main.js"></script>
	<style>
		body{
			font-family: Verdana, serif;
			width: 80%;
			margin: 0 auto;
		}
		h2{
			text-align: center;
		}
		table{
			border-collapse: collapse;
			width: 30%;
			border: 1px solid #dddddd;
		}
		td, th{
			text-align: left;
			padding: 8px ;
			border-bottom: 1px solid #dddddd;
		}
		th{
			border-bottom: 2px solid #000000;
		}
		tr:hover {
			background-color: #efefef;
		}
		tr:nth-child(even){
			background-color: #dddddd;
		}
	</style>
</head>
<body>

	<h2 id="hi">Accs Main Page</h2>
	<table id="account">
		<tr>
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
				echo "<tr><td>" .$row["name"] . "</td>";
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

	</table><br>
	<div>
		<form>
			<label for="name">Account Name </label>
			<input type="text" name="name"><br>
			<label for="balance">Balance </label>
			<input type="text" name="balance"><br>
			<label for="limit">Limit</label>
			<input type="text" name="limit"><br>
			<input type="submit" name="add">
		</form>
	</div>
</body>
</html>