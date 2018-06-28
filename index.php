

	<?php include("header.php"); ?>

	<div class="content">
		

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
	
	<?php include("footer.php"); ?>