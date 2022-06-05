<?php
// Configuration
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'unityaccess';

try {
    $dbh = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
} catch (PDOException $e) {
    echo 'An error has occurred.', $e->getMessage();
}

$sth = $dbh->query('SELECT username, score FROM players ORDER BY score DESC LIMIT 10');
$sth->setFetchMode(PDO::FETCH_ASSOC);

$result = $sth->fetchAll();

if (count($result) > 0) {
    foreach ($result as $r) {
        echo $r['username'], "\t", $r['score'], "\n";
    }
}
