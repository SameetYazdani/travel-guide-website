<?php
include("db.php");

$username = $_POST['username'] ?? 'Guest';
$destination = $_POST['destination'] ?? '';
$rating = $_POST['rating'] ?? '';
$comment = $_POST['comment'] ?? '';

if (!$destination || !$rating || !$comment) {
    echo "All fields are required.";
    exit;
}

$stmt = $conn->prepare("INSERT INTO destination_feedback (username, destination, rating, comment) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $username, $destination, $rating, $comment);

if ($stmt->execute()) {
    echo "Thank you for your feedback!";
} else {
    echo "Failed to submit feedback.";
}
