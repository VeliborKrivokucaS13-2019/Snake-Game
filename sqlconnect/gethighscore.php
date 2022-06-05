<?php
// Configuration
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'unityaccess';

$username = $_GET["name"];

try {
    $dbh = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
} catch (PDOException $e) {
    echo 'An error has occurred.', $e->getMessage();
}

// prepare a statement using the ID
$stmt = $mysqli->prepare("SELECT username, score FROM players WHERE username = ?");

// bind the ID from our POST
$stmt->bind_param("i", $_GET['name']);

// execute our prepare statement
$stmt->execute();

// store the result
$stmt->store_result();

// we have no found id
if ($stmt->num_rows === 0) exit('No Data');

// bind the results we are looking for from our prepared statement
$stmt->bind_result($idName, $score);

// fetch the results from the table
$stmt->fetch();

// echo your results to Unity
echo $idName;
echo $score;

// deallocate the statement 
$stmt->close();
