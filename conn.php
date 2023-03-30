<?php 
$targetDir = 'uploads'; // directory where uploaded files will be stored
$allowedTypes = ['jpg', 'png', 'gif']; // allowed file types
$conn = new mysqli('localhost', 'root', '', 'laphar'); // replace with your own database details
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// if (uploadAndInsert($targetDir, $allowedTypes, $conn)) {
//     echo "Files uploaded and inserted into database successfully.";
// } else {
//     echo "Error uploading files or inserting into database.";
// }
// $conn->close();

 ?>