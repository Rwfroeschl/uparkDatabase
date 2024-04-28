<?php
session_start();
include 'config.php';  // Include database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $reservationId = htmlspecialchars($_POST['reservationId']);

    // SQL to delete a reservation
    $sql = "DELETE FROM Reservations WHERE ReservationID = ? AND UserID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$reservationId, $_SESSION['user_id']]);

    echo "Reservation cancelled successfully!";
}
?>
<!-- Simple HTML form for cancellation -->
<form method="post" action="cancel.php">
    Reservation ID: <input type="text" name="reservationId" required><br>
    <input type="submit" value="Cancel Reservation">
</form>
