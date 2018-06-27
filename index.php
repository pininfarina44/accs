

<!DOCTYPE html>
<html>
<head>
	<title>Accs</title>
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h2 id="hi">Accs Web App</h2>
		<nav class="mainNav">
			<ul id="navigationMenu">
				<li><a href="index.php">Home</a></li>
				<li><a href="accounts.php">Accounts</a></li>
			</ul>
		</nav><!--mainNav-->
	</div><!--header-->
	<div class="content">
		<div class="tableAccounts">
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

			</table>
		</div><!--tableAccounts-->

		<div class="plan">
			<table id="tablePlan">
				<tr>
					<th>Period</th>
					<th>Min Due</th>
					<th>Planned</th>
					<th>Paid</th>
				</tr>
				<tr>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
				</tr>
								<tr>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
				</tr>
								<tr>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
				</tr>
								<tr>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
					<td>berkay</td>
				</tr>

			</table>
		</div><!--plan-->

		<div class="newAcc">
			<fieldset>
				<legend>Add new account</legend>
				<form id="newAccForm">
					<label for="name">Account Name:</label><br>
					<input type="text" name="name"><br>
					<label for="balance">Balance:</label><br>
					<input type="text" name="balance"><br>
					<label for="limit">Limit:</label><br>
					<input type="text" name="limit"><br>
					<input type="radio" name="type" value="credit">Credit
					<input type="radio" name="type" value="installment">Installment<br>
					<input type="submit" name="add" value="Add">
				</form>
			</fieldset>
		</div><!--newAcc-->
	</div><!--content-->
</body>
</html>