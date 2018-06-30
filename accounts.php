
<?php
		//database variables
		$serverName = "localhost";
		$userName = "root";
		$password = "root";
		$dbName = "accs";


		//new account variables
		$accName = $accBalance = $accLimit = $accType;

		//prepare data before inserting into database
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			$accName = test_input($_POST["name"]);
			$accBalance = test_input($_POST["balance"]);
			$accLimit = test_input($_POST["limit"]);
			$accType = test_input($_POST["type"]);
		}
		//FUNCTION: To prepare data
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;

		}

		/*
		* Inserts entered data into the database
		* Event: Click add button
		*/
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			//Check if any of the fields are empty
			// if so, show alert
			if (empty($_POST["name"]) 
				|| empty($_POST["balance"])
				|| empty($_POST["limit"])
				|| empty($_POST["type"])){
					echo "<script>alert('All fields are required')</script>";
			}
			//if all fields are entered, then proceed
			else{
				//connect to the database
				$insertConn = new mysqli($serverName, $userName, $password, $dbName);
				if ($insertConn->connect_error){
					die("Connection failed: " . $insertConn->connect_error);
				}
				//If account type is Installment, 
				//No Limit, show "Installment in the table"
				if($accType == "installment"){
					//Prepare specific sql statement
					//no limit value, will enter NULL into the DB
					//NULL entry shows as "Installment" in the table
					if (!$stmt = $insertConn->prepare ("INSERT INTO accounts (name, balance) VALUES(?, ?)")){
						echo "Prepare failed: " . $insertConn->error;
					}
					$stmt->bind_param("si", $accName, $accBalance);
				}else{
					//Prepare specific sql statement
					//regular credit account will show limit
					if (!$stmt = $insertConn->prepare ("INSERT INTO accounts (name, balance, max) VALUES(?, ?, ?)")){
						echo "Prepare failed: " . $insertConn->error;
					}
					$stmt->bind_param("sii", $accName, $accBalance, $accLimit);
				}
				//Execute SQL
				if(!$stmt->execute()){
					echo "Execution failed: " . $stmt->error;
				}
				//Close statement and the connection
			$stmt->close();
			$insertConn->close();

			}

		}


		
	?>

	<?php include("header.php"); ?>
	<h2 id="accountHeadline">Accounts</h2>
	<div class="tableAccounts">
			<table id="account">
				<tr>
					<th id="deleteHeading">(-)</th>
					<th>Account</th>
					<th>Balance</th>
					<th>Limit</th>
				</tr>

				<?php

				$conn = new mysqli($serverName, $userName, $password, $dbName);

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * from accounts";
				$result = $conn->query($sql);

				if($result->num_rows > 0){
					while ($row = $result->fetch_assoc()) {
						echo "<tr><td><a href=\"#\" class=\"deleteRow\">(-)</a></td>";
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
				<form id="newAccForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<label for="name">Account Name:</label>
					<input type="text" name="name">
					<label for="balance">Balance:</label>
					<input type="text" name="balance">
					<label for="limit">Limit:</label>
					<input type="text" name="limit">
					<input type="radio" name="type" value="credit" checked="checked">Credit
					<input type="radio" name="type" value="installment">Installment<br>
					<input id="accAddButton" type="submit" name="add" value="Add">
				</form>
			</fieldset>
		</div><!--newAcc-->

		<?php
			echo $accName . "<br>";
			echo $accBalance . "<br>";
			echo $accLimit . "<br>";
			echo $accType . "<br>";

		?>
		<?php include("footer.php"); ?>