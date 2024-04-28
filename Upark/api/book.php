<?php
session_start();
include 'config.php';  // Include database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $spotId = htmlspecialchars($_POST['spotId']);
    $eventId = htmlspecialchars($_POST['eventId']);

    // SQL to insert a new reservation
    $sql = "INSERT INTO Reservations (UserID, SpotID, EventID, ReservationTime) VALUES (?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_id'], $spotId, $eventId]);

    echo "Reservation made successfully!";
}
?>
<!-- Simple HTML form for booking -->
<form method="post" action="book.php">
    Spot ID: <input type="text" name="spotId" required><br>
    Event ID: <input type="text" name="eventId" required><br>
    <input type="submit" value="Book Spot">
</form>
