<?php
session_start();
// ! ---------<<<PREPARE DATA>>>-----------
if (isset($_REQUEST["fName"]) && isset($_REQUEST["lName"])) {
    $_SESSION['fName'] = $_REQUEST["fName"];
    $_SESSION['lName'] = $_REQUEST["lName"];

    $fName = $_SESSION['fName'];
    $lName = $_SESSION['lName'];
}

// * ---------<<<DRAW TABLE>>>-----------
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator
{
    public function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    public function current()
    {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
    }

    public function beginChildren()
    {
        echo "<tr>";
    }

    public function endChildren()
    {
        echo "</tr>" . "\n";
    }
}
// * ---------<<<phpMyAdmin => servername, username, password, DB name>>>-----------
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fcs314";

try {
    // * ---------<<<LOGIN SERVER => phpMyAdmin>>>-----------
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ! ---------<<<INSERT DATA>>>-----------
    $sql = "INSERT INTO oyutan(firstname, lastname)
            VALUES ( '$fName', '$lName')";
    $conn->exec($sql); // use exec() because no results are returned

    // ! ---------<<<PRINT TABLE>>>------------
    $stmt = $conn->prepare("SELECT id, firstname, lastname FROM oyutan ORDER BY id");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
        echo $v;
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// * --------<<<disconnect DB, print table>>>------------
$conn = null;
echo "</table>";
