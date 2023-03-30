<!DOCTYPE html>
<html>
<head>
    <title>Select an Option</title>
</head>
<body>
    <table border="1">
    	<tr>
    		<td>Gambar</td>
    		<td>Narasi</td>
    	</tr>    		
    <form action="" method="post">
<?php
include "conn.php";
$tgl_hari_ini = date('Y-m-d');
// Fetch data from the table
// 
$sql2 = "SELECT nama, id_laphar FROM gambar WHERE tgl = '$tgl_hari_ini'";
$result2= mysqli_query($conn, $sql2);
while ($row = mysqli_fetch_assoc($result2)) {
$nama_gambar = $row['nama'];
$id_laphar = $row['id_laphar'];
	
// Generate the HTML for the select element
?>
<tr>
	<td>
		<img src="uploads/<?php echo $nama_gambar; ?>" alt="" height="100" width="100"><img>
		 <input type="hidden" id="custId" name="nama_gambar[]" value="<?php echo $nama_gambar; ?>">
	</td>
	<td>
		<select name='narasi[]'>
		<?php
		$sql = "SELECT narasi, id_laphar FROM narasi WHERE tgl = '$tgl_hari_ini'";
		$result = mysqli_query($conn, $sql);
		while ($row2 = mysqli_fetch_assoc($result)) {
	    $narasi = $row2['narasi']; ?>
			<option value="<?php echo $row2['narasi']; ?>"><?php echo $narasi; ?></option>
		<?php } ?>
	</select>
</td>
</tr>

<?php

}
?>
<input type="submit" value="Submit">
</form>
	</table>
        <br>
    </body>
</html>

<?php 
echo "<pre>";
var_dump($_POST);
echo "</pre>";
?>