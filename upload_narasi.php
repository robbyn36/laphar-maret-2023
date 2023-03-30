<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Susun Narasi File</title>
</head>
<body>
	<form action="proses_upload2.php" method="post" >
		<textarea name="narasi" id="" cols="30" rows="10"></textarea>
		<input type="submit" name="kirim_data">
	</form>
</body>
</html>


<?php
// Check if a success message was passed in the URL
	if (isset($_GET['success'])) {
	    $success_message = $_GET['success'];
	    // Output the success message to the user
	    echo "<div class='success'>" . $success_message . "</div>";
	}
?>