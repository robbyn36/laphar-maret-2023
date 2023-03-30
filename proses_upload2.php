<?php
include 'conn.php';
function explodeString2($string, $delimiter1, $delimiter2) {
    $substrings = explode($delimiter1, $string);
    $finalSubstrings = array();
    foreach ($substrings as $substring) {
        $finalSubstrings = array_merge($finalSubstrings, explode($delimiter2, $substring));
    }
    return $finalSubstrings;
}

$hasil = explodeString2($_POST['narasi'],"\n",": ");

$id_laphar = rand();
for ($i=0; $i < count($hasil); $i++) {
    if ($i % 2 == 1) {
        // insert data
        $sql = "INSERT INTO narasi (narasi, id_laphar) VALUES ('$hasil[$i]','$id_laphar')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $conn->error;
                return false;
        }
        $success_message = "Data berhasil diinput";
        header("Location: upload_narasi.php?success=" . urlencode($success_message));

    }
}
?>