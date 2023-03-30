<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload File</title>
</head>
<body>
	<form action="proses_upload.php" method="post" enctype="multipart/form-data">
		<label for="files">Select files:</label>
		<input type="file" id="files" name="file_gambar[]" multiple ><br><br>
		<input type="submit" name="kirim_data">
	</form>
</body>
</html>