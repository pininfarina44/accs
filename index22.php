<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Accs3</title>
</head>
<body>
	<?php
		session_unset();
		echo "All session variables removed<br>";

		session_destroy();
		echo "Session Destroyed";

		print_r($_SESSION);

	?>

</body>
</html>