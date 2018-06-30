	<?php include("header.php"); ?>
	<h2 id="accountHeadline">Accounts</h2>
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
		<div class="newAcc">
			<fieldset>
				<form id="newAccForm">
					<label for="name">Account Name:</label>
					<input type="text" name="name">
					<label for="balance">Balance:</label>
					<input type="text" name="balance">
					<label for="limit">Limit:</label>
					<input type="text" name="limit">
					<input type="radio" name="type" value="credit">Credit
					<input type="radio" name="type" value="installment">Installment<br>
					<input id="submitbutton" type="submit" name="add" value="Add">
				</form>
			</fieldset>
		</div><!--newAcc-->

		<?php include("footer.php"); ?>