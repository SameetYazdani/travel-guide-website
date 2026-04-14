<?php
include('db.php'); // database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $date = $_POST['date'] ?? '';
    $destination = $_POST['destination'] ?? '';
    $persons = $_POST['persons'] ?? '';

    if ($name && $email && $date && $destination && $persons) {
        $stmt = $conn->prepare("INSERT INTO bookings (name, email, travel_date, destination, persons) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $email, $date, $destination, $persons);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'Database error: ' . $conn->error;
        }
        $stmt->close();
    } else {
        echo 'Please fill all fields';
    }
} else {
    echo 'Invalid request';
}
?>

