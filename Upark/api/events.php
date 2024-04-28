<?php
include 'config.php';  // Include database connection settings

$sql = "SELECT * FROM Events";
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll();

foreach ($events as $event) {
    echo "Event ID: " . $event['EventID'] . " - Name: " . $event['Name'] . " - Location: " . $event['Location'] . " - Date/Time: " . $event['DateTime'] . "<br>";
}
?>
