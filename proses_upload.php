<?php
$targetDir = 'uploads'; // directory where uploaded files will be stored
$allowedTypes = ['jpg', 'png', 'gif']; // allowed file types
$conn = new mysqli('localhost', 'root', '', 'laphar'); // replace with your own database details
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (uploadAndInsert($targetDir, $allowedTypes, $conn)) {
    echo "Files uploaded and inserted into database successfully.";
} else {
    echo "Error uploading files or inserting into database.";
}
$conn->close();

function uploadAndInsert($targetDir, $allowedTypes, $conn) {
    $uploadedFiles = [];
    $totalFiles = count($_FILES['file_gambar']['name']);
    
    // Loop through each file
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['file_gambar']['name'][$i];
        $fileType = $_FILES['file_gambar']['type'][$i];
        $fileTmpName = $_FILES['file_gambar']['tmp_name'][$i];
        $fileSize = $_FILES['file_gambar']['size'][$i];
        $fileError = $_FILES['file_gambar']['error'][$i];

        // Check if file type is allowed
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileExt, $allowedTypes)) {
            echo "Error: File type not allowed.";
            return false;
        }

        // Generate unique file name
        $newFileName = uniqid() . '.' . $fileExt;
        $targetPath = $targetDir . '/' . $newFileName;

        // Move uploaded file to target directory
        if (move_uploaded_file($fileTmpName, $targetPath)) {
            $uploadedFiles[] = $newFileName;
        } else {
            echo "Error uploading file.";
            return false;
        }
    }
    
    // Insert file names into database
    $id_laphar = rand();
    foreach ($uploadedFiles as $fileName) {
        $sql = "INSERT INTO gambar (nama, id_laphar) VALUES ('$fileName','$id_laphar')";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $conn->error;
            return false;
        }
    }
    return true;
}
 ?>