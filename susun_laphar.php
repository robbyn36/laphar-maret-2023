<?php
include "conn.php";

// Fetch data from the table
$tgl_hari_ini = date('Y-m-d');
var_dump($tgl_hari_ini);
$sql = "SELECT narasi, id_laphar FROM narasi WHERE tgl = '$tgl_hari_ini'";
$result = mysqli_query($conn, $sql);

// Generate the HTML for the select element
$select_html = "<select name='myselect'>";
while ($row = mysqli_fetch_assoc($result)) {
    $narasi = $row['narasi'];
    $id_laphar = $row['id_laphar'];
    $select_html .= "<option value='$narasi'>$narasi</option>";
}
$select_html .= "</select>";

// input type gambar
$sql2 = "SELECT nama, id_laphar FROM gambar WHERE tgl = '$tgl_hari_ini'";
$result2 = mysqli_query($conn, $sql2);
// Generate the HTML for the select element

while ($row = mysqli_fetch_assoc($result2)) {
    $nama = $row['nama'];
    $id_laphar2 = $row['id_laphar'];
    $picture_html = "<img src=uploads/";
    $picture_html .= $nama;
    $picture_html .= "></img>";
}
var_dump($picture_html);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Select an Option</title>
</head>
<body>
    <h1>Select an Option</h1>
    <form action="process.php" method="post">
        <?php echo $picture_html; ?>
        <?php echo $select_html; ?>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>