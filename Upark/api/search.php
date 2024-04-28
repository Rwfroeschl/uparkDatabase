<?php
include 'config.php';  // Include database connection settings

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['searchTerm'])) {
    $searchTerm = htmlspecialchars($_GET['searchTerm']);
    
    // SQL to search parking spots by event or location
    $sql = "SELECT * FROM ParkingSpots WHERE Location LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['%' . $searchTerm . '%']);
    $spots = $stmt->fetchAll();

    foreach ($spots as $spot) {
        echo "Spot ID: " . $spot['SpotID'] . " - Location: " . $spot['Location'] . "<br>";
    }
}
?>
<!-- Simple HTML form for searching -->
<form method="get" action="search.php">
    Search Term: <input type="text" name="searchTerm" required><br>
    <input type="submit" value="Search">
</form>
