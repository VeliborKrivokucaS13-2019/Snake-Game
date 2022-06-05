<?php
$con = mysqli_connect('localhost', 'root', 'root', 'unityaccess');
// check that connection happened
if (mysqli_connect_errno()) {
    echo "1: Connection failed"; // error code #1 = connection failed
    exit();
}
$username = $_POST["name"];
$password = $_POST["password"];

// check if name exists
$namecheckquery = "SELECT username, salt, hashpw, score FROM players WHERE username='" . $username . "';";
$namecheck = mysqli_query($con, $namecheckquery) or die("2: Name check query failed"); // error code #2 - name check query failed
if (mysqli_num_rows($namecheck) != 1) {
    echo "5: Either no user with name, or more than one"; //error code #5 - number of names matching != 1
    exit();
}

$existinginfo = mysqli_fetch_assoc($namecheck);
$salt = trim($existinginfo["salt"]);
$hash = trim($existinginfo["hashpw"]);

$loginhash = crypt($password, $salt);
if ($hash != $loginhash) {
    echo "6: Incorrect Password";
    echo "\n";
    echo $hash;
    echo "\n";
    echo $loginhash;
    exit();
}

echo "0\t" . $existinginfo["score"];
