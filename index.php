

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
		.header{

		}
		.content{
			
		}
		.tableAccounts{	
			width: 24%;
			float: left;		
		}
		.newAcc{
			margin-top: 15px;
			width: 24%;
			min-width: 310px;
		}
		.plan{
			float: right;
			position: relative;
			width: 76%;
		}
		h2{
			text-align: center;
		}
		table{
			border-collapse: collapse;
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

		label{
			padding: 5px;
			font-size: 1em;
		}

		input{
			margin: 5px;
			font-size: 1em;
		}
		fieldset{
			background-color: #efefef;
		}
		legend{
			border: 1px solid #999999;
			margin: 0 auto;
			border-radius: 5px;
			background-color: #efefef;
			padding: 8px;
		}


	</style>
</head>
<body>
	<div class="header">
		<h2 id="hi">Accs Main Page</h2>
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