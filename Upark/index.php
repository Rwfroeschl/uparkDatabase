<?php
include 'config.php';  // Include your connection script

// Attempt a query execution to further confirm the connection
$query = $pdo->query("SELECT * FROM Users");  // Replace 'some_table' with a real table name
while ($row = $query->fetch()) {
    echo $row['Name'];  // Replace 'column_name' with a real column name
}
?>
