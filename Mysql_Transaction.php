<?php

//$salary = 5000;
$salary = '$5000';

/* Change database details according to your database */
$dbConnection = mysqli_connect('localhost', 'root', '', 'transaction_db');

mysqli_autocommit($dbConnection, false);

$flag = true;

$query1 = "INSERT INTO `user` (`id`, `nama`, `umur`, `hobi`) VALUES (1, 'lian mafutra', '22', 'dirumah')";
$query2 = "INSERT INTO `data` (`id`, `nama_data`, `jumlah_data`) VALUES (1, 'berkas penting', 90 )";

$result = mysqli_query($dbConnection, $query1);

if (!$result) {
	$flag = false;
    echo "Error details: " . mysqli_error($dbConnection) . ".";
}

$result = mysqli_query($dbConnection, $query2);

if (!$result) {
	$flag = false;
    echo "Error details: " . mysqli_error($dbConnection) . ".";
}

if ($flag) {
    mysqli_commit($dbConnection);
    echo "All queries were executed successfully";
} else {
	mysqli_rollback($dbConnection);
    echo "All queries were rolled back";
} 

mysqli_close($dbConnection);

?>
