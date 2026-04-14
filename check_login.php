<?php
session_start();
$response = ['loggedIn' => false];

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    $response = [
        'loggedIn' => true,
        'name' => $_SESSION['username'],
        'email' => $_SESSION['email']
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
