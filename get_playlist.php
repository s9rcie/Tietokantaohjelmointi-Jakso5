<?php
require "dbconnection.php";
$dbcon = createDbConnection();

$sql = "SELECT Name, Composer FROM tracks";
$statement = $dbcon->prepare($sql);
$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row) {
    echo "<h3>".$row["Name"]."</h3>"."(".$row["Composer"].")"."<br>"."<br>";
}